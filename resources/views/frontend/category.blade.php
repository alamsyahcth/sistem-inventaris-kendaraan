@extends('frontend/layouts/app')
@section('title','Pilih Kendaraan')
@section('content')
  <section class="pt-5">
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-12 px-3">
          <h1>Pilih Kendaraan</h1>
        </div>
      </div>
      <div class="row align-item-center">
        <div class="col-md-6">
          <p class="text-vechile mt-3">Ditemukan 50 Kendaraan</p>
          <a href="{{ url('/')}}" class="btn btn-outline-secondary mr-2">Semua</a>
          @foreach ($category as $c)
            <a href="{{ url('/category/'.$c->slug )}}" class="btn @if(Request::is('category/'.$c->slug)) btn-secondary @else btn-outline-secondary @endif mr-2">{{ $c->name }}</a>
          @endforeach
        </div>
        <div class="col-md-6">
          <form class="form-inline text-right" action="{{url('/search')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="text-right w-100">
              <input type="text" name="keyword" class="form-control" placeholder="cari kendaraan">
              <button type="submit" class="btn btn-secondary ml-1">Cari</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row h-100">
        @if($count > 0)
          @foreach($data as $d)
            <div class="col-md-3 p-3">
              <figure>
                <a href="{{url('/data/'.$d->slug)}}">
                  <div class="card card-vechile">
                    <img src="{{asset('img/vechile/'.$d->photo)}}" class="card-img-top">
                    <div class="card-body card-body-vechile">
                      <h4>{{ $d->merk }}&nbsp;{{ $d->name }}</h4>
                      <p class="text-dark text-vechile">{{ $d->police_number }}</p>
                    </div>
                  </div>
                </a>
              </figure>
            </div>
          @endforeach
        @else
          <div class="col-md-12 mt-5 pt-5 text-center">
            <img src="{{asset('img/illustration/empty.svg')}}" class="img-fluid">
            <h4 class="text-dark mt-3">Maaf Kendaraan Tidak Ditemukan</h4>
            <a href="{{url('/')}}" class="btn btn-outline-danger mt-3">Tampilkan Semua</a>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection