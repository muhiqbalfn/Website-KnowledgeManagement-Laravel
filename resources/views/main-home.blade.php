@extends('index')

@section('judul')
Dashboard
@endsection

@section('konten-header')
<h1><small>Knowledge Management</small></h1>
@endsection

@section('konten')
<div class="col-md-12" style="margin-top: 20px;">
    <div class="col-md-3">
        <!-- small box -->
        <div class="small-box bg-aqua" style="box-shadow: 2px 2px 10px gray;">
            <div class="inner">
                <h3>
                    25<sup style="font-size: 20px">%</sup>
                </h3>
                <p>
                    Modul/Materi Pelatihan
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ url('/user-diklat') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-3">
        <!-- small box -->
        <div class="small-box bg-green" style="box-shadow: 2px 2px 10px gray;">
            <div class="inner">
                <h3>
                    25<sup style="font-size: 20px">%</sup>
                </h3>
                <p>
                    Laporan Pelatihan
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/user-diklat') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-3">
        <!-- small box -->
        <div class="small-box bg-yellow" style="box-shadow: 2px 2px 10px gray;">
            <div class="inner">
                <h3>
                    25<sup style="font-size: 20px">%</sup>
                </h3>
                <p>
                    Sertifikat Pelatihan
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/user-diklat') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col -->
    <div class="col-md-3">
        <!-- small box -->
        <div class="small-box bg-red" style="box-shadow: 2px 2px 10px gray;">
            <div class="inner">
                <h3>
                    25<sup style="font-size: 20px">%</sup>
                </h3>
                <p>
                    Evaluasi Level 1
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ url('/user-diklat') }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div><!-- ./col-->
</div>
<div class="col-md-12" style="margin-top: 25px;">
    <div class="col-md-3">
        <div class="pull-left" style="width:100%;
            margin:auto;
            text-align:center;">
            <h3 style="background-color: #87CEEB;
                        color:white;
                        padding:15px;
                        margin:0px;
                        box-shadow: 2px 2px 2px gray;">
                Visitor Counter &nbsp;<i class="fa fa-male"></i>
            </h3>
            <h3 style="font-size: 9em;
                       padding:20px;
                       border: double #C0C0C0;
                       height: 400px;
                       width: 100%;
                       margin:0px;
                       margin-left: 1px;">
                        <div style="margin-top: 80px;">
                            {{ $count }}
                        </div>
            </h3>
        </div>
    </div>
    <div class="col-md-9">
        <!-- Calendar -->
        <div class="box box-solid ">
            <div class="box-header">
                <i class="fa fa-unsorted"></i>
                <h3 class="box-title">Knowledge</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
                </div>
            </div>
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" align="center" style="height: 370px;">
                                    <div class="item active">
                                        <img src="img/slide/img1.png" width="430" alt="First slide">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="img/slide/img2.png" width="430" alt="Second slide">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="img/slide/img3.png" width="430" alt="Third slide">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>                                                                        
            </div>
        </div>   
    </div>
</div>

@endsection