@extends('layouts.master')
@section('container')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url ('/logout')}}">LogOut</a></li>
              <li class="breadcrumb-item active">Data Karyawan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
             <div class="col-6">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#divisi">Tambah Data Karyawan</button>
             <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#divisi">Tambah Divisi Karyawan</button> -->
                </div>    
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <table id="table1" class="table table-striped">
                <thead>                
                <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Divisi</th>
                <th>Jumlah Join</th>
                </tr>
                <tbody>@foreach($divisi as $div)
                <tr>
                <th>{{$loop->iteration}}</th>
                    <td>{{$div->kode}}</td>
                    <td>{{$div->nama_divisi}}</td>
                    <td>{{$div->jumlah}}</td>
                    
                    <td><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edited">
                    <i class="fas fa-pencil-alt edit"></i>Edit</button>
		        <a href="/divisi/{{$div->id}}/delete " class="btn btn-danger btn-sm" onClick="return confrim ('yakin')">
            <i class="fas fa-trash"></i>Delete</a></td>
              </tr> @endforeach
              </table>
              </div>
              </div>
              </section>
              <section class="content">
<div class="modal fade" id="divisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Divisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="/divisi/save" method="post">
      @csrf
  <div class="form-group">
    <label for="nama_lengkap">Kode Divisi</label>
    <input type="text" class="form-control" id="kode" aria-describedby="" name="kode" required>
  </div>
  <div class="form-group">
    <label for="nama_belakang">Nama Divisi</label>
    <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" required>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>            
@endsection
@section('footer')
@stop
