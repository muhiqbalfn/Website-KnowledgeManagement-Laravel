<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//model
use App\ModulModel;
use App\LaporanModel;
use App\SertifikatModel;
use App\DiklatModel;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminLaporanController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_laporan' => 'required|min:3|max:30',
            'ket_laporan' => 'required|min:10'
        ],[
            'nama_laporan.required' => 'Judul harus di isi',
            'nama_laporan.min' => 'Judul minimal 5 karakter',
            'nama_laporan.max' => 'Judul maximal 30 karakter',
            'ket_laporan.required' => 'Keterangan harus di isi',
            'ket_laporan.min' => 'Keterangan minimal 10 karakter',
        ]);

        $user = new LaporanModel;
        $user->nama_laporan = Input::get('nama_laporan');
        $user->ket_laporan  = Input::get('ket_laporan');
        $user->id_diklat  = Input::get('id_diklat');
        if (Input::hasFile('file_laporan')) {
            $file = Input::file('file_laporan');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $user->file_laporan = $file->getClientOriginalName();
            $user->type = $file->getClientMimeType();
            $user->save();
            
            Alert::success('Data laporan berhasil tersimpan.', 'Berhasil !');
            return redirect('admin');
        }
        else
        {
            Alert::error('Data laporan gagal tersimpan.', 'Oops... !');
            return redirect('admin');
        }
    }

    //--------------------------------------------------
    public function edit($id){
        //left-menu
        //-----------------------------------------
        $data['sub_ktg1'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','1')->get();
        //-----------------------------------------
        $data['sub_ktg2'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','2')->get();
        //-----------------------------------------
        $data['sub_ktg3'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','3')->get();
        //-----------------------------------------
        $data['sub_ktg4'] = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','4')->get();
        //-----------------------------------------

        $data['laporan'] = LaporanModel::find($id); 
        $data['diklat'] = DiklatModel::all();

        return view('admin.form-edit-laporan',$data);
    }

    public function update(Request $request, $id){
        $data = LaporanModel::findOrFail($id);
        $data->nama_laporan = $request->input('nama_laporan');
        $data->ket_laporan  = $request->input('ket_laporan');
        $data->id_diklat  = $request->input('id_diklat');

        if (empty($request->file('file_laporan')))
        {
            $data->file_laporan = $data->file_laporan;
        }
        else
        {
            //unlink('file/'.$data->file_modul); //menghapus file lama
            $file = Input::file('file_laporan');
            $file->move(public_path().'/file', $file->getClientOriginalName());

            $data->file_laporan = $file->getClientOriginalName();
            $data->type = $file->getClientMimeType();
        }
        $data->save();

        Alert::success('Data laporan berhasil dirubah.', 'Berhasil !');
        return redirect('admin');
    }

    //--------------------------------------------------
    public function destroy($id){
        LaporanModel::find($id)->delete();

        Alert::success('Data laporan berhasil dihapus.', 'Berhasil !');
        return redirect('admin');
    }
}