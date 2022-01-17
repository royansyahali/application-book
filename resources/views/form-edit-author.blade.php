@extends('layouts.app')
@section('title', 'Edit Form Author')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('author.update',["id" => $id->id]) }}">
                  @method("PUT")
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
                      <input type="text" name="author" class="form-control" value="{{old('author') ?? $id->author }}" id="author" placeholder="Enter Author">
                    </div>
                    
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
