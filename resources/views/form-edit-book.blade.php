@extends('layouts.app')
@section('title', 'Edit Form Book')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('book.update',["id" => $id->id]) }}" >
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
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" value="{{old('title') ?? $id->title}}" id="title" placeholder="Enter Title">
                    </div>
                    
                    <div class="form-group">
                      <label for="pages">Pages</label>
                      <input type="number" min="1" name="pages" class="form-control" value="{{old('pages') ?? $id->pages}}" id="pages" placeholder="Enter Pages">
                    </div>

                    <label for="author">Author</label>
                    <select name="id_author" id="author" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($authors as $item)
                        <option value="{{$item->id}}" {{ ($item->id ==  $id->authors->id)  ? 'selected':''}}>{{$item->author}}</option>
                        @endforeach
                    </select>

                    <label for="category">Categories</label>
                    <select name="id_category" id="category" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($categories as $item)
                          <option value="{{$item->id}}" {{ ($item->id ==  $id->categories->id)  ? 'selected':''}}>{{$item->category}}</option>
                        @endforeach
                    </select>
                </div>
     
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
