@extends('backend/layouts/app')
@section('title','kendaraan')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Data Kondisi Kendaraan</h1>
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
          <form class="form-horizontal" action={{url('/manage/condition/store/')}} method="post" enctype="multipart/form-data">
            <div class="form">
              <div class="row">
                <div class="col-md-10">
                  @csrf
                  <input type="hidden" name="vechile_id" value="{{ $data->id }}">
                  <input type="text" name="damage_location" class="form-control" placeholder="masukkan letak dan kondisi kerusakan kendaraan">
                </div>
                <div class="col-md-1">
                  <input type="submit" name="save" value="Simpan" class="btn btn-md btn-primary">
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="card-body">
          <table class="table" width="100%" id="dataTable">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th width="750%">Kondisi Kerusakan</th>
                <th width="20%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($condition as $c)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $c->damage_location }}</td>
                  <td>
                    <a href="{{url('/manage/condition/destroy/'.$c->id.'/'.$data->id)}}" class="btn btn-danger btn-sm"><img src="{{asset('img/icon/delete.svg')}}"></a>
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