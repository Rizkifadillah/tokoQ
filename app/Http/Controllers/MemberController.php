<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.member.index');
    }

    public function data(){
        $member = Member::orderBy('kode_member', 'asc')->get();

        return datatables()
                ->of($member)
                ->addIndexColumn()
                ->addColumn('kode', function ($member){
                    return '<span class="badge badge-warning">'.$member->kode_member.'</span>';
                })
                ->addColumn('aksi', function($member){
                            $button = ' <button onclick="editForm(`'. route('member.update', $member->id_member).'`)" class="edit btn btn-sm btn-warning" >Edit</button> ';
                            $button .= ' <button onclick="deleteForm(`'. route('member.destroy', $member->id_member).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi','kode'])
                ->make(true);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk =Member::count();
        if ($produk  == 0) {
            # code...
            $produk = Member::count();
            $request['kode_member'] = tambah_nol_depan($produk+1,6);

        }else{
            $produk =Member::latest()->first();
            $request['kode_member'] = tambah_nol_depan($produk->kode_member+1,6);
        }
        $produk = Member::create($request->all());

        // return response()->json('Data berhasil disimpan', 200);

        // $member = new Member();
        // $member->kode_member = \tambah_nol_depan($kode, 5);
        // $member->nama = $request->nama;
        // $member->telepon = $request->telepon;
        // $member->alamat = $request->alamat;
        // $member->save();

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
        $member = Member::find($id);

        return response()->json($member);
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
        $member = Member::find($id)->update($request->all());

        return response()->json('Data berhasil diedit', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return response('Data berhasil dihapus',200);
    }
}
