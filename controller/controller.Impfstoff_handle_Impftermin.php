<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impftermin_list = [];
Core::setView("Impfstoff_handle_Impftermin", "view1", "list");
Core::setViewScheme("view1", "list", "Impftermin");
$Impftermin= new Impftermin();
$Impfstoff = new Impfstoff();
Impftermin::$activeViewport="detail";
$Impftermin_list = Impftermin::findAll();
Core::publish($Impftermin, "Impftermin");
Core::publish($Impftermin_list, "Impftermin_list");
Core::publish($id, "id");
if (isset($_id)) {
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($id);
$Impfstoff->_Impftermin=$_id;
$a=$Impfstoff->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
core::redirect("Impfstoff_detail&id=".$id);
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
