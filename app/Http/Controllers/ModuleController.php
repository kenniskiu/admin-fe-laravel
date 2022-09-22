<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Modules;

class ModuleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Modules::all();
            return view('admin.modules.index', [
                'data' => $data
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Modules::all();
            return view('admin.modules.create',[
                'data'=> $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Modules::create([
                'session_id' => $request->session_id,
                'video_id' => $request->video_id,
                'document_id' => $request->document_id,
            ]);
            return redirect('/modules')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/modules') ->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Modules::find($id);
            return view('admin.modules.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Modules::where("id", $id)->update([
                'session_id' => $request->session_id,
                'video_id' => $request->video_id,
                'document_id' => $request->document_id,
            ]);
            return redirect('/modules')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Modules::where('id', $id)->delete();
            return redirect('/modules')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/modules')->with('toast_error',  'Data tidak berhasil diubah!');
        }
    }
}
