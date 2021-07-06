<?php
$taskType = "detail";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Arzt";
Core::setView("Arzt_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Arzt");
$Arzt_list_2 = Arzt::findAll();
Core::publish($Arzt_list_2, "Arzt_list_2");
$Arzt_list=[];
$Arzt=new Arzt();
Arzt::$activeViewport="detail";
$Arzt->loadDBData($_GET["id"]);
Core::publish($Arzt, "Arzt");
//Beziehungen:
//Enumerationen
$Fachrichtung = FachrichtungT::findAll();
Core::publish($Fachrichtung, 'Fachrichtung');
//to: Impftermin  _b:
$Impftermin_b=new Impftermin();
$Impftermin_b_list=[];
$Impftermin_b_list = $Impftermin_b->query(Impftermin::SQL_SELECT_Arzt, [$Arzt->id]);
Core::publish($Impftermin_b_list, "Impftermin_b_list");
Core::publish($Impftermin_b, "Impftermin_b");
Core::$view->path["view_Impftermin_b"]="views/view.Impftermin_b_detail_overview.php";
