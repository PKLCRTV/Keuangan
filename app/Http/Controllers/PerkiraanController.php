<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perkiraan;
// use Input;
// use App\Http\Requests\PerkiraanRequest;

class PerkiraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    protected $rules = [
        'kode_perkiraan'    => ['required']
        ,'keterangan'       => ['required']
    ];

    public function index()
    {
        // ambil semua data
        $perkiraan = Perkiraan::all();
        // $perkiraan = Perkiraan::orderBy('id','desc')->get();
        //$perkiraan = Perkiraan::where('kode_perkiraan', '100-01')->get();
        return view('perkiraan.index', compact('perkiraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('perkiraan.create');
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
        // Perkiraan::create($input);
        $data = $request->all();
        Perkiraan::create($data);
        return redirect('perkiraan')->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $perkiraan = Perkiraan::find($id);
        return view('perkiraan.show', compact('perkiraan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $perkiraan = Perkiraan::find($id);
        return view('perkiraan.edit', compact('perkiraan'));
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
        $perkiraan = Perkiraan::find($id);

        $this->validate($request, $this->rules);
        // $input = array_except(Input::all(), '_method');
        // Perkiraan::update($input);
        $data = $request->all();
        $perkiraan->update($data);
        return redirect('perkiraan')->with('message', 'Data berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Perkiraan::find($id)->delete();
        return redirect('perkiraan')->with('message', 'Data berhasil dihapus!');
    }
}
