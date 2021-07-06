<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Patient_b_list = [];
Core::setView("Impftermin_handle_Patient_b", "view1", "list");
Core::setViewScheme("view1", "list", "Patient_b");
Patient::$activeViewport="detail";
$Patient_b_list = Patient::findAll();
Core::publish($Patient_b_list, "Patient_b_list");
Core::publish($id, "id");
$Patient = new Patient();
Core::publish($Patient, "Patient");
if (isset($_id)) {
Patient::$activeViewport="detail";
$Patient->loadDBData($_id);
$Patient->_Impftermin=$id;
$a=$Patient->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
