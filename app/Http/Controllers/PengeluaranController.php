<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        return view('menu.pengeluaran.index');
    }

    public function create()
    {
        //
    }

    public function data(){
        $pengeluaran = Pengeluaran::orderBy('id_pengeluaran', 'asc')->get();

        return datatables()
                ->of($pengeluaran)
                ->addIndexColumn()
                ->addColumn('created_at', function ($pengeluaran){
                    return \tanggal_indonesia($pengeluaran->created_at,false);
                })
                ->addColumn('nominal', function ($pengeluaran){
                    return \format_uang($pengeluaran->nominal);
                })
                ->addColumn('aksi', function($pengeluaran){
                            $button = ' <button type="button" onclick="editForm(`'. route('pengeluaran.update', $pengeluaran->id_pengeluaran).'`)" class="edit btn btn-sm btn-warning" >Edit</button> ';
                            $button .= ' <button type="button" onclick="deleteForm(`'. route('pengeluaran.destroy', $pengeluaran->id_pengeluaran).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $pengeluaran = new pengeluaran();
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->save();

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
        $pengeluaran = Pengeluaran::find($id);

        return response()->json($pengeluaran);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->update();

        return response()->json('Data berhasil diedit', 200);
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();

        return response('Data berhasil dihapus',200);
    }
}
