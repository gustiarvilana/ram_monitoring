<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loginLevel=Auth::user()->level;
        $jabatan = Jabatan::where('kode_jabatan',$loginLevel)->pluck('nama_kolom')->first();
        
        if ($loginLevel == '11' || $loginLevel == '12' || $loginLevel == '13') {
            $master = Master::with('jenis')->where($jabatan, $loginLevel )->get();
        }elseif ($loginLevel) {
            $master = Master::with('jenis')->get();
            $count_A2 = Master::with('jenis')->where('jns','11')->count();
            $count_A2_murni = Master::with('jenis')->where('jns','12')->count();
            $count_P1 = Master::with('jenis')->where('jns','13')->count();
            $count_P1_murni = Master::with('jenis')->where('jns','14')->count();
            $count_P2 = Master::with('jenis')->where('jns','21')->count();
            $count_P2_murni = Master::with('jenis')->where('jns','22')->count();
            $count_tercapai_A2 = Master::with('jenis')->where('jns','11')->where('sts_byr','>','1')->count();
            $count_tercapai_A2_murni = Master::with('jenis')->where('jns','12')->where('sts_byr','>','1')->count();
            $count_tercapai_P1 = Master::with('jenis')->where('jns','13')->where('sts_byr','>','1')->count();
            $count_tercapai_P1_murni = Master::with('jenis')->where('jns','14')->where('sts_byr','>','1')->count();
            $count_tercapai_P2 = Master::with('jenis')->where('jns','21')->where('sts_byr','>','1')->count();
            $count_tercapai_P2_murni = Master::with('jenis')->where('jns','22')->where('sts_byr','>','1')->count();
        }
        
        return view('dashboard',compact(
            'master',
            'count_A2',
            'count_A2_murni',
            'count_P1',
            'count_P1_murni',
            'count_P2',
            'count_P2_murni',
            'count_tercapai_A2',
            'count_tercapai_A2_murni',
            'count_tercapai_P1',
            'count_tercapai_P1_murni',
            'count_tercapai_P2',
            'count_tercapai_P2_murni'
        ));
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