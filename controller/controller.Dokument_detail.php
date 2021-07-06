<?php
$taskType = "detail";
$classSettings =Dokument::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Dokument";
Core::setView("Dokument_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Dokument");
$Dokument_list_2 = Dokument::findAll();
Core::publish($Dokument_list_2, "Dokument_list_2");
$Dokument_list=[];
$Dokument=new Dokument();
Dokument::$activeViewport="detail";
$Dokument->loadDBData($_GET["id"]);
Core::publish($Dokument, "Dokument");
//Beziehungen:
//Enumerationen
$Bezeichnung = BezeichnungT::findAll();
Core::publish($Bezeichnung, 'Bezeichnung');
//to: Patient  :
$Patient=new Patient();
$Patient_list=[];
$Patient_list = $Patient->query(Patient::SQL_SELECT_Dokument_a, [$Dokument->_Patient]);
Core::publish($Patient_list, "Patient_list");
Core::publish($Patient, "Patient");
Core::$view->path["view_Patient"]="views/view.Patient_detail_overview.php";
