@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Booking Masuk</h1>
      <h6 class="mb-2">Manage Data Booking Kendaraan Masuk</h6>
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
                <th width="20%">Tanggal Mulai</th>
                <th width="20%">Tanggal Selesai</th>
                <th width="20%" class="text-center">Status</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data as $d)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->book_id }}</td>
                  <td>{{ $d->booking_date }}</td>
                  <td>{{ $d->booking_end }}</td>
                  <td>
                    @if($d->status == 'Belum')
                      <span class="badge badge-pill badge-primary">Belum Dikonformasi</span>
                    @endif
                    @if($d->status == 'Tolak')
                      <span class="badge badge-pill badge-secondary">Ditolak</span>
                    @endif
                    @if($d->status == 'Sudah')
                      <span class="badge badge-pill badge-success">Sudah Dikonfirmasi</span>
                    @endif
                  </td>
                  <td>
                    <a @if($d->status == 'Tolak' || $d->status == 'Sudah') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/book-in/'.$d->book_id)}}" class="btn btn-success btn-sm" @endif ><img src="{{asset('img/icon/view.svg')}}"> View</a>
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