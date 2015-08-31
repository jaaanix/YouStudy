<?php

$days = isset($_POST["day"]) ? $_POST["day"] : 0;
$date = new DateTime("today + {$days}day");

$s = curl_init();
$postdata = http_build_query(array(
    "func" => "make_spl",
    "locId" => "gummersbach",
    "lang" => "de",
    "date" => $date->format('Y-m-d')
));
curl_setopt($s,CURLOPT_URL,"http://www.max-manager.de/daten-extern/sw-koeln/html/speiseplan-render.php");
curl_setopt($s,CURLOPT_POST,true);
curl_setopt($s,CURLOPT_POSTFIELDS,$postdata);
curl_setopt($s,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($s);

$rtn = new stdClass();


$htmlregex = [
    "/<span[^>]*>/",
    "/<\/span>/",
    "/<div[^>]*>/",
    "/<\/div>/",
    "/<br \/>/",
    "/<br\/>/",
    "/<sup[^>]*>[^>]+>/"];
$htmlreplace = preg_replace($htmlregex," ",$response);

#$subreplace = "/<sup[^>]*>[^>]+>/";
#$subendreplace ="/<\/sup>/";
#$htmlreplace = preg_replace($subreplace,"[sup]",$htmlreplace);
#$htmlreplace = preg_replace($subendreplace,"[supend]",$htmlreplace);
$htmlreplace = str_replace(["\n","\r","   ","  "], "", $htmlreplace);

$titlesregex = "/<tr><td class='pk[^>]+>([^<]+)/";
$titles = preg_match_all($titlesregex,$htmlreplace,$matches);
if ($titles)
    $rtn->titles = $matches[1];

$imageregex = "/<img src='([^']+)/";
$images = preg_match_all($imageregex,$htmlreplace,$matches);
if ($images)
    $rtn->images = $matches[1];

$descregex = "/<td class='cell1 '>([^<]*)/";
$desc = preg_match_all($descregex, $htmlreplace, $matches);
if ($desc)
    $rtn->desc = $matches[1];

$preisregex = "/<td class='cell3 '>([^<]*)/";
$preis = preg_match_all($preisregex, $htmlreplace, $matches);
if ($preis)
    $rtn->preise = $matches[1];

//die($htmlreplace);
die(json_encode($rtn));