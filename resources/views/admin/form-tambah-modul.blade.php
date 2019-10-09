<div class="modal" id="modal-form-modul" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
                <h3 class="modal-title"></h3>
            </div>

            <div class="modal-body">
                <!-- -------------------------------------------------------------------------------------------- -->
                <form role="form" action="{{ url('admin-modul') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group has-success has-feedback{{ $errors->has('nama_modul') ? 'has-error' : '' }}">
                            <label class="control-label">Judul</label>
                            <input type="text" name="nama_modul" class="form-control" placeholder="Judul" value="{{ old('nama_modul') }}" required>
                            @if($errors->has('nama_modul'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('nama_modul')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success has-feedback{{ $errors->has('ket_modul') ? 'has-error' : '' }}">
                            <label class="control-label">Keterangan</label>
                            <textarea name="ket_modul" class="form-control" placeholder="Keterangan" value="{{ old('ket_modul') }}" required></textarea>
                            @if($errors->has('ket_modul'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('ket_modul')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label">File modul</label>
                            <input type="file" name="file_modul">
                            <p class="help-block">Upload file berupa pdf, doc, xlc, jpg, png.</p>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label">Nama diklat</label>
                            <select name="id_diklat" class="form-control">
                                @foreach($diklat as $a)
                                <option value="{{ $a->id_diklat }}">{{ $a->nama_diklat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
                    </div>
                </form>
                <!-- -------------------------------------------------------------------------------------------- -->
            </div>
        </div>
    </div>
</div>
