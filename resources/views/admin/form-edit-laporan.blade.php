@extends('index')

@section('judul')
Form edit laporan
@endsection

@section('konten-header')
<h1><small>Form edit laporan</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit laporan</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-laporan/'.$laporan->id_laporan) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        	{{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Judul</label>
                    <input type="judul" name="nama_laporan" class="form-control" value="{{ $laporan->nama_laporan }}">
                </div>
                <div class="form-group has-success">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="ket_laporan" class="form-control" value="{{ $laporan->ket_laporan }}">
                </div>
                <div class="form-group has-success">
                    <label for="dokumen">File modul</label>
                    <input type="file" name="file_laporan">
                    <p class="help-block">{{ $laporan->file_laporan }}</p>
                </div>
                <div class="form-group has-success">
                    <label for="kategori">Nama diklat</label>
				    <select name="id_diklat" class="form-control">
				    	@foreach($diklat as $a)
				        <option value="{{ $a->id_diklat }}">{{ $a->nama_diklat }}</option>
				        @endforeach
				    </select>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection