<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Document::all();
            return view('admin.document.index', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $data = Document::all();

            return view('admin.document.create');

        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $input = $request->all();
            if($request->hasFile('file')){
                $image = $request->file('file');
                $image_name = $image->getClientOriginalName();
                $input['file'] = $image_name;
            }
            Document::create([
                'description'=>$input['description'],
                'file'=>$input['file']
            ]);
        return redirect('/document')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/document')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Document::all();

            return view('admin.document.edit', [
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Document::where("id", $id)->update([
                'file' => $request->file,
                'description' => $request->description
            ]);
            return redirect('/document')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Document::where('id', $id)->delete();
            return redirect('/document')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/document')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
