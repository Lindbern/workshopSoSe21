<?php
Core::checkAccessLevel(1);
Core::$title="Übersicht: BezeichnungT";
Core::setView("BezeichnungT_overview", "view1", "list");
Core::setViewScheme("view1", "list", "BezeichnungT");
$BezeichnungT_list=[];
$BezeichnungT=new BezeichnungT();
BezeichnungT::$activeViewport="list";
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$BezeichnungT_list=$BezeichnungT->search(filter_input(INPUT_POST, "search"));
}else{
$BezeichnungT_list=BezeichnungT::findAll();
}
Core::publish($BezeichnungT_list, "BezeichnungT_list");
Core::publish($BezeichnungT, "BezeichnungT");
