<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('menu.user.index');
    }

    public function create()
    {
        //
    }

    public function data(){
        $user = User::isNotAdmin()->orderBy('id', 'asc')->get();

        return datatables()
                ->of($user)
                ->addIndexColumn()
                ->addColumn('aksi', function($user){
                            $button = ' <button type="button" onclick="editForm(`'. route('user.update', $user->id).'`)" class="edit btn btn-sm btn-warning" >Edit</button> ';
                            $button .= ' <button type="button" onclick="deleteForm(`'. route('user.destroy', $user->id).'`)" class="delete btn btn-sm btn-danger" >Delete</button>';
            
                            return $button;
                        })
                        ->rawColumns(['aksi'])
                ->make(true);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->lavel = 2;
        $user->foto = '/images/logo.png';
        $user->save();

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
        $user = User::find($id);

        return response()->json($user);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->has('password') && $request->password != "") {
            # code...
            $user->password = bcrypt($request->password);
        }
        $user->update();

        return response()->json('Data berhasil diedit', 200);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response('Data berhasil dihapus',200);
    }

    public function profil(){
        $profil = auth()->user();
        return view('menu.user.profil',compact('profil'));
    }

    public function updateProfil(Request $request){
        $user = auth()->user();

        $user->name = $request->name;

        if ($request->has('password') && $request->password != "") {
            # code...
            if (Hash::check($request->old_password, $user->password)) {
                # code...
                if($request->password == $request->password_confirmation){
                    $user->password = \bcrypt($request->password);
                }else{
                    return response()->json('Konfirmasi Password tidak sesuai', 422);
                }
            }else{
                return response()->json('Password lama tidak sesuai', 422);
            }
        }

        // $user->password

        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'profil-' . \date('Y-m-dHis'). '.'.$file->getClientOriginalExtension();
            $file->move(\public_path('/img'), $nama);

            $user->foto = "/img/$nama";
        }

        $user->update();

        return response()->json($user,200);
    }
}
