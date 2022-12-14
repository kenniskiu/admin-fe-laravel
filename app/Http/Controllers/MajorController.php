<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;

class MajorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Major::all();
            return view('admin.major.index', [
                'data' => $data
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            // dd($th);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.major.create');
        } catch (\Throwable $th) {
            return redirect('/majors')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Major::create([
                'name' => $request->name,
            ]);
            return redirect('/majors')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            // return redirect('/Majors')->with('toast_error',  'Data tidak berhasil ditambah!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $data = Major::find($id);
            return view('admin.major.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/majors')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
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
        try {
            Major::where("id", $id)->update([
                'name' => $request->name,
            ]);
            return redirect('/majors')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/majors')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Major::where('id', $id)->delete();
            return redirect('/majors')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
