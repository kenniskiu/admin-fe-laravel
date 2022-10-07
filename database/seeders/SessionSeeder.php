<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Modules;
use App\Models\Document;
use App\Models\Video;
use App\Models\Session;

use Illuminate\Support\Str;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function randomVideo(){
            $video = Video::all();
            $randomVideo = rand(0,count($video)-1);
            return "{".$video[$randomVideo]->id."}";
        }
        function randomDocument(){
            $document = Document::all();
            $randomDocument = rand(0,count($document)-1);
            return "{".$document[$randomDocument]->id."}";
        }
        function randomSync(){
            if(rand(0,1)==0){
                return FALSE;
            }
            if(rand(0,1)==1){
                return TRUE;
            }
        }
        $subjects = Subject::get(['id']);
        $subjectsWithSession = Session::distinct(['id'])->get(['id']);
        $remainingSubjects = [];

        for($i=0;$i<count($subjects);$i++){
            if(!Session::where("subject_id",$subjects[$i]->id)->exists()){
                $randomAmountOfSession = rand(7,8);
                for($j=0;$j<$randomAmountOfSession;$j++){
                    $session_id = Str::uuid();
                    Modules::create([
                        'id'=> Str::uuid(),
                        'session_id'=> $session_id,
                        'video_id'=>randomVideo(),
                        'document_id'=>randomDocument(),
                    ]);
                    Session::create([
                        'id'=>$session_id,
                        'subject_id'=>$remainingSubjects[$i]->id,
                        'session_no'=>$j+1,
                        'duration'=>3600,
                        'is_sync'=>randomSync(),
                        'type'=>"sessionType",
                        'description'=>"Session Description"
                    ]);
                }
            }
        }

    }
}
