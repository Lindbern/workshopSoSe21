<?php
Core::checkAccessLevel(1);
Core::$title="Edit: ImpfstoffBezT";
$id=$_GET["id"];
Core::setView("ImpfstoffBezT_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "ImpfstoffBezT");
$ImpfstoffBezT=new ImpfstoffBezT();
ImpfstoffBezT::$activeViewport="edit";
$ImpfstoffBezT_list = ImpfstoffBezT::findAll();
Core::publish($ImpfstoffBezT_list, "ImpfstoffBezT_list");
ImpfstoffBezT::$activeViewport="edit";
$ImpfstoffBezT->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $ImpfstoffBezT->loadFormData();
if($a===true){
if($ImpfstoffBezT->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$ImpfstoffBezT_field =ImpfstoffBezT::$dataScheme[$filekey];
switch ($ImpfstoffBezT_field["type"]){
case "picture":
$ImpfstoffBezT->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=ImpfstoffBezT::$dataScheme[$ImpfstoffBezT_field["sysParent"]];
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
$pfad = $ImpfstoffBezT_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$ImpfstoffBezT->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("ImpfstoffBezT&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
Core::publish($ImpfstoffBezT, "ImpfstoffBezT");
