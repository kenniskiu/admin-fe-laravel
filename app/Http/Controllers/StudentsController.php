<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $students = Students::all();
            return view('admin.students.index', [
                'data' => $students
            ]);
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            return view('admin.students.create');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Students::create([
                'full_name' => $request->full_name,
                'program' => $request->program,
            ]);
            return redirect('/students')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil ditambah!');
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
            $data = Students::find($id);
            return view('admin.students.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Students::where("id", $id)->update([
                'full_name' => $request->full_name,
                'program' => $request->program,
            ]);
            return redirect('/students')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Students::where('id', $id)->delete();
            return redirect('/students')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
