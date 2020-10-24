@extends('frontend/layouts/app')
@section('title','Peraturan')
@section('content')
  <section class="pt-5">
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-12 px-3">
          <h1>Peraturan</h1>
        </div>
      </div>
      <div class="row align-item-center">
        <div class="col-md-12">
          <ol>
            <li>
              Pegawai yang terdata dalam sistem.
            </li>
            <li>
              Peminjaman kendaraan hanya diperbolehkan satu unit.
            </li>
            <li>
              Tidak boleh melimpahkan kendaraan kepada pegawai lain (harus sesuai dengan pegawai yang meminjam sampai batas peminjaman selesai).
            </li>
          </ol>
        </div>
      </div>
  </section>
@endsection