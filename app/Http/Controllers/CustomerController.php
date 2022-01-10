<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Jenis;
use App\Models\Kota;
use App\Models\Master;
use App\Models\Tagihan;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Command\WhereamiCommand;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {   
        $loginLevel=Auth::user()->level;
        $jabatan = Jabatan::where('kode_jabatan',$loginLevel)->pluck('nama_kolom')->first();

        $filter = $request->input('name');
        $filter_kolektor = $request->input('kolektor');
        $filter_jenis = $request->input('jenis');
        $filter_sts_bayar = $request->input('sts_bayar');

        if ($loginLevel == '11' || $loginLevel == '12' || $loginLevel == '13') {
                $customer = Master::with('jenis')->with('kodekota')->where($jabatan, $loginLevel );
            if ($filter != null) {
                $customer = Master::with('kodekota')->with('Jenis')->where($jabatan, $loginLevel )
                ->where('nama_konsumen','like', '%' . $filter . '%')
                ->orWhere('nosp', $filter )
                ->orWhere('kwitansi', $filter )
                ->orWhere('alamat', $filter );
            }
            if ($filter_kolektor != null) {
                $customer = Master::with('kodekota')->with('Jenis')->where($jabatan, $loginLevel )
                ->where('kd_kolektor', $filter_kolektor );
                if ($filter != null) {
                    $customer = Master::with('kodekota')->with('Jenis')->where($jabatan, $loginLevel )
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
                if ($filter_jenis != null) {
                    $customer = Master::with('kodekota')->with('Jenis')->where($jabatan, $loginLevel )
                    ->where('jns', $filter_jenis )
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
                if ($filter_sts_bayar != null) {
                    $customer = Master::with('kodekota')->with('Jenis')->where($jabatan, $loginLevel )
                    ->where('sts_byr', $filter_sts_bayar )
                    ->where('jns', $filter_jenis )
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
            }
        }elseif(Auth::user()){
            $customer = Master::with('jenis')->with('kodekota')->limit(20)->get();
            if ($filter != null) {
                $customer = Master::with('kodekota')->with('Jenis')
                ->where('nama_konsumen','like', '%' . $filter . '%')
                ->orWhere('nosp', $filter )
                ->orWhere('kwitansi', $filter )
                ->orWhere('alamat', $filter );
            }
            if ($filter_kolektor != null) {
                $customer = Master::with('kodekota')->with('Jenis')
                ->where('kd_kolektor', $filter_kolektor );
                if ($filter != null) {
                    $customer = Master::with('kodekota')->with('Jenis')
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
                if ($filter_jenis != null) {
                    $customer = Master::with('kodekota')->with('Jenis')
                    ->where('jns', $filter_jenis )
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
                if ($filter_sts_bayar != null) {
                    $customer = Master::with('kodekota')->with('Jenis')
                    ->where('sts_byr', $filter_sts_bayar )
                    ->where('jns', $filter_jenis )
                    ->where('kd_kolektor', $filter_kolektor )
                    ->where('nama_konsumen','like', '%' . $filter . '%')
                    ->orWhere('nosp', $filter )
                    ->orWhere('kwitansi', $filter )
                    ->orWhere('alamat', $filter );
                }
            }
        }

        return datatables()::of($customer)
            ->addIndexColumn()
            ->addColumn('sts_bayar', function($customer){
                if ($customer->sts_byr == '1') {
                    return '<span class="label label-danger"> Belum Bayar</span>';
                }else{
                    return '<span class="label label-success"> Sudah Bayar</span>';
                }
                return;
            })
            ->addColumn('sesuai_bayar', function($customer){
                if ($customer->nominal_bayar) {
                    if ($customer->besar_angsur_bln == $customer->nominal_bayar) {
                        return '<span class="label label-success"> Nominal Sesuai </span>';
                    }else{
                        return '<span class="label label-danger"> Nominal Tidak Sesuai</span>';
                    }
                    return;
                }
                
            })
            ->addColumn('selisih', function($customer){
                if ($customer->nominal_bayar) {
                    $selisih = $customer->besar_angsur_bln - $customer->nominal_bayar;
                    return $selisih;
                }
                
            })
            ->addColumn('aksi', function($customer){
                return '
                    <a href="'.route('customer.show',$customer->nosp).'" class="btn btn-info btn-xs">Show</a>
                ';
            })
            ->rawColumns([
                    'aksi',
                    'sts_bayar',
                    'sesuai_bayar',
                    'selisih'
                ])
            ->make(true);
    }

    public function index()
    {
        $jenis=Jenis::get();
        return view('v_customer.index',compact('jenis'));
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
        $customer = Master::with('tagihan')->findOrFail($id)->first();
        $kwitansi = $customer['kwitansi'];
        $kwitansi_9=substr($kwitansi,0,9);
        
        $tagihan = Tagihan::where('no_kwitansi',$kwitansi)->orderBy('cicilan_ke','asc')->get();
        dd($tagihan);

        return view('v_customer.detail',compact('customer','tagihan'));
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
   
    public function list()
    {
        $jenis=Jenis::get();
        return view('v_customer.list',compact('jenis'));
    }
}