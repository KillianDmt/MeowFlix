<?php
 
include("dbconnect.php");
$db= new DbConnect();
$conn = $db ->connect();

  
 // YouTube API Key
 include("../../YTBAPIKEY.php");
 $playlist_id = "PLbUtsILwrSnVosTY2P5VB66Vz2VT8tjyg";
 $channel_id = "UC7wafFu5c8AO0YF5U7R7xFA";

 $url="https://www.googleapis.com/youtube/v3/playlistItems?key=$api_key&playlistId=$playlist_id&part=snippet,contentDetails";
 $response = file_get_contents($url);
 $data = json_decode($response);
 
 foreach ($data->items as $item) {
    $sql="INSERT INTO `video`(id,descr,title,thumbnails) VALUES (:vid,:descr,:title,:thumb)";
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam(":vid", $item -> id) ;
    $stmt -> bindParam(":title", $item -> snippet -> title) ;
    $stmt -> bindParam(":descr", $item -> snippet -> description) ;
    $stmt -> bindParam(":thumb", $item -> snippet ->thumbnails->default -> url) ;
    $stmt -> bindParam(":tag", $item -> snippet -> tag);
    $stmt -> execute();


}

    
