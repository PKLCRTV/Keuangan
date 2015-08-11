<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kas;
use App\Perkiraan;
// use Input;
// use App\Http\Requests\KasRequest;

class KasController extends Controller
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
        $kas = Kas::with('perkiraan')->get();
        // $kas = Kas::orderBy('id','desc')->get();
        //$kas = Kas::where('kode_kas', '100-01')->get();
        return view('kas.index', compact('kas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $perkiraan = Perkiraan::lists('kode_perkiraan', 'id');
        return view('kas.create', compact('perkiraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        // $input = Input::all();
        // Kas::create($input);
        $data = $request->all();
        Kas::create($data);
        return redirect('kas')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $kas = Kas::find($id);
        return view('kas.show', compact('kas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $perkiraan = Perkiraan::lists('kode_perkiraan', 'id');
        $kas = Kas::find($id);
        return view('kas.edit', compact('kas', 'perkiraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $kas = Kas::find($id);

        $this->validate($request, $this->rules);
        // $input = array_except(Input::all(), '_method');
        // Kas::update($input);
        $data = $request->all();
        $kas->update($data);
        return redirect('kas')->with('message', 'Data berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Kas::find($id)->delete();
        return redirect('kas')->with('message', 'Data berhasil dihapus!');
    }
}
