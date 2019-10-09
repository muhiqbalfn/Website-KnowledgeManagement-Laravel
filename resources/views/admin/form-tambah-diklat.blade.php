<div class="modal" id="modal-form-diklat" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
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
                <form role="form" action="{{ url('admin-diklat') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group has-success has-feedback{{ $errors->has('nama_diklat') ? 'has-error' : '' }}">
                            <label class="control-label">Judul</label>
                            <input type="text" name="nama_diklat" class="form-control" placeholder="Judul" value="{{ old('nama_diklat') }}" required>
                            @if($errors->has('nama_diklat'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('nama_diklat')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success has-feedback{{ $errors->has('tempat_diklat') ? 'has-error' : '' }}">
                            <label class="control-label">Tempat</label>
                            <input type="text" name="tempat_diklat" class="form-control" placeholder="Tempat diklat" value="{{ old('tempat_diklat') }}" required>
                            @if($errors->has('tempat_diklat'))
                                <span class="help-block" style="color: red;"><p>{{$errors->first('tempat_diklat')}}</p></span>
                            @endif
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label">Nama kategori</label>
                            <select name="id_sub_ktg" class="form-control">
                                @foreach($sub_ktg as $a)
                                <option value="{{ $a->id_sub_ktg }}">{{ $a->nama_sub_ktg }}</option>
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
