<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Patient_list = [];
Core::setView("Dokument_handle_Patient", "view1", "list");
Core::setViewScheme("view1", "list", "Patient");
$Patient= new Patient();
$Dokument = new Dokument();
Patient::$activeViewport="detail";
$Patient_list = Patient::findAll();
Core::publish($Patient, "Patient");
Core::publish($Patient_list, "Patient_list");
Core::publish($id, "id");
if (isset($_id)) {
Dokument::$activeViewport="detail";
$Dokument->loadDBData($id);
$Dokument->_Patient=$_id;
$a=$Dokument->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Dokument_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
