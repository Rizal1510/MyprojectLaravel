<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari'))
        {
            $data_siswa = \App\Models\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $data_siswa = \App\Models\Siswa::all();
        }
    	return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required|',
            'agama' => 'required',
        ]);
        //Insert ke table user
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();
    	
        //Insert ke table siswa
        $siswa = \App\Models\Siswa::create([
            'user_id' => $user->id,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'avatar' => $request->avatar,
        ]);
        // $request->request->all(['user_id' => $user->id]);
        // $siswa = \App\Models\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
    	$siswa = \App\Models\Siswa::find($id);
   		return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
    	$siswa = \App\Models\Siswa::find($id);
    	$siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
    	return redirect('/siswa')->with('sukses', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        return view('siswa.profile', ['siswa' => $siswa]);
    }
}
