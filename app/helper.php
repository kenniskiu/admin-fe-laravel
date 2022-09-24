<?php
use Illuminate\Support\Facades\DB;

function getDocTaken($data){
    $documents = $data->map->only(['document_id']);
    $docLength = Str::length($documents[0]['document_id']);
    $numberOfDocs = 0;
    $docTaken = [];
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
        $docTaken[$i] = $currentQuery[0];
    }

    return $docTaken;
}

function getVideoTaken($data){
    $videos = $data->map->only(['video_id']);
    $videoLength = Str::length($videos[0]['video_id']);
    $numberOfVideo = 0;
    $videoTaken = [];
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
        $videoTaken[$i] = $currentQuery;
    }
    return $videoTaken;
}
