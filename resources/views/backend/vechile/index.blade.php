@extends('backend/layouts/app')
@section('title','kendaraan')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Kendaraan</h1>
      <h6 class="mb-2">Manage Data Kendaraan</h6>
      @include('backend/layouts/alert')
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{url('/manage/vechile/create')}}" class="btn btn-md btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
          <table class="table" width="100%" id="dataTable">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="20%">Nama</th>
                <th width="20%">Nomor Polisi</th>
                <th width="20%">Status</th>
                <th width="15%">Foto</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data as $d)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->police_number }}</td>
                  <td>
                    @if($d->status == 'Not')
                      <span class="badge badge-pill badge-danger">Dipinjam</span>
                    @else 
                      <span class="badge badge-pill badge-primary">Tersedia</span>
                    @endif
                  </td>
                  <td><img src="{{asset('img/vechile/'.$d->photo)}}" class="shadow" width="100"></td>
                  <td>
                    <a @if($d->status == 'Not') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/vechile/edit/'.$d->id)}}" class="btn btn-primary btn-sm" @endif><img src="{{asset('img/icon/edit.svg')}}"></a>
                    <a @if($d->status == 'Not') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/vechile/destroy/'.$d->id)}}" class="btn btn-danger btn-sm" @endif><img src="{{asset('img/icon/delete.svg')}}"></a>
                    <a @if($d->status == 'Not') href="#" class="btn btn-disabled btn-sm" @else href="{{url('/manage/condition/'.$d->id)}}" class="btn btn-success btn-sm" @endif><img src="{{asset('img/icon/add.svg')}}"></a>
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