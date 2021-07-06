<?php $klasse = Core::$view->Patient; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Patient_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Patient_list_2 = Core::$view->Patient_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Patient" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Patient_edit&id=<?=$klasse->id?>&task_source=Patient_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Patient_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Patient

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Patient_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div class="ui-field-contain">
<?php
$klasse->renderLabel("id");
$klasse->render("id");
$klasse->renderLabel("c_ts");
$klasse->render("c_ts");
$klasse->renderLabel("m_ts");
$klasse->render("m_ts");
$klasse->renderLabel("Nachname");
$klasse->render("Nachname");
$klasse->renderLabel("Name");
$klasse->render("Name");
$klasse->renderLabel("Geburtsdatum");
$klasse->render("Geburtsdatum");
$klasse->renderLabel("Telefonnummer");
$klasse->render("Telefonnummer");
$klasse->renderLabel("Adresse_Nachname");
$klasse->render("Adresse_Nachname");
$klasse->renderLabel("Adresse_Vorname");
$klasse->render("Adresse_Vorname");
$klasse->renderLabel("Adresse_Straße");
$klasse->render("Adresse_Straße");
$klasse->renderLabel("Adresse_PLZ");
$klasse->render("Adresse_PLZ");
$klasse->renderLabel("Adresse_Ort");
$klasse->render("Adresse_Ort");
$klasse->renderLabel("_Impftermin");
$klasse->render("_Impftermin");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Dokument</a></li>
<li><a href="#2" data-ajax="false">Impftermin</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="viewDokument_a">
<?php
Core::$view->render("view_Dokument_a");
?>
<form method="post" action="?task=Patient_handle_Dokument_a&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Dokument_new&Patient=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
<div id="2" class="ui-body-d ui-content">
<div id="view_Impftermin">
<?php
Core::$view->render("view_Impftermin");
?>
<form method="post" action="?task=Patient_handle_Impftermin&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Auswählen</button>
</form>
<a href="?task=Impftermin_new&Patient=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
</div>
</div>
<?php } ?>
