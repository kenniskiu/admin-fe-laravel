<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Students;
use App\Models\User;
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
            $data = Students::all();
            return view('admin.students.index', [
                'data' => $data
            ]);
            // dd($data);
        } catch (\Throwable $th) {
            dd($th);
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
            $major = Major::all();
            $user = User::all();

            return view('admin.students.create', [
                'major' => $major,
                'user' => $user
            ]);
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
            $major = '{' . $request->major_id . '}';

            Students::create([
                'user_id' => $request->user_id,
                'major_id' => $major,
            ]);
            return redirect('/students')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            return redirect('/students')->with('toast_error',  'Data tidak berhasil ditambah!');
            // dd($th);
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
            $major = Major::all();
            $user = User::all();

            $data = Students::find($id);
            return view('admin.students.edit', [
                'data' => $data,
                'major' => $major,
                'user' => $user
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


            // $major = '{' . $request->major_id . '}';

            Students::where("id", $id)->update([
                'user_id' => $request->user_id,
                'major_id' => $request->major_id,
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
