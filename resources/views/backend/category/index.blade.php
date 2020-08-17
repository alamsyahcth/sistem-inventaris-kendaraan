@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Kategori</h1>
      <h6 class="mb-2">Manage Data Kategori Kendaraan</h6>
      @include('backend/layouts/alert')
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{url('/manage/category/create')}}" class="btn btn-md btn-success">Tambah Data</a>
        </div>
        <div class="card-body">
          <table class="table" width="100%" id="dataTable">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="20%">Nama</th>
                <th width="20%">Slug</th>
                <th width="35%">Description</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data as $d)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->slug }}</td>
                  <td>{{ $d->description }}</td>
                  <td>
                    <a href="{{url('/manage/category/edit/'.$d->id)}}" class="btn btn-primary btn-sm"><img src="{{asset('img/icon/edit.svg')}}"></a>
                    <a href="{{url('/manage/category/destroy/'.$d->id)}}" class="btn btn-danger btn-sm"><img src="{{asset('img/icon/delete.svg')}}"></a>
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