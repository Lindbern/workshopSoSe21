<?php
Core::checkAccessLevel(1);
$id = $_GET["id"];
$_id=$_POST["_id"];
$Impfstoff_b_list = [];
Core::setView("Impfstoffart_handle_Impfstoff_b", "view1", "list");
Core::setViewScheme("view1", "list", "Impfstoff_b");
Impfstoff::$activeViewport="detail";
$Impfstoff_b_list = Impfstoff::findAll();
Core::publish($Impfstoff_b_list, "Impfstoff_b_list");
Core::publish($id, "id");
$Impfstoff = new Impfstoff();
Core::publish($Impfstoff, "Impfstoff");
if (isset($_id)) {
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($_id);
$Impfstoff->_Impfstoffart=$id;
$a=$Impfstoff->update();
if($a==true){
core::addMessage("Die Beziehung wurde erfolgreich gespeichert");
}else{
core::addError("Die Beziehung konnte leider nicht gespeichert werden");
}
}
