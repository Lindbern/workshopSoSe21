<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Arzt_list = [];
Core::setView("Impftermin_handle_Arzt", "view1", "list");
Core::setViewScheme("view1", "list", "Arzt");
$Arzt= new Arzt();
$Impftermin = new Impftermin();
Arzt::$activeViewport="detail";
$Arzt_list = Arzt::findAll();
Core::publish($Arzt, "Arzt");
Core::publish($Arzt_list, "Arzt_list");
Core::publish($id, "id");
if (isset($_id)) {
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($id);
$Impftermin->_Arzt=$_id;
$a=$Impftermin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Impftermin_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
