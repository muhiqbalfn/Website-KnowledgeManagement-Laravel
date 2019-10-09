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
use App\Evaluasi;
use App\Saran;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Alert;

class AdminEvalController extends Controller
{

    //--------------------------------------------------
    public function store(Request $request){
        //validasi
        $this->validate(request(), [
            'nama_evaluasi' => 'required|min:5|max:100'
        ],[
            'nama_evaluasi.required' => 'Nama evaluasi harus di isi',
            'nama_evaluasi.min' => 'Nama evaluasi minimal 5 karakter',
            'nama_evaluasi.max' => 'Nama evaluasi maximal 100 karakter',
        ]);

        Evaluasi::create($request->all());

        Alert::success('List evaluasi berhasil tersimpan.', 'Berhasil !');
        return redirect('admin3');
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

        $data['eval'] = Evaluasi::find($id); 
        $data['diklat'] = DiklatModel::all();

        return view('admin.form-edit-eval',$data);
    }

    public function update(Request $request, $id){
        
        $go = Evaluasi::findOrFail($id);
            $go->ss  = $go->ss + 1;
            $go->s   = $go->s + 0;
            $go->ts  = $go->ts + 1;
            $go->sts = $go->sts + 0;
            //$go->ss = explode(",",$request->ss);
            $go->save();

        $saran = new Saran;
            $saran->saran = $request->input('saran');
            $saran->id_diklat = 1;
            $saran->save();

        Alert::success('Evaluasi anda berhasil tersimpan.', 'Berhasil !');
        return redirect('user-diklat');
    }

    //--------------------------------------------------
    public function destroy($id){
        Evaluasi::find($id)->delete();

        Alert::success('List evaluasi berhasil dihapus.', 'Berhasil !');
        return redirect('admin3');
    }

    public function loadGrafik($id){
        //left-menu
        //-----------------------------------------
        $data1 = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','1')->get();
        //-----------------------------------------
        $data2 = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','2')->get();
        //-----------------------------------------
        $data3 = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','3')->get();
        //-----------------------------------------
        $data4 = DB::table('tb_sub_ktg')
        ->where('id_ktg','=','4')->get();
        //-----------------------------------------

        //grafik value
        //----------------------------------------------------------------
        $ss = Evaluasi::select(DB::raw('SUM(ss) as count'))
            ->orderBy('id_evaluasi', 'ASC')
            ->groupBy(DB::raw('nama_evaluasi'))
            ->where('id_diklat','=', $id)
            ->get()->toArray();
        $ss = array_column($ss, 'count');
        //-----------------------------------------------------------------
        $s = Evaluasi::select(DB::raw('SUM(s) as count'))
            ->orderBy('id_evaluasi', 'ASC')
            ->groupBy(DB::raw('nama_evaluasi'))
            ->where('id_diklat','=', $id)
            ->get()->toArray();
        $s = array_column($s, 'count');
        //-----------------------------------------------------------------
        $ts = Evaluasi::select(DB::raw('SUM(ts) as count'))
            ->orderBy('id_evaluasi', 'ASC')
            ->groupBy(DB::raw('nama_evaluasi'))
            ->where('id_diklat','=', $id)
            ->get()->toArray();
        $ts = array_column($ts, 'count');
        //-----------------------------------------------------------------
        $sts = Evaluasi::select(DB::raw('SUM(sts) as count'))
            ->orderBy('id_evaluasi', 'ASC')
            ->groupBy(DB::raw('nama_evaluasi'))
            ->where('id_diklat','=', $id)
            ->get()->toArray();
        $sts = array_column($sts, 'count');
        //-----------------------------------------------------------------
        //rows id_evaluasi (label)
        //-----------------------------------------------------------------
        $id_eval = Evaluasi::select(DB::raw('id_evaluasi'))
            ->orderBy('id_evaluasi', 'ASC')
            ->where('id_diklat','=', $id)
            ->get()->toArray();
        
        //-----------------------------------------------------------------

        //tb_evaluasi
        $data = DB::table('tb_evaluasi')
        ->join('tb_diklat','tb_evaluasi.id_diklat','=','tb_diklat.id_diklat')
        ->where('tb_evaluasi.id_diklat','=', $id)
        ->get();

        //tb_saran
        $saran = DB::table('tb_saran')
        ->where('id_diklat','=', $id)
        ->get();

        return view('admin.home-admin-grafik')
                ->with('sub_ktg1',$data1)
                ->with('sub_ktg2',$data2)
                ->with('sub_ktg3',$data3)
                ->with('sub_ktg4',$data4)
                ->with('eval',$data)
                ->with('saran',$saran)
                ->with('ss',json_encode($ss,JSON_NUMERIC_CHECK))
                ->with('s',json_encode($s,JSON_NUMERIC_CHECK))
                ->with('ts',json_encode($ts,JSON_NUMERIC_CHECK))
                ->with('sts',json_encode($sts,JSON_NUMERIC_CHECK))
                ->with('id_eval',json_encode($id_eval,JSON_NUMERIC_CHECK));
    }

}