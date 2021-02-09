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
          <li class="breadcrumb-item"><a href="/logout">LogOut</a></li>
          <li class="breadcrumb-item active">Add Data</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="card card-primary">
  <div class="container-fluid">
    <!-- SELECT2 EXAMPLE -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Select2 (Default Theme)</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">

          <div class="col-md-6">
            <form action="/divisi/save" method="post"> @csrf

              <div class="form-group">

                <label>kode</label>
                <input type="text" name="kode" id="kode">
              </div>
              
              <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
              <label>nama_divisi</label>
              <input type="text" name="nama_divisi" id="nama_divisi">

            </div>
            <!-- /.form-group -->
            <div class="form-group">

              <button type="submit">kirim</button>
              
            </div>

            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div>
      <!-- /.card-body -->

      <!-- /.card -->

    </div>


    @endsection