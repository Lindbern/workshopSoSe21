<?php
$taskType = "detail";
$classSettings =Impfstoff::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impfstoff";
Core::setView("Impfstoff_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impfstoff");
$Impfstoff_list_2 = Impfstoff::findAll();
Core::publish($Impfstoff_list_2, "Impfstoff_list_2");
$Impfstoff_list=[];
$Impfstoff=new Impfstoff();
Impfstoff::$activeViewport="detail";
$Impfstoff->loadDBData($_GET["id"]);
Core::publish($Impfstoff, "Impfstoff");
//Beziehungen:
//Enumerationen
//to: Impftermin  :
$Impftermin=new Impftermin();
$Impftermin_list=[];
$Impftermin_list = $Impftermin->query(Impftermin::SQL_SELECT_Impfstoff_a, [$Impfstoff->_Impftermin]);
Core::publish($Impftermin_list, "Impftermin_list");
Core::publish($Impftermin, "Impftermin");
Core::$view->path["view_Impftermin"]="views/view.Impftermin_detail_overview.php";
//to: Impfstoffart  :
$Impfstoffart=new Impfstoffart();
$Impfstoffart_list=[];
$Impfstoffart_list = $Impfstoffart->query(Impfstoffart::SQL_SELECT_Impfstoff_b, [$Impfstoff->_Impfstoffart]);
Core::publish($Impfstoffart_list, "Impfstoffart_list");
Core::publish($Impfstoffart, "Impfstoffart");
Core::$view->path["view_Impfstoffart"]="views/view.Impfstoffart_detail_overview.php";
