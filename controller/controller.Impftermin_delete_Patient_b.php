<?php
Core::checkAccessLevel(1);
if(isset($_GET["id"])){
$back=$_GET["back"];
$schlüssel=$_GET["id"];
$muss = $_GET["muss"];
if ($muss == "true") {
$partner = new Patient();
$partnerSQL = "Select * from Patient where _Impftermin=$back";
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
$Patient=new Patient();
Patient::$activeViewport="detail";
$Patient->loadDBData($schlüssel);
$Patient->_Impftermin="";
$result=$Patient->update();
if($result){
Core::redirect("Impftermin_detail&id=$back", ["message"=>"Beziehung wurde erfolgreich entfernt"]);
}else{
Core::redirect("Impftermin_detail&id=$back", ["message"=>"Beziehung konnte nicht gelöscht werden"]);
}
}else{
Core::redirect("Impftermin_detail&id=$back", ["message"=>"Das letzte Partner Objekt einer Muss Beziehung kann nicht entfernt werden."]);
}
}
