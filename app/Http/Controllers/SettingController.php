<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        return view('menu.setting.index');
    } 

    public function show(){
        return Setting::first();
    }

    public function update(Request $request){
        $setting = Setting::first();
        $setting->nama_toko = $request->nama_toko;
        $setting->telpon = $request->telepon;
        $setting->alamat = $request->alamat;
        $setting->diskon = $request->diskon;
        $setting->tipe_nota = $request->tipe_nota;

        if($request->hasFile('path_logo')) {
            $file = $request->file('path_logo');
            $nama = 'logo-' . \date('Y-m-dHis').  '.'.$file->getClientOriginalExtension();
            $file->move(\public_path('/img'), $nama);

            $setting->path_logo = "/img/$nama";
        }

        if($request->hasFile('path_kartu_member')) {
            $file = $request->file('path_kartu_member');
            $nama = 'kartu-member-' . \date('Y-m-dHis'). '.'.$file->getClientOriginalExtension();
            $file->move(\public_path('/img'), $nama);

            $setting->path_kartu_member = "/img/$nama";
        }
        
        $setting->update();

        return response()->json([
            'status' => '200',
            'data' => $setting,
            'message' => 'Data berhasil diupdate'
        ]);
    }
}
