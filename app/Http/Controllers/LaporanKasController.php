<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kas;
use App\Perkiraan;
use Input;
// use App\Http\Requests\KasRequest;

class LaporanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    // protected $rules = [
    //     'perkiraan_id'    => ['required']
    //     ,'tanggal'       => ['required']
    //     ,'keterangan'       => ['required']
    //     ,'status'       => ['required']
    //     ,'jumlah'       => ['required']
    // ];

    public function index()
    {
        if (Input::get('bulan') != "")
        {

            $month = Input::get('bulan');
            $year = Input::get('tahun');

            // UNTUK MENGAMBIL DATA DIANTARA 2 TANGGAL
            $kas = kas::whereHas('perkiraan', function($q)
            {   
                $tahun = Input::get('tahun');
                $bulan = Input::get('bulan');
                $tanggal = \Carbon\Carbon::now()->daysInMonth;
                
                $from = $tahun."-".$bulan."-1";
                $to = $tahun."-".$bulan."-".$tanggal;
                
                $q->whereBetween('tanggal', array($from,$to));
            })->get();
        }
        else
        {
            $month = \Carbon\Carbon::now()->month;
            $year = \Carbon\Carbon::now()->year;

            // UNTUK MENGAMBIL DATA DIANTARA 2 TANGGAL
            $kas = kas::whereHas('perkiraan', function($q)
            {   
                $from = \Carbon\Carbon::now()->startOfMonth();
                $to = \Carbon\Carbon::now()->endOfMonth(); 
                $q->whereBetween('tanggal', array($from,$to));
            })->get();
        }

        //Menghitung Total
            $total['Pemasukan'] = 0;
            $total['Pengeluaran'] = 0;

            foreach ($kas as $row) {
                if($row->status=='Pemasukan')
                $total['Pemasukan'] = $total['Pemasukan'] + $row->jumlah;

                elseif($row->status=='Pengeluaran')
                $total['Pengeluaran'] = $total['Pengeluaran'] + $row->jumlah;
            }

            $total['Saldo']= $total['Pemasukan'] - $total['Pengeluaran'];

        return view('laporankas.index', compact('kas','month','year','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        #
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        #
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($bulan)
    {
        #
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        #
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        #
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        #
    }
}
