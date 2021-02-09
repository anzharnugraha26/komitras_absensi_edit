@extends('layouts.master')
@section('container')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Lokasi Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url ('/logout')}}">LogOut</a></li>
              <li class="breadcrumb-item active">Input Lokasi Absensi</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body">
  <form>
  <div class="form-group">
    <label for="nik">Nik Karyawan</label>
    <input type="search" name="nik" onchange="searchEmployee(event)">
    <!-- <select class="form-control custom-select" name="nik" required>
    <option selected="" disabled="">Select one</option>
    @foreach($karyawan as $kar)
    <option value="{{$kar->nik}}"> {{$kar->nik}} </option>
    @endforeach                
</select>  -->
  </div>
  <div class="form-group">
    <label for="nik">Nama Karyawan</label>
    <input type="text" class="form-control" id="nik" aria-describedby="nik" name="" value="" disabled> 
  </div>
  <div class="form-group">
    <label for="nik">Lokasi</label>
    <input type="text" class="form-control" id="lokasi" aria-describedby="lokasi" name="" value="" disabled > 
  </div>
  <div class="form-group">
    <input id="pac-input" class="form-control" type="text" placeholder="Search Box">
  </div>
  <div class="form-group">
    <button>Submit</button> 
  </div>

  <div id="map" style="height: 400px;width: 100%; background: red"></div>
    <script>
      // This example adds a search box to a map, using the Google Place Autocomplete
      // feature. People can enter geographical searches. The search box will return a
      // pick list containing a mix of places and predicted search terms.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    </script>
    
  </div>
  </form>
  </section>
@endsection
@section('footer')

<script src="{{asset('js/inputlokasi.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9gBRoPOrvwl3fTatVr_ktmiUoFkbHaDU&callback&libraries=places&callback=initAutocomplete"
async defer></script>
@stop