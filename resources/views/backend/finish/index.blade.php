@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Pengembalian Kendaraan</h1>
      <h6 class="mb-2">Manage Data Pengembalian Kendaraan</h6>
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
                <th width="20%">Tanggal</th>
                <th width="20%" class="text-center">Status</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data as $d)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->book_finish_code }}</td>
                  <td>{{ $d->date }}</td>
                  <td>
                    <span class="badge badge-pill badge-primary">Sudah Dikembalikan</span>
                  </td>
                  <td>
                    <a href="{{url('/manage/book-finish/'.$d->book_finish_code)}}" class="btn btn-success btn-sm" ><img src="{{asset('img/icon/view.svg')}}"> View</a>
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