<?php
Core::checkAccessLevel(1);
Core::$title="Edit: BezeichnungT";
$id=$_GET["id"];
Core::setView("BezeichnungT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "BezeichnungT");
$BezeichnungT=new BezeichnungT();
BezeichnungT::$activeViewport="edit";
$BezeichnungT_list = BezeichnungT::findAll();
Core::publish($BezeichnungT_list, "BezeichnungT_list");
BezeichnungT::$activeViewport="edit";
$BezeichnungT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $BezeichnungT->loadFormData();
if($a===true){
if($BezeichnungT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$BezeichnungT_field =BezeichnungT::$dataScheme[$filekey];
switch ($BezeichnungT_field["type"]){
case "picture":
$BezeichnungT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=BezeichnungT::$dataScheme[$BezeichnungT_field["sysParent"]];
$filetype=$parentField["type"];
switch($filetype){
case "pictureT":
$ordner="images/";
break;
case "fileT":
$ordner="files/";
break;
default:;
$ordner="files/";;
};
$pfad = $BezeichnungT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$BezeichnungT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("BezeichnungT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($BezeichnungT, "BezeichnungT");
