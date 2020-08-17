@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Edit Data Kategori</h1>
      <h6>Manage Data Kategori Kendaraan</h6>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action={{url('/manage/category/update/'.$data->id)}} method="post" enctype="multipart/form-data">
            @csrf
            <div class="form">
              <div class="form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{$data->name}}" placeholder="Input nama kategori"/>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <textarea type="textarea" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" placeholder="Input deskripsi kategori">{{$data->description}}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" name="save" value="Simpan" class="btn btn-primary btn-md">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection