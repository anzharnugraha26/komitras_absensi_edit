@extends('layouts.master')

@section('container')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Artikel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/logout">LogOut</a></li>
              <li class="breadcrumb-item active">Add Artikel</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <div class="col-6">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">Tambah Data Karyawan</button>
                </div>    
            </div>
            <!-- /.card-header -->
            <div class="card-body">
        <td>
        <table class="table table-striped" id="table1">
        <thead>                  
        <tr>  
          <th>Date</th>
		  <th>Time In</th>
		  <th>Time Out</th>
		 
                    </tr>
                  </thead>
                  <tbody>
       
                <tbody>@foreach($artikel as $row)
                <tr>
                <th>

                    <td>{{$row->id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->content}}</td>
                    </th>
                    <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edited">
                    <i class="fas fa-pencil-alt edit"></i>Edit</button>
		        <a href="#" class="btn btn-danger btn-sm delete" id="">
            <i class="fas fa-trash"></i>Delete</a></td>
              </tr> </th>
              @endforeach
              </table>
              </div>
              </div>
              </section>

@endsection
@section('footer')
  <script>
   // $(document).ready(function(){
     // $('#table1').DataTable();
    $('.delete').click(function(){
      var karyawan_id = $(this).attr('id');
      swal({
      title: "Are you sure?",
      text: "Are you sure you want to delete this data?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
})
    .then((willDelete) => {
    if (willDelete) {
      window.location = "/karyawan/"+karyawan_id+"/delete";
    swal("Poof! Your imaginary file has been deleted!", {
    icon: "success",
    });
  } else {
    swal("Your imaginary file is safe!");
  }
});
   // });


  });
  </script>

@stop
