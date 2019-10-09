@extends('index')

@section('judul')
User
@endsection

@section('konten-header')
<h1><small>Daftar diklat </small></h1>
<!-- SweetAlert -->
@include('sweet::alert')
@endsection

@section('konten')
@foreach($diklat as $a)
<div class="col-md-3">
    <!-- small box -->
    <div class="small-box bg-aqua" style="box-shadow: 2px 2px 10px gray;">
        <div class="inner">
            <h3>
                Pelatihan
            </h3>
            <p>
                {{$a->nama_diklat}}<br>
                ( {{$a->tempat_diklat}} )
            </p>
        </div>
        <div class="icon">
            <i class="ion ion-ios7-pricetag-outline"></i>
        </div>
        <a href="{{ url('user-data/'.$a->id_diklat) }}" class="small-box-footer">
            <small class="badge pull-right badge-success" style="background-color: #32CD32;">diklat</small>
            More info diklat &nbsp;<i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
@endforeach

@endsection