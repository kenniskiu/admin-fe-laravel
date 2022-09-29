<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Administration;
use Illuminate\Support\Facades\DB;

use App\Models\Students;
use App\Models\Major    ;

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
            $verificationData = Administration::where('is_approved',"waiting")->get();
            return view('admin.verify.index',[
                'data'=>$verificationData
            ]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/dashboard-admin')->with('toast_error', 'Halaman tidak dapat di akses!');
        }
    }
    public function showFiles($id){
        $administrationFiles = Administration::find($id);
        return response()->json($administrationFiles);
    }
    public function files($id)
    {
        try {
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
    public function verify(Request $request,$id){
        $documentsRequired = array("integrity_pact","nin_card","family_card","certificate","photo","transcript","recommendation_letter");
        $result = array_diff($documentsRequired,$request->valid);
        if(count($result)==0){
            Administration::where('id', $id)->update([
                'is_approved'=>"approved"
            ]);
            $user = Administration::where('id',$id)->get(['user_id','study_program']);
            $majorID = Major::where('name',$user[0]->study_program)->get(['id']);
            $majorIDInserted = "{".$majorID[0]->id."}";
            Students::create([
                'user_id'=> $user[0]->user_id,
                'major_id'=> $majorIDInserted
            ]);
            return  redirect('/verifyUser')->with('toast_success', 'Telah diverifikasi');
        }
        if(count($result)!=0){
            Administration::where('id', $id)->update([
                'is_approved'=>"rejected",
                'rejected_files'=>$result
            ]);
            return  redirect('/verifyUser')->with('toast_error', 'Ditolak');
        }
    }
}
