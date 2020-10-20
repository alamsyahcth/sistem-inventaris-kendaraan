@extends('backend/layouts/app')
@section('title','Laporan Pegembalian')
@section('content')
<div class="container-fluid my-4">
  <div class="row">
    <div class="col-md-12">
      <h1 class="font-weight-bold text-dark">Laporan Pengembalian</h1>
      <h6 class="mb-2">Cetak Laporan Pengembalian</h6>
      @include('backend/layouts/alert')
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal" method="post" action="{{ url('/manage/report-pengembalian/print') }}" enctype="multipart/form-data">
            <div class="form-group">
              @csrf
              <div class="row">
                <div class="col-md-12 text-center pb-3 mt-3">
                  <h4 class="text-dark">Harap Isi Tanggal Awal dan Tanggal Akhir Laporan</h4>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><img src="{{asset('img/calendar.svg')}}"></span>
                    </div>
                    <input type="text" name="date_start" class="form-control datepicker-employee @if ($message = Session::get('failed')) is-invalid @endif  @error('date_start') is-invalid @enderror" autocomplete="date_start" placeholder="Tanggal Awal" aria-label="Username" aria-describedby="basic-addon1">
                    @error('date_start')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    @if ($message = Session::get('failed'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><img src="{{asset('img/calendar.svg')}}"></span>
                    </div>
                    <input type="text" name="date_end" class="form-control datepicker-employee @error('date_end') is-invalid @enderror" autocomplete="date_end" placeholder="Tanggal Akhir" aria-label="Username" aria-describedby="basic-addon1">
                    @error('date_end')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="submit" value="Cetak PDF" class="btn btn-danger btn-md btn-block mt-3">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection