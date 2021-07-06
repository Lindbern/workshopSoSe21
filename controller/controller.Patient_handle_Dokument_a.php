<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Dokument_a_list = [];
Core::setView("Patient_handle_Dokument_a", "view1", "list");
Core::setViewScheme("view1", "list", "Dokument_a");
Dokument::$activeViewport="detail";
$Dokument_a_list = Dokument::findAll();
Core::publish($Dokument_a_list, "Dokument_a_list");
Core::publish($id, "id");
$Dokument = new Dokument();
Core::publish($Dokument, "Dokument");
if (isset($_id)) {
Dokument::$activeViewport="detail";
$Dokument->loadDBData($_id);
$Dokument->_Patient=$id;
$a=$Dokument->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
