<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $produk = Product::find(1);
        // dd($produk->kategoris->nama_kategori);
        $kategori = Kategori::all()->pluck('nama_kategori', 'id_kategori');
        return view('menu.produk.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function data(){
        // $produk = Product::leftJoin('category', 'category.id_kategori', 'product.id_kategori')
        //         ->select('product.*','nama_kategori')
        //         ->orderBy('kode', 'desc')->get();
        $produk = Product::orderBy('kode', 'asc')->get();
        // $nama_kategori = $produk->kategoris->nama_kategori;

        return datatables()
                ->of($produk)
                ->addIndexColumn()
                ->addColumn('kategori', function ($produk){
                    return $produk->kategoris->nama_kategori;
                })
                ->addColumn('select_all', function ($produk){
                    return '
                                <input type="checkbox" name="id_produk[]" value="'. $produk->id_produk .'">
                            ';
                })
                ->addColumn('kode', function ($produk){
                    return '<span class="badge badge-success">'.$produk->kode.'</span>';
                })
                ->addColumn('harga_beli', function ($produk){
                    return \format_uang($produk->harga_beli);
                })
                ->addColumn('harga_jual', function ($produk){
                    return \format_uang($produk->harga_jual);
                })
                ->addColumn('stok', function ($produk){
                    return \format_uang($produk->stok);
                })
                ->addColumn('aksi', function($produk){
                            $button = ' <button onclick="editForm(`'. route('product.update', $produk->id_produk).'`)" class="edit btn btn-sm btn-warning" >Edit</button> ';
                            $button .= ' <button onclick="deleteForm(`'. route('product.destroy', $produk->id_produk).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi','kode','select_all'])
                ->make(true);

        // if (request()->ajax()) {
        //     return datatables()->of($produk)
        //     ->addColumn('aksi', function($produk){
        //         $button = ' <button class="edit btn btn-sm btn-warning" id="'.$produk->id.'" name="edit">Edit</button> ';
        //         $button .= ' <button class="delete btn btn-sm btn-danger" id="'.$produk->id.'" name="delete">Delete</button>';

        //         return $button;
        //     })
        //     ->rawColumns(['aksi'])
        //     ->make(true);
        // }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk =Product::count();
        if ($produk  == 0) {
            # code...
            $produk = Product::count();
            $request['kode'] = "P". tambah_nol_depan($produk+1,6);

        }else{
            $produk =Product::latest()->first();
            $request['kode'] = "P". tambah_nol_depan($produk->id_produk+1,6);
        }
        $produk = Product::create($request->all());

        return response()->json('Data berhasil disimpan', 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Product::find($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Product::find($id);
        $produk->update($request->all());

        return response()->json('Data Berhasil diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk =Product::find($id);
        $produk->delete();

        return response('Data Berhasil Dihapus', 204);
    }

    public function deleteSelected(Request $request){
        // return $request->id_produk;
        // foreach($request->id_produk as $id){
        //     $product = Product::find($id);
        //     $product->delete();

        //     return response('Data Berhasil Dihapus', 204);
        // }

        foreach ($request->id_produk as $id) {
            # code...
            $product = Product::find($id);
            $product->delete();

        }
        return response('Data Berhasil Dihapus', 204);
    }

    public function cetakBarcode(Request $request){
        $dataProduk = array();

        foreach($request->id_produk as $id){
            $produk = Product::find($id);
            $dataproduk[] = $produk;
        }
        $no = 1;

        $pdf = PDF::loadView('menu.produk.cetak', compact('dataproduk','no'));
        $pdf->setPaper('a4', 'potrait');
        return $pdf->stream('produk.pdf');
    }
}
