<?php
$taskType = "list";
$classSettings =Impftermin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Impftermin";
Core::setView("Impftermin_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Impftermin");
$Impftermin_list=[];
$Impftermin=new Impftermin();
Impftermin::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Impftermin_list=$Impftermin->search(filter_input(INPUT_POST, "search"));
}else{
$Impftermin_list=Impftermin::findAll();
}
Core::publish($Impftermin_list, "Impftermin_list");
Core::publish($Impftermin, "Impftermin");
//Enumerationen
