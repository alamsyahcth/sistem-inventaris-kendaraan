@extends('frontend/layouts/app')
@section('title','Pilih Kendaraan')
@section('content')
  <section class="pt-5">
    <div class="container pt-5">
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
                <a href="#" class="link-vechile" data-toggle="modal" data-id="{{ $d->id }}" data-target="#modalQuickView">
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

  <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-5">
              <!--Carousel Wrapper-->
              <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                data-ride="carousel">
                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img class="d-block w-100"
                      src="{{asset('img/mobil.jpg')}}"
                      alt="First slide">
                  </div>
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
              </div>
              <!--/.Carousel Wrapper-->
            </div>
            <div class="col-md-7 pt-3">
              <h3>Daihatsu Sigra</h3>
              <h5>B 12345 MM</h5>
              <p>Deskripsi</p>
              <p class="text-vechile">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
              <a href="{{asset('/data')}}"><button class="btn btn-danger btn-block mt-5">Pinjam</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection