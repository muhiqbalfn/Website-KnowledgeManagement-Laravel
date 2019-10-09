@extends('index')

@section('judul')
User
@endsection

@section('konten-header')
<h1><small>Daftar data </small></h1>
<!-- SweetAlert -->
@include('sweet::alert')
@endsection

@section('konten')
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="box box-solid nav-tabs-custom" style="background-color: #F5F5F5;">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Modul Pelatihan</a></li>
            <li><a href="#tab_2" data-toggle="tab">Laporan Hasil Pelatihan</a></li>
            <li><a href="#tab_3" data-toggle="tab">Sertifikat Pelatihan</a></li>
            <li><a href="#tab_4" data-toggle="tab">Evaluasi Level 1</a></li>
            <li class="box-tools pull-right">
                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
            </li>
        </ul>
        <div class="tab-content col-md-12 box-body">
            <div class="tab-pane active" id="tab_1">
                <!--MODUL----------------------------------------------------------------------------------------------->
                @foreach($modul as $a)
                <div class="col-md-3" style="margin-top: 25px;">
                    <!-- Info box -->
                    <div class="box box-info" style="background-color: #f9f9f9; box-shadow: 1px 1px 1px gray;">
                        <div class="box-header">
                            <h3 class="box-title">Modul</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="height: 170px;">
                            <h4 style="color: #5F9EA0;"><i><u>{{$a->nama_modul}}</u></i></h4>
                            <p>
                                {{$a->ket_modul}}.
                            </p>
                            <p><code>{{$a->file_modul}}</code></p>
                            <div class="label bg-aqua">{{$a->created_at}}</div>
                        </div>
                        <div class="box-footer">
                            <table class="table table-hover" style="background-color:#F5F5F5;">
                                <tr>
                                @if (Auth::guest())
                                @else
                                @if(Auth::user()->level == 'admin')
                                <a href="{{ url('admin-modul/'.$a->id_modul.'/edit') }}" class="btn btn-link" style="color: blue;">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <form action="{{url('admin-modul/'.$a->id_modul)}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="Delete">
                                    <button type="submit" class="btn btn-link" onclick="return confirm('Anda yakin hapus dokumen ini ?')">
                                        <i class="glyphicon glyphicon-trash" style="color: red;"></i>
                                    </button>
                                </form>
                                @endif
                                @endif
                                <a href="{{ asset('web/viewer.html?file='.$a->file_modul) }}" target='_blank' class="btn btn-link">
                                    <i class="glyphicon glyphicon-download"></i> &nbsp;Download
                                </a>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_2">
                <!--LAPORAN--------------------------------------------------------------------------------------------->
                @foreach($laporan as $a)
                <div class="col-md-3" style="margin-top: 25px;">
                    <!-- Info box -->
                    <div class="box box-info" style="background-color: #f9f9f9">
                        <div class="box-header">
                            <h3 class="box-title">Laporan</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="height: 170px;">
                            <h4 style="color: #5F9EA0;"><i><u>{{$a->nama_laporan}}</u></i></h4>
                            <p>
                                {{$a->ket_laporan}}.
                            </p>
                            <p><code>{{$a->file_laporan}}</code></p>
                            <div class="label bg-aqua">{{$a->created_at}}</div>
                        </div>
                        <div class="box-footer">
                            <table class="table table-hover" style="background-color:#F5F5F5;">
                                <tr>
                                @if (Auth::guest())
                                @else
                                @if(Auth::user()->level == 'admin')
                                <a href="{{ url('admin-laporan/'.$a->id_laporan.'/edit') }}" class="btn btn-link" style="color: blue;">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <form action="{{url('admin-laporan/'.$a->id_laporan)}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="Delete">
                                    <button type="submit" class="btn btn-link" onclick="return confirm('Anda yakin hapus dokumen ini ?')">
                                        <i class="glyphicon glyphicon-trash" style="color: red;"></i>
                                    </button>
                                </form>
                                @endif
                                @endif
                                <a href="{{ asset('web/viewer.html?file='.$a->file_laporan) }}" target='_blank' class="btn btn-link">
                                    <i class="glyphicon glyphicon-download"></i> &nbsp;Download
                                </a>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_3">
                <!--SERTIFIKAT------------------------------------------------------------------------------------------>
                @foreach($sertifikat as $a)
                <div class="col-md-3" style="margin-top: 25px;">
                    <!-- Info box -->
                    <div class="box box-info" style="background-color: #f9f9f9">
                        <div class="box-header">
                            <h3 class="box-title">Sertifikat</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="box-body" style="height: 170px;">
                            <h4 style="color: #5F9EA0;"><i><u>{{$a->nama_sertifikat}}</u></i></h4>
                            <p>
                                {{$a->ket_sertifikat}}.
                            </p>
                            <p><code>{{$a->file_sertifikat}}</code></p>
                            <div class="label bg-aqua">{{$a->created_at}}</div>
                        </div>
                        <div class="box-footer">
                            <table class="table table-hover" style="background-color:#F5F5F5;">
                                <tr>
                                @if (Auth::guest())
                                @else
                                @if(Auth::user()->level == 'admin')
                                <a href="{{ url('admin-sertifikat/'.$a->id_sertifikat.'/edit') }}" class="btn btn-link" style="color: blue;">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <form action="{{url('admin-sertifikat/'.$a->id_sertifikat)}}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="Delete">
                                    <button type="submit" class="btn btn-link" onclick="return confirm('Anda yakin hapus dokumen ini ?')">
                                        <i class="glyphicon glyphicon-trash" style="color: red;"></i>
                                    </button>
                                </form>
                                @endif
                                @endif
                                <a href="{{ asset('web/viewer.html?file='.$a->file_sertifikat) }}" target='_blank' class="btn btn-link">
                                    <i class="glyphicon glyphicon-download"></i> &nbsp;Download
                                </a>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_4">
                <!--EVALUASI-------------------------------------------------------------------------------------------->
                <div class="col-md-12">
                    <div class="col-md-9">
                        <div class="box box-success">
                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pernyataan</th>
                                            <th>SS</th>
                                            <th>S</th>
                                            <th>TS</th>
                                            <th>STS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form role="form" action="{{ url('admin-eval/1') }}" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        {{ csrf_field() }}
                                        <?php $no=0; ?>
                                        @foreach($eval as $a)
                                        <?php $no++ ?>
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $a->nama_evaluasi }}</td>
                                            <td><input type="checkbox" name="ss[]" value="1"/></td>
                                            <td><input type="checkbox" name="s[]" value="1"/></td>
                                            <td><input type="checkbox" name="ts[]" value="1"/></td>
                                            <td><input type="checkbox" name="sts[]" value="1"/></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td><textarea name="saran" cols="85" rows="4" placeholder="Masukan saran"></textarea></td>
                                            <td colspan="4" align="center">
                                                <button type="submit" class="btn btn-success" style="width: 150px;"></i> Kirim</button>
                                            </td>
                                        </tr>

                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <table id="datatable" class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>SS</b></td>
                                    <td>Sangat setuju</td>
                                </tr>
                                <tr>
                                    <td><b>S</b></td>
                                    <td>Setuju</td>
                                </tr>
                                <tr>
                                    <td><b>TS</b></td>
                                    <td>Tidak setuju</td>
                                </tr>
                                <tr>
                                    <td><b>STS</b></td>
                                    <td>Sangat tidak setuju</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------>
                
            </div>
        </div>
    </div>
</div>
@endsection