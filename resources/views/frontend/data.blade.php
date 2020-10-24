@extends('frontend/layouts/app')
@section('title','Beranda')
@section('content')
  <section class="all-background pt-5">
    <div class="container pt-3">
      <div class="card card-entry h-100">
        <div class="card-body py-5 px-5">
          <div class="row">
            <div class="col-md-6 p-5 box-right">
              <div class="row">
                <div class="col-md-12">
                  <h4>Data Kendaraan</h4>
                </div>
                <div class="col-md-6 mt-1">
                  <img src="{{asset('img/vechile/'.$vechile->photo)}}" class="img-fluid">
                </div>
                <div class="col-md-6 mt-1">
                  <h3>{{ $vechile->name }}</h3>
                  <h6 class="text-secondary">{{ $vechile->police_number }}</h6>
                  <h6 class="text-danger mt-4">Detail Kendaraan</h6>
                  <table class="table table-bordered mt-1">
                    <tr>
                      <td>
                        <p class="success-text-2">No Stnk</p>
                        <p class="detail-text-success-2">{{ $vechile->stnk_no }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p class="success-text-2">Merk</p>
                        <p class="detail-text-success-2">{{ $vechile->merk }}</p>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <p class="success-text-2">Warna</p>
                        <p class="detail-text-success-2">{{ $vechile->color }}</p>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6 p-5">
              <h4>Form Data Peminjam</h4>
              <form class="form-horizontal mt-4" action="{{url('/create-order')}}" method="post">
                <div class="form">
                  @csrf
                  <div class="form-group">
                    <input type="number" name="nik" class="form-control @if ($message = Session::get('failed_nik')) is-invalid @endif @error('nik') is-invalid @enderror" autocomplete="name" placeholder="Isi Nomor Induk Karyawan">
                    @error('nik')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    @if ($message = Session::get('failed_nik'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @endif
                  </div>
                  <input type="hidden" name="vechile_id" value="{{ $vechile->id }}">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('img/calendar.svg')}}"></span>
                          </div>
                          <input type="text" name="date_start" class="form-control datepicker @if ($message = Session::get('failed')) is-invalid @endif  @error('date_start') is-invalid @enderror" autocomplete="date_start" placeholder="Tanggal Pinjam" aria-label="Username" aria-describedby="basic-addon1">
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
                          <input type="text" name="date_end" class="form-control datepicker @error('date_end') is-invalid @enderror" autocomplete="date_end" placeholder="Tanggal Kembali" aria-label="Username" aria-describedby="basic-addon1">
                          @error('date_end')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea type="textarea" name="reason" class="form-control @error('reason') is-invalid @enderror" autocomplete="reason" placeholder="Alasan Peminjaman"></textarea>
                    @error('reason')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group pt-3">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" required>
                      <label class="form-check-label" for="inlineCheckbox1"><a href="{{ url('/peraturan') }}">Saya menyetujui dan maemahami persyaratan yang berlaku</a></label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" name="save" value="Kirim Permohonan" class="btn btn-danger btn-md btn-block"/>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection