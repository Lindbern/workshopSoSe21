<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impftermin_b_list = [];
Core::setView("Arzt_handle_Impftermin_b", "view1", "list");
Core::setViewScheme("view1", "list", "Impftermin_b");
Impftermin::$activeViewport="detail";
$Impftermin_b_list = Impftermin::findAll();
Core::publish($Impftermin_b_list, "Impftermin_b_list");
Core::publish($id, "id");
$Impftermin = new Impftermin();
Core::publish($Impftermin, "Impftermin");
if (isset($_id)) {
Impftermin::$activeViewport="detail";
$Impftermin->loadDBData($_id);
$Impftermin->_Arzt=$id;
$a=$Impftermin->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
