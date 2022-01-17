@extends('layouts.app')
@section('title', 'Edit Form Category')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('category.update',["id" => $id->id]) }}">
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
                      <label for="category">Category Name</label>
                      <input type="text" name="category" class="form-control" value="{{old('category') ?? $id->category }}" id="author" placeholder="Enter Category">
                    </div>
                    
                </div>
     
                </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-dark" href="{{route("category.index")}}" role="button">Kembali</a>
                  </div>
                </form>
              </div>
        </div>
    </div>
@endsection
