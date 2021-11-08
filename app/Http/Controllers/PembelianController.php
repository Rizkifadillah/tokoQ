<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Models\PembelianDetail;

class PembelianController extends Controller
{
    public function index(){

        $supplier = Supplier::orderBy('nama')->get();

        return view('menu.pembelian.index',compact('supplier'));
    }

    public function create($id){
        $pembelian = new Pembelian();
        $pembelian->id_supplier = $id;
        $pembelian->total_item  = 0;
        $pembelian->total_harga = 0;
        $pembelian->diskon      = 0;
        $pembelian->bayar       = 0;
        $pembelian->save();

        session(['id_pembelian' => $pembelian->id_pembelian]);
        session(['id_supplier' => $pembelian->id_supplier]);

        return \redirect()->route('pembelian-detail.index');

    }

    
    public function data(){
        $pembelian = Pembelian::orderBy('id_pembelian', 'desc')->get();

        return datatables()
                ->of($pembelian)
                ->addIndexColumn()
                ->addColumn('tanggal',function ($pembelian){
                    return \tanggal_indonesia($pembelian->created_at);
                })
                ->addColumn('supplier', function($pembelian){
                    return $pembelian->supplier->nama ?? "";
                })
                ->addColumn('total_item', function($pembelian){
                    return  format_uang($pembelian->total_item);
                })
                ->addColumn('total_harga', function($pembelian){
                    return  'Rp '.format_uang($pembelian->total_harga);
                })
                ->addColumn('diskon', function($pembelian){
                    return  $pembelian->diskon.' %';
                })
                ->addColumn('bayar', function($pembelian){
                    return  'Rp '.format_uang($pembelian->bayar);
                })
                ->addColumn('aksi', function($pembelian){
                            $button = ' <button onclick="detail(`'. route('pembelian.show', $pembelian->id_pembelian).'`)" class="edit btn btn-sm btn-warning" >Detail</button> ';
                            $button .= ' <button onclick="deleteForm(`'. route('pembelian.destroy', $pembelian->id_pembelian).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi'])
                ->make(true);
    }

    public function store(Request $request){
        // return $request->all();
        $pembelian = Pembelian::findOrFail($request->id_pembelian);
        $pembelian->total_item = $request->total_item;
        $pembelian->total_harga = $request->total;
        $pembelian->diskon = $request->diskon;
        $pembelian->bayar = $request->bayar;
        $pembelian->update();

        $detail = PembelianDetail::where('id_pembelian', $pembelian->id_pembelian)->get();
        
        // return $detail;
        foreach ($detail as $item) {
            # code...
            $produk = Product::find($item->id_produk);
            $produk->stok += $item->jumlah;
            $produk->update();
        }
        return redirect()->route('pembelian.index');
    }

    public function show($id){
        $detail = PembelianDetail::with('produk')->where('id_pembelian', $id)->get();
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
            ->addColumn('harga_beli', function($detail){
                return 'Rp'. \format_uang($detail->harga_beli);
            })
            ->addColumn('jumlah', function($detail){
                return  \format_uang($detail->jumlah);
            })
            ->addColumn('subtotal', function($detail){
                return 'Rp'. \format_uang($detail->subtotal);
            })
            ->make(true);
        

        // // return $detail;
    }

    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $detail = PembelianDetail::where('id_pembelian', $pembelian->id_pembelian)->get();

        foreach ($detail as $item) {
            # code...
            $item->delete();
        }
        $pembelian->delete();

        return response('Data berhasil dihapus',200);
    }
    
}
