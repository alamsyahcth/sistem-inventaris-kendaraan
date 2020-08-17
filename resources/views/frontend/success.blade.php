@extends('frontend/layouts/app')
@section('title','Pilih Kendaraan')
@section('content')
  <section class="pt-5 mb-5">
    <div class="container pt-5">
      <div class="row align-item-center">
        <div class="col-md-3"></div>
        <div class="col-md-6 shadow p-4">
          <div>
            <h5>Terima Kasih, Berikut adalah kode booking anda</h5>
            <h1 class="text-danger" style="font-size: 60px;">B-200820001</h1>
            <p class="success-text">Segera Laporkan Kepada Admin Peminjaman Sebelum 2020-08-21</p>
          </div>
          <div class="mt-5">
            <table width="100%">
              <tr>
                <td class="pb-2"><h6 class="text-danger pb-2">Info Karyawan</h6></td>
              </tr>
              <tr>
                <td class="pb-2" width="40%">
                  <p class="success-text">Nama Karyawan Peminjam</p>
                  <h6 class="detail-text-success">John Doe</h6>
                </td>
                <td class="pb-2" width="50%">
                  <p class="success-text">Nomor Induk Karyawan</p>
                  <h6 class="detail-text-success">123456789</h6>
                </td>
              </tr>
              <tr>
                <td class="pb-2" width="30%">
                  <p class="success-text">Email</p>
                  <h6 class="detail-text-success">johndoe@mail.com</h6>
                </td>
                <td class="pb-2" width="20%">
                  <p class="success-text">Nomor Handphone</p>
                  <h6 class="detail-text-success">089999999999</h6>
                </td>
              </tr>
              <tr>
                <td class="pt-3" width="100%" colspan="2"><hr><h6 class="text-danger pb-2">Info Peminjaman</h6></td>
              </tr>
              <tr>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Tanggal Pinjam</p>
                  <h6 class="detail-text-success">2020-27-08</h6>
                </td>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Tanggal Kembali</p>
                  <h6 class="detail-text-success">2020-30-08</h6>
                </td>
              </tr>
              <tr>
                <td class="pb-2" width="100%" colspan="2">
                  <p class="success-text">Alasan Peminjaman</p>
                  <h6 class="detail-text-success" style="line-height: 25px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </h6>
                </td>
              </tr>
              <tr>
                <td class="pt-3" width="100%" colspan="2"><hr><h6 class="text-danger pb-2">Info Kendaraan</h6></td>
              </tr>
              <tr>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Nama Kendaraan</p>
                  <h6 class="detail-text-success">Daihatsu Sigra</h6>
                </td>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Nomor Polisi</p>
                  <h6 class="detail-text-success">B 1234 MM</h6>
                </td>
              </tr>
            </table>
            <a href="{{url('/')}}" class="btn btn-danger btn-md btn-block mt-4">Kembali</a>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </section>
@endsection