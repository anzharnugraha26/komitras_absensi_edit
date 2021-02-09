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
                        <li class="breadcrumb-item"><a href="{{ url('/logout') }}">LogOut</a></li>
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
                            <button type="button" class="btn btn-default" data-toggle="modal"
                                data-target="#exampleModal">Tambah Data Karyawan</button>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#divisi">Tambah
                                Divisi Karyawan</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                        aria-describedby="example2_info">
                                        <table id="table1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>NIK</th>
                                                    <th>Divisi</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Options</th>
                                                </tr>
                                            <tbody>
                                                @foreach ($karyawan as $krw)
                                                    <tr>
                                                        <th>{{ $loop->iteration }}</th>
                                                        <td><a
                                                                href="/datakaryawan/{{ $krw->id }}/profile">{{ $krw->nama_lengkap }}</a>
                                                        </td>
                                                        <td>{{ $krw->nik }}</td>
                                                        <td>{{ $krw->nama_divisi }}</td>
                                                        <td>{{ $krw->email }}</td>
                                                        <td>{{ $krw->jenis_kelamin }}</td>
                                                        <td>{{ $krw->alamat }}</td>
                                                        <td><button class="btn btn-info btn-sm" data-toggle="modal"
                                                                data-target="#edit-item">
                                                                <i class="fas fa-pencil-alt edit"></i>Edit</button>
                                                            <a href="#" class="btn btn-danger btn-sm delete"
                                                                id="{{ $krw->id }}">
                                                                <i class="fas fa-trash"></i>Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                        </table>
                                </div>
                            </div>
    </section>
    <section class="content">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/datakaryawan/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" {{ $errors->has('nama_lengkap') ? 'has-error' : '' }}>
                                <label for="nama_lengkap">Name</label>
                                <input type="text" class="form-control" id="nama_depan" aria-describedby="nama_depan"
                                    name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                                @if ($errors->has('nama_lengkap'))
                                    <span class="help-block">{{ $errors->first('nama_lengkap') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                              <label for="inputStatus">Role</label>
                              <select class="form-control custom-select" name="role">
                                  <option selected="" disabled="">Select one</option>
                                  <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                  <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>Karyawan
                                  </option>
                              </select>
                          </div>
                            <div class="form-group">
                                <label for="tgllahir">Tanggal Masuk</label>
                                <input type="date" class="form-control" id="tanggalmasuk" aria-describedby="tgl"
                                    name="tanggalmasuk" value="{{ old('tanggalmasuk') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tgllahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggallahir" aria-describedby="tgl"
                                    name="tanggallahir" value="{{ old('tanggallahir') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">Divisi</label>
                                <select class="form-control custom-select" name="divisi" required>
                                    <option selected="" disabled="">Select one</option>
                                    @foreach ($divisi as $div)
                                        <option value="{{ $div->id }}"> {{ $div->kode }} {{ $div->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}>
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                                    required>
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Gender</label>
                                <select class="form-control custom-select" name="jenis_kelamin">
                                    <option selected="" disabled="">Select one</option>
                                    <option value="man" {{ old('jenis_kelamin') == 'man' ? 'selected' : '' }}>Man</option>
                                    <option value="woman" {{ old('jenis_kelamin') == 'woman' ? 'selected' : '' }}>Woman
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                        required>{{ old('alamat') }}</textarea>
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
    <section class="content">
        <div class="modal fade" id="divisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Divisi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/divisi/save" method="post" enctype="multipart/form-data">
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

    <section class="content">
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Divisi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" id="editform">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="nama_lengkap">Nama </label>
                                <input type="text" class="form-control" id="fname" aria-describedby="" name="kode" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_belakang">alamat</label>
                                <input type="text" class="form-control" id="test" name="nama_divisi" required>
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
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
            $('.delete').click(function() {
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
                            window.location = "/datakaryawan/" + karyawan_id + "/delete";
                            swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                    });
            });

            //     $(document).on('click', "#edit-item", function() {
            //     $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            //     var options = {
            //       'backdrop': 'static'
            //     };
            //     $('#edit-modal').modal(options)
            //   })

            //   // on modal show
            //   $('#edit-modal').on('show.bs.modal', function() {
            //     var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
            //     var row = el.closest(".data-row");

            //     // get the data
            //     var id = el.data('item-id');
            //     var name = row.children(".name").text();
            //     var description = row.children(".description").text();

            //     // fill the data in the input fields
            //     $("#modal-input-id").val(id);
            //     $("#modal-input-name").val(name);
            //     $("#modal-input-description").val(description);

            //   })

            //   // on modal hide
            //   $('#edit-modal').on('hide.bs.modal', function() {
            //     $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            //     $("#edit-form").trigger("reset");
            //   })
            // })





        });

    </script>

@stop
