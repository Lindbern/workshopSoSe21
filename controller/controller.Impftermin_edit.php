<?php
$taskType = "edit";
$classSettings =Impftermin::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Impftermin";
$id=$_GET["id"];
Core::setView("Impftermin_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Impftermin");
$Impftermin=new Impftermin();
Impftermin::$activeViewport="edit";
$Impftermin_list = Impftermin::findAll();
Core::publish($Impftermin_list, "Impftermin_list");
Impftermin::renderScript("edit","form_Impftermin");
$Impftermin->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Impftermin->loadFormData();
if($a===true){
if($Impftermin->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Impftermin_field =Impftermin::$dataScheme[$filekey];
switch ($Impftermin_field["type"]){
case "picture":
$Impftermin->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Impftermin::$dataScheme[$Impftermin_field["sysParent"]];
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
$pfad = $Impftermin_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Impftermin->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Impftermin_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Arzt = Arzt::findAll();
Core::publish($_Arzt, "_Arzt");
Core::publish($Impftermin, "Impftermin");
//Enumerationen
