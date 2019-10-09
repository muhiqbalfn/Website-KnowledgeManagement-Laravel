@extends('index')

@section('judul')
Grafik evaluasi diklat
@endsection

@section('konten-header')
<b>Evaluasi diklat</b>
@endsection

@section('konten')
<div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="box box-solid nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Grafik evaluasi</a></li>
            <li><a href="#tab_2" data-toggle="tab">Saran evaluasi</a></li>
            <li class="box-tools pull-right">
                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-primary btn-xs" data-widget="remove"><i class="fa fa-times"></i></button>
            </li>
        </ul>
        <div class="tab-content col-md-12 box-body">
            <div class="tab-pane active" id="tab_1">
                <!--GRAFIK EVALUASI------------------------------------------------------------------------------------->
                <div class="col-md-12" align="center">
                    <div class="col-md-12">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px;">
                        <div class="box box-success">
                            <div class="box-body table-responsive">
                                <table id="datatable" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Pernyataan evaluasi</th>
                                            <th>SS</th>
                                            <th>S</th>
                                            <th>TS</th>
                                            <th>STS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($eval as $a)
                                        <tr>
                                            <td>{{ $a->id_evaluasi }}</td>
                                            <td>{{ $a->nama_evaluasi }}</td>
                                            <td>{{ $a->ss }}</td>
                                            <td>{{ $a->s }}</td>
                                            <td>{{ $a->ts }}</td>
                                            <td>{{ $a->sts }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------>
            </div>
            <div class="tab-pane" id="tab_2">
                <!--FORM------------------------------------------------------------------------------------------------>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <ul class="timeline">
                            <li>
                                <i class="fa fa-user bg-aqua"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header no-border"><a href="#">Karyawan PDAM Surya Sembada Surabaya</a></h3>
                                </div>
                            </li>
                            <li class="time-label">
                                <span class="bg-green">
                                    3 Jan. 2014
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                    <h3 class="timeline-header"><a href="#"><i>Kritik dan saran</i></a></h3>
                                    <div class="timeline-body">
                                        Diklat yang dilakukan sudah berjalan lancar dan berhasil sampai akhir,
                                        pemateri yang menjelaskan kurang menguasai materi dan pertanyaan
                                        sehingga para hadirin yang memberikan pertanyaan tidak dijawab
                                        dengan maksimal dan hanya sepahamnya saja...
                                    </div>
                                    <div class='timeline-footer'>
                                        <a class="btn btn-primary btn-xs">Read more</a>
                                        <a class="btn btn-danger btn-xs">Delete</a>
                                    </div>
                                </div>
                            </li>

                            @foreach($saran as $a)
                            <li class="time-label">
                                <span class="bg-green">
                                    {{ $a->created_at }}
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                    <h3 class="timeline-header"><a href="#"><i>Kritik dan saran</i></a></h3>
                                    <div class="timeline-body">
                                        {{ $a->saran }}
                                    </div>
                                    <div class='timeline-footer'>
                                        <a class="btn btn-primary btn-xs">Read more</a>
                                        <a class="btn btn-danger btn-xs">Delete</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            
                            <li>
                                <i class="fa fa-clock-o"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------>
            </div>
            
        </div>
    </div>
</div>


<!-- ============================================================================================ -->
<script>
var year = ['1','2','3'];
var data_ss  = <?php echo $ss; ?>;
var data_s   = <?php echo $s; ?>;
var data_ts  = <?php echo $ts; ?>;
var data_sts = <?php echo $sts; ?>;

var barChartData = {
    labels: year,
    datasets: [{
        label: 'SS',
        backgroundColor: "#33FF66",
        data: data_ss
    }, {
        label: 'S',
        backgroundColor: "#4169E1",
        data: data_s
    }, {
        label: 'TS',
        backgroundColor: "yellow",
        data: data_ts
    }, {
        label: 'STS',
        backgroundColor: "red",
        data: data_sts
    }]
};

window.onload = function() {
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            elements: {
                rectangle: {
                    borderWidth: 1,
                    borderColor: 'black',
                    borderSkipped: 'bottom'
                }
            },
            responsive: true,
            title: {
                display: true,
                text: 'Grafik evaluasi'
            }
        }
    });
};
</script>

@endsection