<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Modules;
use App\Models\Session;
use App\Models\Document;
use App\Models\Video;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

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
            $documents = $data->map->only(['document_id']);
            $docLength = Str::length($documents[0]['document_id']);
            $numberOfDocs = 0;
            $overallQuery = [];
            if($docLength==0){
                $numberOfDocs = 0;
            }
            else{
                $numberOfDocs = 1;
                for($i=0;$i<$docLength;$i++){
                    if($documents[0]['document_id'][$i]==','){
                        $numberOfDocs++;
                    }
                }
            }

            for($i=0;$i<$numberOfDocs;$i++){
                $currentQuery = DB::select('select file from documents inner join modules on documents.id = modules.document_id[ ? ]',[$i+1]);
                $overallQuery[$i] = $currentQuery[0];
            }

            $videos = $data->map->only(['video_id']);
            $videoLength = Str::length($videos[0]['video_id']);
            $numberOfVideo = 0;
            $overallVideo = [];
            if($videoLength==0){
                $numberOfVideo = 0;
            }
            else{
                $numberOfVideo = 1;
                for($i=0;$i<$videoLength;$i++){
                    if($videos[0]['video_id'][$i]==','){
                        $numberOfVideo++;
                    }
                }
            }
            for($i=0;$i<$numberOfVideo;$i++){
                $currentQuery = DB::select('select description from videos inner join modules on videos.id = modules.video_id[ ? ]',[$i+1]);
                $overallVideo[$i] = $currentQuery[0];
            }
            return view('admin.modules.index', [
                'data' => $data,
                'fileName' =>$overallQuery,
                'video'=>$overallVideo
            ]);
        } catch (\Throwable $th) {
            dd($th);
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
            $session = Session::all();
            $document = Document::all();
            $video = Video::all();

            return view('admin.modules.create',[
                'data'=> $data,
                'session'=>$session,
                'document'=>$document,
                'video'=>$video
            ]);
        } catch (\Throwable $th) {
            dd($th);
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
            $video = $request->video_id;
            $document = $request->document_id;

            $videoIntoDB = "{";
            for($i=0;$i<count($video);$i++){
               $videoIntoDB.=$video[$i];
               if($i==count($video)-1){
                $videoIntoDB.="}";
               }
               else{
                $videoIntoDB.",";
               }
            }

            $documentIntoDB = "{";
                for($i=0;$i<count($document);$i++){
                   $documentIntoDB.=$document[$i];
                   if($i==count($document)-1){
                    $documentIntoDB.="}";
                   }
                   else{
                    $documentIntoDB.=",";
                   }
                }

            Modules::create([
                'session_id' => $request->session_id,
                'video_id' => $videoIntoDB,
                'document_id' => $documentIntoDB,
            ]);
            return redirect('/modules')->with('toast_success', 'Data berhasil ditambah!');
        } catch (\Throwable $th) {
            dd($th);
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
            $session = Session::all();
            $document = Document::all();
            $video = Video::all();

            $overallDocument = [];
            $overallVideo = [];
            $documentUnlisted = [];
            $videoUnlisted = [];
            $numberOfVideo = 0;

            if(strlen($data->video_id)>0){
                $numberOfVideo = 1;
            }
            for($i=0;$i<strlen($data->video_id);$i++){
                if($data->video_id[$i]==','){
                    $numberOfVideo++;
                }
            }
            for($i=0;$i<$numberOfVideo;$i++){
                $currentQuery = DB::select('select description,videos.id from videos inner join modules on videos.id = modules.video_id[ ? ]',[$i+1]);
                $overallVideo[$i] = $currentQuery[0];
            }

            for($i=0;$i<$numberOfVideo;$i++){
                $currentQuery = DB::select('select description,videos.id from videos right join modules on videos.id = modules.video_id[ ? ]',[$i+1]);
                $videoUnlisted[$i] = $currentQuery[0];
            }

            $numberOfDocs = 0;
            if(strlen($data->document_id)>0){
                $numberOfDocs = 1;
            }
            for($i=0;$i<strlen($data->document_id);$i++){
                if($data->document_id[$i]==','){
                    $numberOfDocs++;
                }
            }
            for($i=0;$i<$numberOfDocs;$i++){
                $currentQuery = DB::select('select file,documents.id from documents inner join modules on documents.id = modules.document_id[ ? ]',[$i+1]);
                $overallDocument[$i] = $currentQuery[0];
            }

            return view('admin.modules.edit', [
                'data'=> $data,
                'session'=>$session,
                'document'=>$document,
                'video'=>$video,
                'moduleVideo'=>$overallVideo,
                'moduleDocument'=>$overallDocument
            ]);
        } catch (\Throwable $th) {
            dd($th);
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
            $video = "{".$request->document_id[0]."}";
            $document = "{".$request->video_id[0]."}";
            Modules::where("id", $id)->update([
                'session_id' => $request->session_id,
                'video_id' => $request->video,
                'document_id' => $request->document,
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
