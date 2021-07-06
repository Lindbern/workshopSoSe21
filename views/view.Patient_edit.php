<?php
$Patient = Core::$view->Patient;
$Patient_list = Core::$view->Patient_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Patient";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Patient_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Patient->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Patient_edit&icon=<?=$icon?>&id=<?=$Patient->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Patient" method="post" action="?task=Patient_edit&id=<?=$Patient->id?>" data-ajax="false" enctype="<?=$Patient::$enctype?>">
<div class="ui-field-contain">
<?php
$Patient->renderLabel("id");
$Patient->render("id");
$Patient->renderLabel("c_ts");
$Patient->render("c_ts");
$Patient->renderLabel("m_ts");
$Patient->render("m_ts");
$Patient->renderLabel("Nachname");
$Patient->render("Nachname");
$Patient->renderLabel("Name");
$Patient->render("Name");
$Patient->renderLabel("Geburtsdatum");
$Patient->render("Geburtsdatum");
$Patient->renderLabel("Telefonnummer");
$Patient->render("Telefonnummer");
$Patient->renderLabel("Adresse_Nachname");
$Patient->render("Adresse_Nachname");
$Patient->renderLabel("Adresse_Vorname");
$Patient->render("Adresse_Vorname");
$Patient->renderLabel("Adresse_Straße");
$Patient->render("Adresse_Straße");
$Patient->renderLabel("Adresse_PLZ");
$Patient->render("Adresse_PLZ");
$Patient->renderLabel("Adresse_Ort");
$Patient->render("Adresse_Ort");
$Patient->renderLabel("_Impftermin");
$Patient->render("_Impftermin");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
