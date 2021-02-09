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
          <li class="breadcrumb-item active">Data Karyawan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="col-md-3">
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit</a></li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="activity">
              <div class="post">
                <p>
                </p>
              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <div class="timeline timeline-inverse">
                <!-- timeline time label -->
                <div>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <div>
                  </div>
                </div>
                <!-- END timeline item -->
                <!-- timeline item -->
                <div>
                </div>
              </div>
            </div>
          </div>
          <!-- END timeline item -->
          <!-- timeline time label -->
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <div>
            <div class="tab-pane" id="settings">
              <form method="post" action="/datakaryawan/{{$karyawan->id}}" class="form-horizontal" enctype="multipart/form-data">

                @method('patch')
                @csrf

                <div class="form-group row">
                  <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama_lengkap" class="form-control" id="inputName" placeholder="Name" value="{{$karyawan->nama_lengkap}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" name="nik" class="form-control" id="inputEmail" placeholder="NIK" value="{{$karyawan->nik}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Division</label>
                  <div class="col-sm-10">
                    <input type="text" name="divisi" class="form-control" id="inputName2" placeholder="Division" value="{{$karyawan->divisi}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="inputName2" placeholder="Email" value="{{$karyawan->email}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputExperience" name="alamat" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="inputExperience" placeholder="Address">{{$karyawan->alamat}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSkills" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <input type="text" name="jenis_kelamin" class="form-control" id="inputSkills" placeholder="Gender" value="{{$karyawan->jenis_kelamin}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSkills" class="col-sm-2 col-form-label">Avatar</label>
                  <div class="col-sm-10">
                    <input type="file" name="avatar">
                  </div>
                </div>

                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
            </form>
          </div>

        </div>

      </div>
    </div>

  </div>

  </div>

  </div>
</section>



@endsection