<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
            $verificationData = Administration::join('users','users.id','=','Administrations.user_id')
                                ->get(['users.full_name','Administrations.*']);
            // $verificationData = Administration::all();
            return view('admin.verify.index',[
                'data'=>$verificationData
            ]);
            // dd($verificationData);
        } catch (\Throwable $th) {
            dd($th);
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
            return view('admin.verify.verify', [
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return redirect('/verifyUser')->with('toast_error',  'Halaman tidak dapat di akses!');
        }
    }
    public function downloadFile($filename){
        $file_path = "assets/img/documents/user_8f9aa78c-4da8-48a9-9b0c-511efc10553e_88564b25_fb50_4696_89ce_2088ef72355a.png";
        if(file_exists($file_path)){
            return Response::download($file_path,$filename,[
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else{
            exit('Requested file does not exist on our server!');
        }
    }
    public function verify(Request $request){
        dd($request->all());
    }
}
