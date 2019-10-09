@extends('index')

@section('judul')
Form edit modul
@endsection

@section('konten-header')
<h1><small>Form edit modul</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit modul</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-modul/'.$modul->id_modul) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
        	{{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Judul</label>
                    <input type="judul" name="nama_modul" class="form-control" value="{{ $modul->nama_modul }}">
                </div>
                <div class="form-group has-success">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="ket_modul" class="form-control" value="{{ $modul->ket_modul }}">
                </div>
                <div class="form-group has-success">
                    <label for="dokumen">File modul</label>
                    <input type="file" name="file_modul">
                    <p class="help-block">{{ $modul->file_modul }}</p>
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