@extends('layouts.master')

@section('container')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Attandace</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/logout">LogOut</a></li>
                        <li class="breadcrumb-item active">Absen</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="card-body">
                <input type="hidden" value="{{ $serverDate }}" id="server-date" /></i>
                <input type="hidden" value="{{ $timeIn }}" id="time-in" />
                <input type="hidden" value="{{ $timeOut }}" id="time-out" />
                <input type="text" id="count-down" />
                <td>
                    <form action="/absen" method="post">@csrf
                        <input type="text" id="lat" name="latitude" disabled >
                        <input type="text" id="long" name="longtitude" disabled>
                        <button type="submit" id="btn-in" name="btn-in"
                            class="btn btn-block btn-outline-info btn-lg absen\">Absen Masuk</button>
                    </form>
                </td>
            </div>
            <div class="card-body">
                <td>
                    <form method="post" action="/absen/update">@method('patch')@csrf
                        <button type="submit" id="btn-out" name="btn-out"
                            class="btn btn-block btn-outline-info btn-lg">Absen Pulang</button>
                    </form>
                </td>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <td>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Division</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data_absen as $absen)
                                <tr>
                                    <td>{{ auth()->user()->karyawan->nama_lengkap }}</td>
                                    <td>{{ auth()->user()->karyawan->nama_divisi }}</td>
                                    <td>{{ $absen->date }}</td>
                                    <td>{{ $absen->time_in }}</td>
                                    <td>{{ $absen->time_out }}</td>
                                    <td>{{ $absen->note }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    {!! $data_absen->links() !!}
                </td>
                <td>
                    <p></p>
                </td>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

    <section class="content" hidden>
        <div class="hidden">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <style>
                        #map {
                            height: 400px;

                            width: 100%;

                        }

                    </style>
                    </head>

                    <body>
                        <h3>My Google Maps Demo</h3>

                        <div id="map"></div>
                        <script>
                        </script>
                    </body>
                </form>
            </div>
    </section>
@endsection


@section('footer')

<script src="{{ asset('js/countdown-absen.js') }}"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw_MSzcRGkIVC6zUwoFqtShYfnO2vHHHA&callback=initMap&v=3&sensor=false&libraries=geometry">
</script>

@stop
