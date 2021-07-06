<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impftermin_list = [];
Core::setView("Patient_handle_Impftermin", "view1", "list");
Core::setViewScheme("view1", "list", "Impftermin");
$Impftermin= new Impftermin();
$Patient = new Patient();
Impftermin::$activeViewport="detail";
$Impftermin_list = Impftermin::findAll();
Core::publish($Impftermin, "Impftermin");
Core::publish($Impftermin_list, "Impftermin_list");
Core::publish($id, "id");
if (isset($_id)) {
Patient::$activeViewport="detail";
$Patient->loadDBData($id);
$Patient->_Impftermin=$_id;
$a=$Patient->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Patient_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
