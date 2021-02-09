<?php

namespace App\Http\Controllers\Api;

use App\karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApikaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findbynik(Request $request)
    {
        $nik = $request->nik;
        $karyawan = karyawan::where('nik', $nik)->first();
        return response()->json(array(
            "nik" =>  $nik,
            "data" => $karyawan
        ), 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        
    }

    
}
