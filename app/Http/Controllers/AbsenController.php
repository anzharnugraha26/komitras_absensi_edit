<?php

namespace App\Http\Controllers;

use App\Absen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class AbsenController extends Controller
{
    

    public function index()
    {
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $data_absen = Absen::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->paginate(30);
        $cek_double = Absen::where(['date' => $date, 'user_id' => $user_id])->count();
        $kampret = false;

        $this->timeZone('Asia/Jakarta');
        $serverDate = date("Y-m-d H:i");

        $timeIn = null;
        $timeOut = null;

        if ($cek_double > 0) {
            $absen = Absen::where(['date' => $date, 'user_id' => $user_id])->get();
            $timeIn = $absen[0]['date'] . " " . $absen[0]['time_in'];

            if ($absen[0]['time_out'] != NULL) {
                $timeOut = $absen[0]['date'] . " " . $absen[0]['time_out'];
            }
        }
        return view('absen.index', compact('data_absen', 'timeIn', 'serverDate', 'timeOut'));
    }

   
    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }



    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $this->timeZone('Asia/Jakarta');
        $absen = new Absen;
        $date = date("Y-m-d");
        $user_id = Auth::user()->id;
        $cek_double = $absen->where(['date' => $date , 'user_id' => $user_id])->count();

        if($cek_double > 0){
            return redirect()->back()->with('alert', 'Anda Sudah Absen');
        }

        $absen->user_id = Auth::user()->id;
        $absen->date = date("Y-m-d");
        $absen->time_in = date("H:i:s");
        $absen->note = 'HADIR';
        $absen->save();

        return redirect()->back();

    }


    public function show(Absen $absen)
    {
        //
    }

  
    public function edit(Absen $absen)
    {
        //
    }

    

    public function update(Request $request, Absen $absen)
    {
        $this->timeZone('Asia/Jakarta');
        Absen::where(['date' => date("Y-m-d"), 'user_id' => Auth::user()->id])
        ->update(['time_out' => date("H:i:s"), 'note'=>'8 JAM SELESAI']);
        return redirect()->back();
    }


    public function destroy(Absen $absen)
    {
        //
    }
}
