<?php
$taskType = "edit";
$classSettings =Patient::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Edit: Patient";
$id=$_GET["id"];
Core::setView("Patient_edit", "view1", "edit");
Core::setViewScheme("view1", "edit", "Patient");
$Patient=new Patient();
Patient::$activeViewport="edit";
$Patient_list = Patient::findAll();
Core::publish($Patient_list, "Patient_list");
Patient::renderScript("edit","form_Patient");
$Patient->loadDBData($id);
if(count($_POST)>0 && $_GET["task"]!="favoriten" && $_POST["registrieren-ng"] != "1" && $_POST["registrieren"] != "1"){
$a= $Patient->loadFormData();
if($a===true){
if($Patient->update()!="0"){
foreach($_FILES as $filekey => $file){
if($file["name"]!=""){
$Patient_field =Patient::$dataScheme[$filekey];
switch ($Patient_field["type"]){
case "picture":
$Patient->updateFile($filekey);
break;
case "file": // Hier müsste noch zwischen Bildern und  Dokumenten unterschieden werden
$parentField=Patient::$dataScheme[$Patient_field["sysParent"]];
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
$pfad = $Patient_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Patient->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
core::redirect("Patient_detail&id=$id");
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impftermin = Impftermin::findAll();
Core::publish($_Impftermin, "_Impftermin");
Core::publish($Patient, "Patient");
//Enumerationen
