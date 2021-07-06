<?php
$taskType = "detail";
$classSettings =Impfstoffart::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::publish($access, "access");
Core::$title="Detail: Impfstoffart";
Core::setView("Impfstoffart_detail", "view1", "detail");
Core::setViewScheme("view1", "detail", "Impfstoffart");
$Impfstoffart_list_2 = Impfstoffart::findAll();
Core::publish($Impfstoffart_list_2, "Impfstoffart_list_2");
$Impfstoffart_list=[];
$Impfstoffart=new Impfstoffart();
Impfstoffart::$activeViewport="detail";
$Impfstoffart->loadDBData($_GET["id"]);
Core::publish($Impfstoffart, "Impfstoffart");
//Beziehungen:
//Enumerationen
$ImpfstoffBez = ImpfstoffBezT::findAll();
Core::publish($ImpfstoffBez, 'ImpfstoffBez');
//to: Impfstoff  _b:
$Impfstoff_b=new Impfstoff();
$Impfstoff_b_list=[];
$Impfstoff_b_list = $Impfstoff_b->query(Impfstoff::SQL_SELECT_Impfstoffart, [$Impfstoffart->id]);
Core::publish($Impfstoff_b_list, "Impfstoff_b_list");
Core::publish($Impfstoff_b, "Impfstoff_b");
Core::$view->path["view_Impfstoff_b"]="views/view.Impfstoff_b_detail_overview.php";
