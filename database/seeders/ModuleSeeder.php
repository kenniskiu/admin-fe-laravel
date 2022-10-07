<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Subject;
use App\Models\Modules;
use App\Models\Document;
use App\Models\Video;
use App\Models\Session;

use Illuminate\Support\Str;

class ModuleSeeder extends Seeder
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
        $sessions = Session::get(['id']);

        for($i=0;$i<count($sessions);$i++){
            $progress = $i/count($sessions) * 100;
            echo $progress."%";
            echo "\n";
            Modules::create([
                'id'=> Str::uuid(),
                'session_id'=> $sessions[$i]->id,
                'video_id'=>randomVideo(),
                'document_id'=>randomDocument(),
            ]);
        }
    }
}
