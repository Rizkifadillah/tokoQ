<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;
use App\Models\Setting;
use PDF;
// use Barryvdh\DomPDF\Facades\PDF as PDF;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{

    public function index(){
        return view('menu.penjualan.index');
    }

    public function create(){
        $penjualan = new Penjualan();
        $penjualan->id_member = null;
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = \auth()->id();
        $penjualan->save();

        session(['id_penjualan' => $penjualan->id_penjualan]);

        return \redirect()->route('transaksi.index');
    }

    public function data(){
        $penjualan = Penjualan::orderBy('id_penjualan', 'desc')->get();

        return datatables()
                ->of($penjualan)
                ->addIndexColumn()
                ->addColumn('tanggal',function ($penjualan){
                    return \tanggal_indonesia($penjualan->created_at, false);
                })
                ->addColumn('kode_member', function($penjualan){
                    $span = $penjualan->member['kode_member'] ?? '';
                    $button = ' <span class="badge badge-warning align-center" >'.$span.'</span> ';
                    return $button;
                    // return $penjualan->member['kode_member'] ?? '';
                    // return '<span class="badge badge-warning">'. $penjualan->member['kode_member']. '</span>';
                    // return '<span class="badge badge-warning">'.$penjualan->member['kode_member'] ?? "" .'</span>';
                })
                ->addColumn('total_item', function($penjualan){
                    return  format_uang($penjualan->total_item);
                })
                ->addColumn('total_harga', function($penjualan){
                    return  'Rp '.format_uang($penjualan->total_harga);
                })
                ->addColumn('diskon', function($penjualan){
                    return  $penjualan->diskon.' %';
                })
                ->addColumn('bayar', function($penjualan){
                    return  'Rp '.format_uang($penjualan->bayar);
                })
                ->addColumn('kasir', function($penjualan){
                    return  $penjualan->user->name;
                })
                ->addColumn('aksi', function($penjualan){
                            $button = ' <button onclick="detail(`'. route('penjualan.show', $penjualan->id_penjualan).'`)" class="edit btn btn-sm btn-warning" >Detail</button> ';
                            $button .= ' <button onclick="deleteForm(`'. route('penjualan.destroy', $penjualan->id_penjualan).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi','kode_member'])
                ->make(true);
    }

    public function store(Request $request){
        // return $request->all();
        $penjualan = Penjualan::findOrFail($request->id_penjualan);
        $penjualan->id_member = $request->id_member;
        $penjualan->total_item = $request->total_item;
        $penjualan->total_harga = $request->total;
        $penjualan->diskon = $request->diskon;
        $penjualan->bayar = $request->bayar;
        $penjualan->diterima = $request->diterima;
        $penjualan->update();

        $detail = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();
        // $detail->diskon = $request->diskon;
        // $detail->update();
        
        // return $detail;
        foreach ($detail as $item) {
            # code...
            $produk = Product::find($item->id_product);
            // return $produk;
            // dd($produk->stok);
            $produk->stok -= $item->jumlah;
            $produk->update();
            // $item->diskon -> $penjualan->diskon;
            // $item->update();
        }
        return redirect()->route('transaksi.selesai');
    }

    public function show($id){
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', $id)->get();
        // return view('menu.pembelian.index',compact('detail'));


        return datatables()
            ->of($detail)
            ->addIndexColumn()
            ->addColumn('kode_produk', function($detail){
                return $detail->produk->kode;
            })
            ->addColumn('nama_produk', function($detail){
                return $detail->produk->nama;
            })
            ->addColumn('harga_jual', function($detail){
                return 'Rp'. \format_uang($detail->harga_jual);
            })
            ->addColumn('jumlah', function($detail){
                return  \format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function($detail){
                return 'Rp'. \format_uang($detail->subtotal);
            })
            ->make(true);
        
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $detail = PenjualanDetail::where('id_penjualan', $penjualan->id_penjualan)->get();

        foreach ($detail as $item) {
            # code...
            $item->delete();
        }
        $penjualan->delete();

        return response('Data berhasil dihapus',200);
    }

    public function selesai(){

        $setting = Setting::first();

        return view('menu.penjualan.selesai',compact('setting'));
    }

    public function notakecil(){
        $setting = Setting::first();
        $penjualan = Penjualan::find(session('id_penjualan'));

        if (! $penjualan) {
            # code...
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', session('id_penjualan'))->get();

        return view('menu.penjualan.nota_kecil',compact('setting','penjualan','detail'));

    }

    public function notabesar(){
        $setting = Setting::first();
        $penjualan = Penjualan::find(session('id_penjualan'));

        if (! $penjualan) {
            # code...
            abort(404);
        }
        $detail = PenjualanDetail::with('produk')->where('id_penjualan', session('id_penjualan'))->get();


        $pdf = PDF::loadView('menu.penjualan.nota_besar',compact('setting','penjualan','detail'));
        $pdf->setPaper(0,0,609,440, 'potrait');

        return $pdf->stream('Transaksi-'.date('Y-m-d-his') .'.pdf');
    }
}
