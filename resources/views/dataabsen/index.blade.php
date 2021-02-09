@extends('layouts.master')

@section('container')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/logout">LogOut</a></li>
            <li class="breadcrumb-item active">Data Absensi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
        <a href="/absen/export" class="btn btn-primary">export</a>
        <table id="table1" class="table table-striped">
                  <thead>                  
                    <tr>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Division</th>
                      <th>Time In</th>
                      <th>Time Out</th> 
                    </tr>
                  <tbody>@foreach($absen as $row)
                       <tr>
                       <th>{{$row->date}}</th>
                       <td>{{$row->name}}</td>
                       <td>{{$row->divisi}}</td>
                       <td>{{$row->time_in}}</td>
                       <td>{{$row->time_out}}</td>  
                    </tr>@endforeach
                  </tbody>
                </table>
                </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    
@endsection
@section('footer')
  <script>
    $(document).ready(function(){
      $('#table1').DataTable();
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
    });


  });
  </script>

@stop