<?php 
//header from a request/response HTTP, editing it
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//initializing our api
include_once('../core/initialize.php');


//instantiate trackInfo Class
$track = new trackinfo($db);

//trackInfo query
$result = $track->findAllTrack();

//get the row count
$num = $result->rowCount();

if($num > 0){
    $trackInfo_array = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $info = array(
            "InternalClient" => $InternalClient,
            "Client" => $Client,
            "Module" => $Module,
            "Language" => $Language,
            "URL" => $URL,
            "Date" => $Date,
            "Width" => $Width,
            "Height" => $Height,
            "Browser" => $Browser,
            "BrowserVersion" => $BrowserVersion,
            "Java" => $Java,
            "Mobile" => $Mobile,
            "OS" => $OS,
            "OSVersion" => $OSVersion,
            "Cookies" => $Cookies,
        );
        array_push($trackInfo_array, $info);
    }
    echo json_encode($trackInfo_array);
} else{
    echo json_encode(array("message" => "Nothing found."));
}

?>