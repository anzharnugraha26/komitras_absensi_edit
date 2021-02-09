<?php

namespace App\Http\Controllers\Api;

use App\absen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiAbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = absen::all();
        return response()->json($karyawan, 200);
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
     * @param  \App\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(absen $absen)
    {
        //
    }
}
