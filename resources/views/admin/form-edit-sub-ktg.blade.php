@extends('index')

@section('judul')
Form edit kategori
@endsection

@section('konten-header')
<h1><small>Form edit kategori</small></h1>
@endsection

@section('konten')
<div class="col-md-6">
    <div class="box box-solid box-success">
        <div class="box-header">
            <h3 class="box-title">Form edit kategori</h3>
        </div>
        <!-- form start -->
        <form role="form" action="{{ url('admin-sub-ktg/'.$sub_ktg->id_sub_ktg) }}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group has-success">
                    <label for="judul">Judul</label>
                    <input type="judul" name="nama_sub_ktg" class="form-control" value="{{ $sub_ktg->nama_sub_ktg }}">
                </div>
                <div class="form-group has-success">
                    <label for="kategori">Nama kategori</label>
                    <select name="id_ktg" class="form-control">
                        @foreach($ktg as $a)
                        <option value="{{ $a->id_ktg }}">{{ $a->nama_ktg }}</option>
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