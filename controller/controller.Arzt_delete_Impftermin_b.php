<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$muss = $_GET["muss"];
if ($muss == "true") {
$partner = new Impftermin();
$partnerSQL = "Select * from Impftermin where _Arzt=$back";
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
$Impftermin=new Impftermin();
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($schlüssel);
$Impftermin->_Arzt="";
$result=$Impftermin->update();
if($result){
Core::redirect("Arzt_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::redirect("Arzt_detail&id=$back", ["message"=>"Beziehung konnte nicht gelöscht werden"]);
}
}else{
Core::redirect("Arzt_detail&id=$back", ["message"=>"Das letzte Partner Objekt einer Muss Beziehung kann nicht entfernt werden."]);
}
}
