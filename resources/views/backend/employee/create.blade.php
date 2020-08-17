@extends('backend/layouts/app')
@section('title','dashboard')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Tambah Data Karyawan</h1>
      <h6>Manage Data Karyawan</h6>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" action={{url('/manage/employee/store')}} method="post" enctype="multipart/form-data">
            @csrf
            <div class="form">

              <div class="form-group">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="name" placeholder="Input nama karyawan"/>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <select type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" autocomplete="gender">
                  <option value="l">Laki-laki</option>
                  <option value="p">Perempuan</option>
                </select>
                @error('gender')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="born" class="form-control @error('born') is-invalid @enderror" autocomplete="born" placeholder="Input Tempat Lahir"/>
                @error('born')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="birthday" class="form-control datepicker @error('birthday') is-invalid @enderror" autocomplete="birthday" placeholder="Input tanggal lahir"/>
                @error('birthday')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <textarea type="textarea" name="address" class="form-control @error('address') is-invalid @enderror" autocomplete="address" placeholder="Input alamat karyawan"></textarea>
                @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" placeholder="Input email karyawan"/>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-group">
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" autocomplete="phone" placeholder="Input no handphone karyawan"/>
                @error('phone')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" autocomplete="photo" id="inputGroupFile01">
                @error('photo')
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
@endsection