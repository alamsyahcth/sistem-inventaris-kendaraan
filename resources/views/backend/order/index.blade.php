@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Booking</h1>
      <h6 class="mb-2">Manage Data Booking Kendaraan</h6>
      @include('backend/layouts/alert')
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table text-center" width="100%" id="dataTable">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="15%">Kode</th>
                <th width="20%">Nama Karyawan</th>
                <th width="10%">Tanggal Mulai</th>
                <th width="10%">Tanggal Selesai</th>
                <th width="20%" class="text-center">Status</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data as $d)
                <tr @if(date("Y-m-d") > $d->booking_end && $d->books_status == 'berjalan') style="background-color:#f7e4e4" @endif>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->book_code }}</td>
                  <td>{{ $d->employees_name }}</td>
                  <td>{{ $d->booking_date }}</td>
                  <td>{{ $d->booking_end }}</td>
                  <td>
                    @if($d->books_status == 'berjalan')
                      <span class="badge badge-pill badge-primary">Sedang Berlangsung</span>
                    @endif
                    @if($d->books_status == 'selesai')
                      <span class="badge badge-pill badge-secondary">Peminjaman Selesai</span>
                    @endif
                    @if(date("Y-m-d") > $d->booking_end && $d->books_status == 'berjalan')
                      <span class="badge badge-pill badge-danger">Telat Mengembalikan</span>
                    @endif
                  </td>
                  <td>
                    <a @if($d->books_status == 'selesai') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/book/report/'.$d->book_code)}}" target="_blank" class="btn btn-primary btn-sm" @endif ><img src="{{asset('img/icon/print.svg')}}"> Print</a>
                    <a @if($d->books_status == 'selesai') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/book/'.$d->book_code)}}" class="btn btn-success btn-sm" @endif ><img src="{{asset('img/icon/view.svg')}}"> View</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection