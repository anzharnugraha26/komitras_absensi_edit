<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Divisi;
use App\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function index()
    {
        // menampilkan seluruh data di table karyawan dan tabel divisi, memanggil view index data karyawan 
        $karyawan = Karyawan::all();
        $divisi = Divisi::all();
        return view('karyawan.index', compact('karyawan', 'divisi'));
    }

    public function adddivisi(Request $request)
    {
        $divisi = new Divisi;
        $divisi->kode = $request->kode;
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->jumlah = '0';
        $divisi->save();
        return redirect('/datakaryawan');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users' ,
            'jenis_kelamin' => 'required'
        ]);

        $divisi = Divisi::where('id', $request->divisi)->first();

        $user = new User;
        $user->role = $request->role;
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt('12345');
        $user->save();

        $datein = $request->tanggalmasuk;
        $timeStamp = strtotime($datein);
        $tahunMasuk = date('Y', $timeStamp);
        $last2Digit = substr($tahunMasuk, 2);

        $dateBirth = $request->tanggallahir;
        $timeStamp2 = strtotime($dateBirth);
        $tahunLahir = date('Y', $timeStamp2);
        $last2Digit2 = substr($tahunLahir, 2);

        $nik = $last2Digit . $last2Digit2 . $divisi->kode;

        $request->request->add(['user_id' => $user->id]);
        $request->request->add(['nik' => $nik]);
        $request->request->add(['nama_divisi' => $divisi->nama_divisi]);
        $karyawan = Karyawan::create($request->all());

        $currentTotal = $divisi->jumlah + 1;
        Divisi::where('id', $request->divisi)->update(array('jumlah' => $currentTotal));

        Karyawan::where('id', $karyawan->id)->update(array('nik' => $nik . $currentTotal));
        User::where('id', $user->id)->update(array('password'=> bcrypt( $nik.$currentTotal)));
        return redirect('/datakaryawan');

        
    }


    public function show(Karyawan $karyawan)
    {
        //
    }


    public function edit(Karyawan $karyawan)
    {
        //
    }


    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }


    public function destroy(Karyawan $karyawan)
    {
        $divisi = Divisi::where('id')->first();
        Karyawan::destroy($karyawan->id);
        return redirect('/datakaryawan')->with('sukses', 'Data Berhasil dihapus');
    }
}
