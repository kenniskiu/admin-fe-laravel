<?php

namespace App\Http\Controllers;

use App\Models\Lecturers;
use App\Models\User;
use Illuminate\Http\Request;

class LecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $lecturers = Lecturers::all();
            return view('admin.lecturers.index', [
                'data' => $lecturers
            ]);
        } catch (\Throwable $th) {
            return redirect('/dashboard-admin')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            $user = User::all();
            return view('admin.lecturers.create', [
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return redirect('/lecturers')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Lecturers::create([
                'user_id' => $request->user_id,
                'is_lecturer' => $request->is_lecturer,
                'is_mentor' => $request->is_mentor,
            ]);
            return redirect('/lecturers')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/lecturers')->with('toast_error',  'Data tidak berhasil ditambah!');
        }
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
        try {
            $data = Lecturers::find($id);
            return view('admin.lecturers.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/lecturers')->with('toast_error',  'Halaman tidak dapat di akses!');
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
            Lecturers::where("id", $id)->update([
                'is_lecturer' => $request->is_lecturer,
                'is_mentor' => $request->is_mentor,
            ]);
            return redirect('/lecturers')->with('toast_success', 'Data berhasil diubah!');
        } catch (\Throwable $th) {
            return redirect('/lecturers')->with('toast_error',  'Data tidak berhasil diubah!');
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
            Lecturers::where('id', $id)->delete();
            return redirect('/lecturers')->with('toast_success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/lecturers')->with('toast_error',  'Data tidak berhasil dihapus!');
        }
    }
}
