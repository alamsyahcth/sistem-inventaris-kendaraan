@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Booking Kendaraan</h1>
      <h6 class="mb-2">Manage Data Booking Kendaraank</h6>
      @include('backend/layouts/alert')
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table width="100%">
            <tr class="py-5">
              <td width="20%"><h5 class="text-primary">Kode Booking : <span style="font-weight: 700">{{ $data->book_code }}</span></h5></td>
              <td colspan="2" width="20%"><h5 class="text-primary">Tanggal : <span style="font-weight: 700">{{ $data->date }}</span></h5></td>
            </tr>
            <tr>
              <td colspan="4"><hr></td>
            </tr>
            <tr>
              <td class="pb-0"><h6 class="text-primary pb-0">Info Karyawan</h6></td>
            </tr>
            <tr>
              <td class="pb-0" width="20%">
                <p class="success-text">Nama Karyawan Peminjam</p>
                <h6 class="detail-text-success">{{ $data->name }}</h6>
              </td>
              <td class="pb-0" width="20%">
                <p class="success-text">Nomor Induk Karyawan</p>
                <h6 class="detail-text-success">{{ $data->nik }}</h6>
              </td>
              <td class="pb-0" width="20%" rowspan="2">
                <img src="{{asset('img/employee/'.$data->employees_photo)}}" width="100" class="img-fluid shadow">
              </td>
            </tr>
            <tr>
              <td class="pb-0" width="20%">
                <p class="success-text">Email</p>
                <h6 class="detail-text-success">{{ $data->email }}</h6>
              </td>
              <td class="pb-0" width="20%">
                <p class="success-text">Nomor Handphone</p>
                <h6 class="detail-text-success">{{ $data->phone }}</h6>
              </td>
            </tr>
            <tr>
              <td class="pt-3" width="100%" colspan="3"><hr><h6 class="text-primary pb-0">Info Peminjaman</h6></td>
            </tr>
            <tr>
              <td class="pb-0" width="20%">
                <p class="success-text">Tanggal Pinjam</p>
                <h6 class="detail-text-success">{{ $data->booking_date }}</h6>
              </td>
              <td class="pb-0" width="20%">
                <p class="success-text">Tanggal Kembali</p>
                <h6 class="detail-text-success">{{ $data->booking_end }}</h6>
              </td>
            </tr>
            <tr>
              <td class="pb-0" width="100%" colspan="2">
                <p class="success-text">Alasan Peminjaman</p>
                <h6 class="detail-text-success" style="line-height: 25px;">
                  {{ $data->reason }}
                </h6>
              </td>
            </tr>
            <tr>
              <td class="pt-3" width="100%" colspan="3"><hr><h6 class="text-primary pb-0">Info Kendaraan</h6></td>
            </tr>
            <tr>
              <td class="pb-0" width="20%">
                <p class="success-text">Nama Kendaraan</p>
                <h6 class="detail-text-success">Daihatsu Sigra</h6>
              </td>
              <td class="pb-0" width="20%">
                <p class="success-text">Nomor Polisi</p>
                <h6 class="detail-text-success">B 1234 MM</h6>
              </td>
              <td class="pb-0" width="20%">
                <img src="{{asset('img/vechile/'.$data->vechiles_photo)}}" width="100" class="img-fluid shadow">
              </td>
            </tr>
          </table>
          <div class="row mt-5">
            <div class="col-md-12">
              <form action="{{ url('/manage/book/create/') }}" method="post">
                @csrf
                <input type="text" name="order_books_id" value="{{ $data->order_books_id }}">
                <input type="text" name="vechiles_id" value="{{ $data->vechiles_id }}">
                <input type="text" name="books_id" value="{{ $data->books_id }}">
                <button type="submit" class="btn btn-lg btn-success"><img src="{{asset('img/icon/accept.svg')}}"> Selesai</button>
              </form>
              <a href="{{url('/manage/book-in/refused/'.$data->book_id.'/'.$data->vechile_id)}}" class="btn btn-lg btn-outline-danger">Lapor Kerusakan Kendaraan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection