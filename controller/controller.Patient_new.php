<?php

$taskType = "new";
$classSettings =Arzt::$settings;
$access = Core::checkAccessGui($classSettings, $taskType);
Core::$title="Neu: Patient";
Core::setView("Patient_new", "view1", "new");
Core::setViewScheme("view1", "new", "Patient");

if(isset($_GET["chain"])){
    $referrer = $_GET["chain"];
Core::publish($referrer, "referrer");
}
if(isset($_GET["autocomplete"])){
    $autocomplete = 1;
Core::publish($autocomplete, "autocomplete");
}

$Patient=new Patient();
Patient::$activeViewport="new";
Patient::renderScript("new","form_Patient");

if(count($_POST)>0){
$a= $Patient->loadFormData();
if($a===true){
if($Patient->create()!="0"){
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
default:
$ordner="files/";
}
$pfad = $Patient_field["sysParent"] . "_path"; // path wird nirgends ausgelesen sondern jetzt einfach mal so definiert
$Patient->updateFile($filekey, ["pathDB" => $pfad, "path"=>$ordner]);
break;
default:
}
}
}
$Patient=new Patient();
if(isset($_POST["back"])){
Core::loadJavascript("includes/js/back.js");
}else{
if ($_POST["registrieren-ng"] != "1"){ 
Core::$view->path["view1"]="views/view.Patient_new.php";
}else{
   $task_source = $_GET["task_source"];
   Core::redirect ($task_source);
}}
}else{
Core::addError("Der Datenbankeintrag war nicht erfolgreich"); 
}
}else{
Core::addError("Die Eingegebenen Daten waren nicht korrekt");
}
}
$_Impftermin = Impftermin::findAll(Impftermin::SQL_SELECT_IGNORE_DERIVED);
Core::publish($_Impftermin, "_Impftermin");
Core::publish($Patient, "Patient");
//Enumerationen
