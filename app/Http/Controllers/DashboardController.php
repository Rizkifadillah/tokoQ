<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Product;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $kategori = Kategori::count();
        $produk = Product::count();
        $supplier = Supplier::count();
        $member = Member::count();

        $tanggal_awal = date('Y-m-01');
        $tanggal_akhir = \date('Y-m-d');

        $data_tanggal = array();
        $data_pendapatan = array();

        
        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            # code...
            $data_tanggal[] = (int) \substr($tanggal_awal, 8, 2);

            $total_penjualan = Penjualan::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pembelian = Pembelian::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('bayar');
            $total_pengeluaran = Pengeluaran::where('created_at', 'LIKE', "%$tanggal_awal%")->sum('nominal');

            $pendapatan = $total_penjualan - $total_pembelian - $total_pengeluaran;
            $data_pendapatan[] += $pendapatan;

            $tanggal_awal = date('Y-m-d', strtotime("+1 day", strtotime($tanggal_awal)));

        }

        // \dd($data_pendapatan, $data_tanggal);

        if (auth()->user()->lavel == 1) {
            # code...
            return view('menu.dashboard.admin.index',compact(
                'kategori','produk','supplier','member',
                'tanggal_awal','tanggal_akhir',
                'data_tanggal', 'data_pendapatan'));
        }else{
            return view('menu.dashboard.kasir.index');
        }
    }
}
