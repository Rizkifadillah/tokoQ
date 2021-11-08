<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('menu.supplier.index');
    }

    public function create()
    {
        //
    }

    public function data(){
        $supplier = Supplier::orderBy('id_supplier', 'asc')->get();

        return datatables()
                ->of($supplier)
                ->addIndexColumn()
                
                ->addColumn('aksi', function($supplier){
                            $button = ' <button type="button" onclick="editForm(`'. route('supplier.update', $supplier->id_supplier).'`)" class="edit btn btn-sm btn-warning" >Edit</button> ';
                            $button .= ' <button type="button" onclick="deleteForm(`'. route('supplier.destroy', $supplier->id_supplier).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->save();

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
        $supplier = Supplier::find($id);

        return response()->json($supplier);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->update();

        return response()->json('Data berhasil diedit', 200);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return response('Data berhasil dihapus',200);
    }
}
