<?php
$taskType = "list";
$classSettings =Patient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Übersicht: Patient";
Core::setView("Patient_overview", "view1", "list");
Core::setViewScheme("view1", "list", "Patient");
$Patient_list=[];
$Patient=new Patient();
Patient::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$Patient_list=$Patient->search(filter_input(INPUT_POST, "search"));
}else{
$Patient_list=Patient::findAll();
}
Core::publish($Patient_list, "Patient_list");
Core::publish($Patient, "Patient");
//Enumerationen
