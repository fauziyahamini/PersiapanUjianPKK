<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard');
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
        $a = new konsul($request->bb, $request->tb,$request->tahun);
        // $a->bmi();
        // $a->obes();
        $data = [
            'bmi' => $a->hitungBMI(),
            'status' => $a->status(),
            'konsultasi'=>$a->konsultasi()
        ];

        return view('dashboard', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class BMI{
    public function __construct($bb,$tb,$tahun)
    {
        $this->bb=$bb;
        $this->tb=$tb/100;
        $this->tahun=$tahun;
    }

    public function hitungBMI(){
        return $this->bb/($this->tb * $this->tb);
    }

    public function status(){
        $hasil_bmi=$this->hitungBMI();
        if($hasil_bmi < 18.5){
            return "Kurus";
        }elseif($hasil_bmi <= 22.9){
            return "Normal";
        }elseif($hasil_bmi <= 29.9){
            return "Gemuk";
        }elseif($hasil_bmi > 30){
            return "Obesitas";
        }
    }
    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }
}

class konsul extends BMI{
    public function cekStatus()
    {
        $hasilUmur=$this->hitungUmur();
        if($hasilUmur>=17){
            return "Dewasa";
        }else{
            return "Belum Dewasa";
        }
    }
    public function konsultasi(){
        if($this->status()=='Obesitas' && $this->cekStatus()=='Dewasa'){
            return "Dapat Konsul";
        }else{
            return "Tidak Dapat Konsul";
        }
    }
}
