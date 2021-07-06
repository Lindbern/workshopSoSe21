<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$muss = $_GET["muss"];
if ($muss == "true") {
$partner = new Dokument();
$partnerSQL = "Select * from Dokument where _Patient=$back";
$count = count($partner->findAll($partnerSQL));
if ($count > 1) {
$do = true;
} else {
$do = false;
}
} else {
$do = true;
}
if ($do == true) {
$Dokument=new Dokument();
Dokument::$activeViewport="detail";
$Dokument->loadDBData($schlüssel);
$Dokument->_Patient="";
$result=$Dokument->update();
if($result){
Core::redirect("Patient_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::redirect("Patient_detail&id=$back", ["message"=>"Beziehung konnte nicht gelöscht werden"]);
}
}else{
Core::redirect("Patient_detail&id=$back", ["message"=>"Das letzte Partner Objekt einer Muss Beziehung kann nicht entfernt werden."]);
}
}
