<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Administration;
use Illuminate\Support\Facades\DB;

class VerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // $verificationData = DB::table('administrations')
            //                         ->join('users','users.user_id','=','administrations.id');
            $verificationData = Administration::join('users','users.id','=','administrations.user_id')
                                ->get(['users.full_name','administrations.*']);
            // $verificationData = Administration::all();
            return view('admin.verify.index',[
                'data'=>$verificationData
            ]);
            // dd($verificationData);
        } catch (\Throwable $th) {
            return redirect('/dashboard-admin')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }
    public function showFiles($id){
        $administrationFiles = Administration::find($id);
        return response()->json($administrationFiles);
    }
    public function files($id)
    {
        try {
            // $data = Administration::join('users','users.id','=','administrations.user_id')
            //                     ->get(['users.full_name','administrations.*']);
            $data = Administration::find($id);
            return view('admin.verify.edit', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/verifyUser')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }
}
