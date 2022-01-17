@extends('layouts.app')
@section('title', 'Data Members')

@section('main-content')
    
<div class="row">
    <div class="col-12">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Members</h3>
          <div class="d-flex flex-row-reverse bd-highlight">
            @if (Auth::user()->role == "1")
              <a class="btn btn-primary ml-2 btn-sm" href="{{route("users.create")}}" role="button">Create</a>
            @endif
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @php
                  $number = 1;
              @endphp
              @foreach ($users as $item)
              <tr>
                <td>{{$number++}}</td>
                <td>{{ucwords($item->name)}}</td>
                <td>{{$item->email}}</td>
                <td>
                  <div class="d-flex justify-content-start">
                    <a href="{{route("users.edit",["id"=>$item->id])}}" class="btn mr-1 btn-sm btn-warning"><i class="fa fa-cog"></i></a>
                    <a data-id="{{$item->id}}" data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-data btn-danger "><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>  
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">HAPUS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Menghapus?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger btn-hapus">Hapus</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
  $(document).on('click', '.btn-data', function (e) {
    let id = $(this).attr('data-id');
    $(document).on('click', '.btn-hapus', function (e) {
       console.log(id);
        $.ajax({
            url : "{{url('/users')}}/delete/"+id,
            // console.log(url);
            method : "POST",
            data : {
                _token : "{{csrf_token()}}",
                _method : "DELETE",
            }
        })
        .then(function(data){
            location.reload();
        });
    });
  });

  $(function () {

// Export to Word Document
// On element with id="btn-export" clicked
  
    $("#example1").DataTable({
      dom: 'ftp',
    })
  });
</script>
@endpush
