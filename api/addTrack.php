<?php 
//header from a request/response HTTP, editing it
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allor-Methods: POST");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allor-Methods, Authorization, X-Requested-With");

//initializing our api
include_once('../core/initialize.php');


//instantiate trackInfo Class
$track = new trackinfo($db);

//getting json(raw trackinfo data)
$dataJson = json_decode(file_get_contents("php://input"));

$track->InternalClient = $dataJson->InternalClient;
$track->Client = $dataJson->Client;
$track->Module = $dataJson->Module;
$track->Language = $dataJson->Language;
$track->URL = $dataJson->URL;
$track->Width = $dataJson->Width;
$track->Height = $dataJson->Height;
$track->Browser = $dataJson->Browser;
$track->BrowserVersion = $dataJson->BrowserVersion;
$track->Java = $dataJson->Java;
$track->Mobile = $dataJson->Mobile;
$track->OS = $dataJson->OS;
$track->OSVersion = $dataJson->OSVersion;
$track->Cookies = $dataJson->Cookies;
$track->track = $dataJson->track;


//creating trackinfo
if($track->addTrack()){
    echo json_encode(array("message" => "trackinfo added" ));
} else{
    echo json_encode(array("message" => "trackinfo not added" ));
}
?>