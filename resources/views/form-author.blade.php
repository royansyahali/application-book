@extends('layouts.app')
@section('title', 'Form Author')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route("author.store") }}">
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
                      <label for="author">Author Name</label>
                      <input type="author" name="author" class="form-control" value="{{old('author')}}" id="author" placeholder="Enter Author">
                    </div>

                </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-dark" href="{{route("author.index")}}" role="button">Kembali</a>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endsection