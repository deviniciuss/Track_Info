<?php 
//header from a request/response HTTP, editing it
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

//initializing our api
include_once('../core/initialize.php');


//instantiate trackInfo Class
$trackinfo = new trackinfo($db);

$trackinfo->track = isset($_GET['track']) ? $_GET['track'] : ' ';

$trackinfo->findByTrack();






?>