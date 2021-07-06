<?php
$taskType = "detail";
$classSettings =Patient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Patient";
Core::setView("Patient_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Patient");
$Patient_list_2 = Patient::findAll();
Core::publish($Patient_list_2, "Patient_list_2");
$Patient_list=[];
$Patient=new Patient();
Patient::$activeViewport="detail";
$Patient->loadDBData($_GET["id"]);
Core::publish($Patient, "Patient");
//Beziehungen:
//Enumerationen
//to: Dokument  _a:
$Dokument_a=new Dokument();
$Dokument_a_list=[];
$Dokument_a_list = $Dokument_a->query(Dokument::SQL_SELECT_Patient, [$Patient->id]);
Core::publish($Dokument_a_list, "Dokument_a_list");
Core::publish($Dokument_a, "Dokument_a");
Core::$view->path["view_Dokument_a"]="views/view.Dokument_a_detail_overview.php";
//to: Impftermin  :
$Impftermin=new Impftermin();
$Impftermin_list=[];
$Impftermin_list = $Impftermin->query(Impftermin::SQL_SELECT_Patient_b, [$Patient->_Impftermin]);
Core::publish($Impftermin_list, "Impftermin_list");
Core::publish($Impftermin, "Impftermin");
Core::$view->path["view_Impftermin"]="views/view.Impftermin_detail_overview.php";
