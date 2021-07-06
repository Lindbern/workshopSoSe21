<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: ImpfstoffBezT";
Core::setView("ImpfstoffBezT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "ImpfstoffBezT");
$ImpfstoffBezT_list=[];
$ImpfstoffBezT=new ImpfstoffBezT();
ImpfstoffBezT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$ImpfstoffBezT_list=$ImpfstoffBezT->search(filter_input(INPUT_POST, "search"));
}else{
$ImpfstoffBezT_list=ImpfstoffBezT::findAll();
}
Core::publish($ImpfstoffBezT_list, "ImpfstoffBezT_list");
Core::publish($ImpfstoffBezT, "ImpfstoffBezT");
