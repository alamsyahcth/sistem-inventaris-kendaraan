@extends('frontend/layouts/app')
@section('title','Beranda')
@section('content')
  <section class="all-background pt-5">
    <div class="container pt-3">
      <div class="row h-100">
        <div class="col-md-6 d-flex">
          <div class="justify-content-center align-self-center">
            <img class="ml-5 mb-3" src="{{asset('img/logo.svg')}}">
            <h1 class="text-light ml-5">Selamat Datang</h1>
            <h6 class="text-light ml-5">Di Sistem Inventory Kendaraan</h6>
          </div>
        </div>
        <div class="col-md-6 py-5">
          <div class="card card-entry h-100">
            <div class="card-body py-5 px-5">
              <h4>Untuk Peminjaman Isi Data Berikut</h4>
              <form class="form-horizontal mt-4" method="post">
                <div class="form">
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Isi Nomor Induk Karyawan">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('img/calendar.svg')}}"></span>
                          </div>
                          <input type="text" class="form-control datepicker" placeholder="Tanggal Pinjam" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('img/calendar.svg')}}"></span>
                          </div>
                          <input type="text" class="form-control datepicker" placeholder="Tanggal Kembali" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea type="textarea" class="form-control" placeholder="Alasan Peminjaman"></textarea>
                  </div>
                  <div class="form-group pt-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">Saya menyetujui dan maemahami persyaratan yang berlaku</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <a href="{{url('/vechile')}}" class="btn btn-danger btn-md btn-block">Pilih Kendaraan</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection