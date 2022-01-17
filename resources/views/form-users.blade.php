@extends('layouts.app')
@section('title', 'Form Users')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route("users.store") }}" >
                @csrf
                  <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="name" name="name" class="form-control" value="{{old('name')}}" id="name" placeholder="Enter Name">
                    </div>
                    
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" min="8" name="password" class="form-control" value="" id="password" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                      <label for="password-confirm">Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control" value="" id="password-confirm" placeholder="Enter Confirm Password">
                    </div>


                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1" {{ (old('role') ==  "1")  ? 'selected':''}}>Admin</option>
                        <option value="0" {{ (old('role') == '0')  ? 'selected':''}}>Member</option>
                    </select>
                </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-dark" href="{{route("users.index")}}" role="button">Kembali</a>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endsection