<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

//model
use App\ModulModel;
use App\LaporanModel;
use App\SertifikatModel;
use App\DiklatModel;
use App\KtgModel;
use App\SubKtgModel;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminSubKtgController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_sub_ktg' => 'required|min:3|max:20'
        ],[
            'nama_sub_ktg.required' => 'Judul harus di isi',
            'nama_sub_ktg.min' => 'Judul minimal 5 karakter',
            'nama_sub_ktg.max' => 'Judul maximal 20 karakter',
        ]);

        SubKtgModel::create($request->all());

        Alert::success('Data berhasil tersimpan.', 'Berhasil !');
        return redirect('admin2');
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

        $data['sub_ktg'] = SubKtgModel::find($id); 
        $data['ktg'] = KtgModel::all();

        return view('admin.form-edit-sub-ktg',$data);
    }

    public function update(Request $request, $id){
        SubKtgModel::find($id)->update($request->all());

        Alert::success('Data berhasil dirubah.', 'Berhasil !');
        return redirect('admin2');
    }

    //--------------------------------------------------
    public function destroy($id){
        SubKtgModel::find($id)->delete();

        Alert::success('Data berhasil dihapus.', 'Berhasil !');
        return redirect('admin2');
    }
}