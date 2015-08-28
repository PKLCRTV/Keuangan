<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kas;
use App\Perkiraan;
// use Input;
// use App\Http\Requests\KasRequest;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $rules = [
        'perkiraan_id'    => ['required']
        ,'tanggal'       => ['required']
        ,'keterangan'       => ['required']
        ,'status'       => ['required']
        ,'jumlah'       => ['required']
    ];

    public function index()
    {
        // ambil semua data
        //$kas = Kas::with('perkiraan')->get();
        // $kas = Kas::orderBy('id','desc')->get();
        //$kas = Kas::where('kode_kas', '100-01')->get();
        return view('laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {
    //     $perkiraan = Perkiraan::lists('kode_perkiraan', 'id');
    //     return view('kas.create', compact('perkiraan'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  Request  $request
    //  * @return Response
    //  */
    // public function store(Request $request)
    // {
    //     $this->validate($request, $this->rules);
    //     // $input = Input::all();
    //     // Kas::create($input);
    //     $data = $request->all();
    //     Kas::create($data);
    //     return redirect('kas')->with('message', 'Data berhasil ditambahkan!');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function show($id)
    // {
    //     $kas = Kas::find($id);
    //     return view('kas.show', compact('kas'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function edit($id)
    // {
    //     $perkiraan = Perkiraan::lists('kode_perkiraan', 'id');
    //     $kas = Kas::find($id);
    //     return view('kas.edit', compact('kas', 'perkiraan'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  Request  $request
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $kas = Kas::find($id);

    //     $this->validate($request, $this->rules);
    //     // $input = array_except(Input::all(), '_method');
    //     // Kas::update($input);
    //     $data = $request->all();
    //     $kas->update($data);
    //     return redirect('kas')->with('message', 'Data berhasil dirubah!');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return Response
    //  */
    // public function destroy($id)
    // {
    //     Kas::find($id)->delete();
    //     return redirect('kas')->with('message', 'Data berhasil dihapus!');
    // }

    public function kas()
    {
        // $date = \Carbon\Carbon::now();
        // $date = \Carbon\Carbon::now()->startOfMonth(); //UNTUK MENDAPATKAN AWAL BULAN
        // $date = \Carbon\Carbon::now()->subMonth(); //UNTUK MENGAMBIL BULAN KEMARIN
        // $date = \Carbon\Carbon::now()->daysInMonth; //UNTUK MENDAPATKAN JUMLAH HARI DALAM 1 BULAN

        // UNTUK MENDAPATKAN BULAN SAJA, BISA DI GANTI YEAR, DAY, DLL
        // $date = \Carbon\Carbon::now();
        // $month = $date->month;
        // --atau--
        $month = \Carbon\Carbon::now()->month;
        
        // ambil semua data
        //$kas = Kas::with('perkiraan')->get();
        //$kas = Kas::whereBetween('tanggal', array($from,$to))->get();
        // $kas = Kas::where('tanggal', '2015-'.$bulan.'-11')->get();
        // $kas = Kas::orderBy('id','desc')->get();
        //$kas = Kas::where('kode_kas', '100-01')->get();

        // UNTUK MENGAMBIL DATA DIANTARA 2 TANGGAL
        $kas = kas::whereHas('perkiraan', function($q)
        {   
            $from = \Carbon\Carbon::now()->startOfMonth();
            $to = \Carbon\Carbon::now()->endOfMonth(); 
            $q->whereBetween('tanggal', array($from,$to));
        })->get();

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

        return view('laporankas.kas', compact('kas','month','total'));
    }

    //Mencari menurut bulan dan tahun
    public function kas_find(Request $request)
    {
        
    $this->validate($request, [
        'bulan' => 'required'
    ]);
    
    $month = Input::get('bulan');
    $from = '2015-'.$month.'-01';
    $to = '2015-'.$month.'-31';

        $kas = kas::whereHas('perkiraan', function($q)
        {
            $from = '2015-'.$month.'-01';
            $to = '2015-'.$month.'-01';    
            $q->whereBetween('tanggal', array($from,$to));

        })->get();

        return view('laporan.kas', compact('kas'));
    }

    public function rugilaba()
    {
        $month = \Carbon\Carbon::now()->month;
        
        $perkiraan = perkiraan::all();

        $kas = kas::whereHas('perkiraan', function($q)
        {
            $from = \Carbon\Carbon::now()->startOfMonth();
            $to = \Carbon\Carbon::now()->endOfMonth();    
            $q->whereBetween('tanggal', array($from,$to));

        })->get();

        foreach ($perkiraan as $row) {
            $jumlah[$row->id] = 0;
            foreach ($kas as $key => $row2) {
                if($row->id == $row2->perkiraan_id){
                    $jumlah[$row->id] = $jumlah[$row->id] + $row2->jumlah;
                }
            }
        }

        return view('laporan.rugilaba', compact('perkiraan','jumlah'));
    }

    public function neraca()
    {
        $month = \Carbon\Carbon::now()->month;
        
        $perkiraan = perkiraan::all();

        $kas = kas::whereHas('perkiraan', function($q)
        {
            $from = \Carbon\Carbon::now()->startOfMonth();
            $to = \Carbon\Carbon::now()->endOfMonth();    
            $q->whereBetween('tanggal', array($from,$to));

        })->get();

        foreach ($perkiraan as $row) {
            $jumlah[$row->id] = 0;
            foreach ($kas as $key => $row2) {
                if($row->id == $row2->perkiraan_id){
                    $jumlah[$row->id] = $jumlah[$row->id] + $row2->jumlah;
                }
            }
        }

        return view('laporan.neraca', compact('perkiraan','jumlah'));
    }

}
