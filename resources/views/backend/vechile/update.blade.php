@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Edit Data Karyawan</h1>
      <h6>Manage Data Kategori Kendaraan</h6>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action={{url('/manage/vechile/update/'.$data->id)}} method="post" enctype="multipart/form-data">
            @csrf
            <div class="form">

              <div class="form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" value="{{ $data->name }}" placeholder="Input nama kendaraan"/>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" autocomplete="category_id">
                  @foreach ($category as $c)
                    <option @if($c->id == $data->category_id) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="police_number" class="form-control @error('police_number') is-invalid @enderror" autocomplete="police_number" value="{{ $data->police_number }}" placeholder="Input Nomor Polisi"/>
                @error('police_number')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="stnk_no" class="form-control @error('stnk_no') is-invalid @enderror" autocomplete="stnk_no" value="{{ $data->stnk_no }}" placeholder="Input Nomor STNK"/>
                @error('stnk_no')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" autocomplete="color" value="{{ $data->color }}" placeholder="Input Warna"/>
                @error('color')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" autocomplete="merk" value="{{ $data->merk }}" placeholder="Input merk kendaraan"/>
                @error('merk')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="no_rangka" class="form-control @error('no_rangka') is-invalid @enderror" autocomplete="no_rangka" value="{{ $data->no_rangka }}" placeholder="Input nomor rangka"/>
                @error('no_rangka')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="no_mesin" class="form-control @error('no_mesin') is-invalid @enderror" autocomplete="no_mesin" value="{{ $data->no_mesin }}" placeholder="Input nomor mesin"/>
                @error('no_mesin')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="input-group mb-3">
                <input type="hidden" name="old_photo" value="{{ $data->photo }}">
                <input type="file" name="photo" class="form-control">
              </div>
              <img src="{{asset('img/vechile/'.$data->photo)}}" class="shadow mb-3" width="100">
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