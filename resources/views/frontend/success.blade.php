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
            <h1 class="text-danger" style="font-size: 60px;">{{ $data->book_id }}</h1>
            <p class="success-text">Segera Laporkan Kepada Admin Peminjaman Sebelum {{ $data->expired_date }}</p>
          </div>
          <div class="mt-5">
            <table width="100%">
              <tr>
                <td class="pb-2"><h6 class="text-danger pb-2">Info Karyawan</h6></td>
              </tr>
              <tr>
                <td class="pb-2" width="40%">
                  <p class="success-text">Nama Karyawan Peminjam</p>
                  <h6 class="detail-text-success">{{ $data->name }}</h6>
                </td>
                <td class="pb-2" width="50%">
                  <p class="success-text">Nomor Induk Karyawan</p>
                  <h6 class="detail-text-success">{{ $data->nik }}</h6>
                </td>
              </tr>
              <tr>
                <td class="pb-2" width="30%">
                  <p class="success-text">Email</p>
                  <h6 class="detail-text-success">{{ $data->email }}</h6>
                </td>
                <td class="pb-2" width="20%">
                  <p class="success-text">Nomor Handphone</p>
                  <h6 class="detail-text-success">{{ $data->phone }}</h6>
                </td>
              </tr>
              <tr>
                <td class="pt-3" width="100%" colspan="2"><hr><h6 class="text-danger pb-2">Info Peminjaman</h6></td>
              </tr>
              <tr>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Tanggal Pinjam</p>
                  <h6 class="detail-text-success">{{ $data->booking_date }}</h6>
                </td>
                <td class="pb-2" width="40%">
                  <p class="success-text"><img src="{{asset('img/calendar.svg')}}">Tanggal Kembali</p>
                  <h6 class="detail-text-success">{{ $data->booking_end }}</h6>
                </td>
              </tr>
              <tr>
                <td class="pb-2" width="100%" colspan="2">
                  <p class="success-text">Alasan Peminjaman</p>
                  <h6 class="detail-text-success" style="line-height: 25px;">
                    {{ $data->reason }}
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