<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\PenjualanDetail;

class PenjualanDetailController extends Controller
{
    public function index(){
        $produk = Product::orderBy('nama')->get();
        $member = Member::orderBy('nama')->get();
        $diskon = Setting::first()->diskon ?? 0;

        //cek apakah ada transaksi yang sedang berjalan?
        if ($id_penjualan = session('id_penjualan')) {
            # code...
            $penjualan = Penjualan::find($id_penjualan);
            $memberTerpilih = $penjualan->member ?? new Member;

            // return $memberTerpilih;
            return \view('menu.penjualan_detail.index',\compact('produk','penjualan','memberTerpilih', 'member', 'id_penjualan', 'diskon'));
        }else{
            if(\auth()->user()->lavel == 1){
                return \redirect()->route('transaksi.baru');
            } else{
                return \redirect()->route('dashboard');
            }
        }
    }

    public function data($id){
        $detail = PenjualanDetail::with('produk')
                    ->where('id_penjualan',$id)
                    ->get();

        // return $detail;
        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $key => $item) {
            # code...
            $row = array();             //masuk ke eloquent model
            $row['DT_RowIndex'] = $key+1;
            $row['kode'] = '<span class="badge badge-warning">'.$item->produk['kode'].'</span>';
            $row['nama_produk']        = $item->produk['nama'];
            $row['harga_jual']  = 'Rp. '. \format_uang($item->harga_jual);
            $row['jumlah']      = '<input type="number" class="form-control input-sm qty" style="width:90px;" data-id="'. $item->id_penjualan_detail .'" value="'. $item->jumlah .'">';
            $row['diskon']    = $item->diskon.' %';
            $row['subtotal']    = 'Rp. '. \format_uang($item->subtotal);
            $row['aksi']        = ' <button onclick="deleteForm(`'. route('transaksi.destroy', 
                                    $item->id_penjualan_detail).'`)" class="delete btn btn-sm btn-danger"
                                    >Delete</button>';
            $data[] = $row;

            $total += $item->harga_jual * $item->jumlah;
            $total_item += $item->jumlah;
        }

        $data[] = [
           'kode' => '<div class="total hide" hidden>'. $total .'</div> <div hidden class="total_item hide">'. $total_item .'</div>',
           'nama_produk' => '',
           'harga_jual'  => '',
           'jumlah'      => '',
           'diskon'      => '',
           'subtotal'    => '',
           'aksi'        => ''
        ];

        return datatables()
                ->of($data)
                ->addIndexColumn()
                
                ->rawColumns(['aksi','kode','jumlah'])
                ->make(true);
    }

    public function store(Request $request){
        // return $request->all;
        // dd($request->id_produk);
        $produk = Product::where('id_produk', $request->id_produk)->first();
        if (! $produk) {
            # code...
            // return dd($request->id_product);
            return \response()->json('Data gagal disimpan', 400);
        }
                // dd($produk);

        $detail = new PenjualanDetail();
        $detail->id_penjualan = $request->id_penjualan;
        $detail->id_product = $produk->id_produk;
        $detail->harga_jual = $produk->harga_jual;
        $detail->jumlah = 1;
        $detail->diskon = 0;
        $detail->subtotal = $produk->harga_jual;
        $detail->save();

        return \response()->json([
            'message' => 'Data Berhasil disimpan',
            'status' =>  200,
            'data' => $detail
        ]);
    }

    public function update(Request $request, $id){
        $detail = PenjualanDetail::find($id);
        $detail->jumlah =$request->jumlah;
        $detail->subtotal = $detail->harga_jual * $request->jumlah;
        $detail->update();
    }
    
    public function destroy($id){
        $detail = PenjualanDetail::find($id);
        $detail->delete();

        return response('Data berhasil dihapus', 204);
    }

    public function loadform($diskon = 0, $total,$diterima){
        // dd($diskon,$total);
        $bayar = $total - ($diskon / 100 * $total);
        $kembali = ($diterima != 0) ? $diterima - $bayar : 0;

        $data = [
            'totalrp' => \format_uang($total),
            'bayar' => $bayar,
            'bayarrp' => \format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar).' Rupiah'),
            'kembalirp' => format_uang($kembali),
            'kembaliterbilang' => ucwords(terbilang($kembali).' Rupiah'),
        ];

        return response()->json($data);
    }
}
