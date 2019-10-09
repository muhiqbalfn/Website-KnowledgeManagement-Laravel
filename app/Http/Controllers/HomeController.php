<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

//Model
use App\KtgModel;
use App\SubKtgModel;
use App\CounterModel;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Alert;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {

        //visitor counter
        $visitor_ip=$_SERVER['REMOTE_ADDR'];

        $visit = CounterModel::find($visitor_ip); 
        if ($visit->ip_addres != $visitor_ip){
            $user = new CounterModel;
            $user->id = $visitor_ip;
            $user->ip_addres = $visitor_ip;
            $user->save();
        }

        //menampilkan jumlah visitor
        $data['count'] = CounterModel::count();

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
        
        return view('main-home',$data);
    }

    //--------------------------------------------------
    public function create(){
    }
    public function store(Request $request){
    }

    //--------------------------------------------------
    //show left menu
    public function show($id){
        //left-menu
        //-----------------------------------------
        $data['sub_ktg1'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','1')->get();
        //-----------------------------------------
        $data['sub_ktg2'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','2')->get();
        //-----------------------------------------
        $data['sub_ktg3'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','3')->get();
        //-----------------------------------------
        $data['sub_ktg4'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','4')->get();
        //-----------------------------------------
        $data['data'] = DB::table('tb_data')
        ->join('tb_sub_kategori','tb_data.id_sub_kategori','=','tb_sub_kategori.id_sub_kategori')
        ->where('tb_data.id_sub_kategori','=',$id)
        ->get();
        return view('main-home',$data);
    }

    //--------------------------------------------------
    public function edit($id){
        //left-menu
        //-----------------------------------------
        $data['sub_ktg1'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','1')->get();
        //-----------------------------------------
        $data['sub_ktg2'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','2')->get();
        //-----------------------------------------
        $data['sub_ktg3'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','3')->get();
        //-----------------------------------------
        $data['sub_ktg4'] = DB::table('tb_sub_kategori')
        ->where('id_kategori','=','4')->get();
        //-----------------------------------------
        $data['data'] = DataModel::find($id); 
        $data['sub_ktg'] = SubKategoriModel::all();
        return view('admin.form-edit-data',$data);
    }
    public function update(Request $request, $id){
        DataModel::find($id)->update($request->all());
        return redirect('home-data');
    }

    //--------------------------------------------------
    public function destroy($id){
        DataModel::find($id)->delete();
        return redirect('home-data');
    }
}