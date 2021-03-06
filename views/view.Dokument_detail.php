<?php $klasse = Core::$view->Dokument; 
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Dokument_detail",$_SESSION['uid']);
if ($icon =="plus"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
$Dokument_list_2 = Core::$view->Dokument_list_2 ; ?>
<h3 class="ui-bar ui-bar-b ui-corner-all ">
<a href="?task=Dokument" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all ui-btn-inline" align="right">back</a>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Dokument_edit&id=<?=$klasse->id?>&task_source=Dokument_detail" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext   ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Dokument_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
<?php } ?>

 Dokument

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Dokument_detail&icon=<?=$icon?>&id=<?=$klasse->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
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
$klasse->renderLabel("Bezeichnung");
$klasse->render("Bezeichnung");
$klasse->renderLabel("dateiname_upload");
$klasse->render("dateiname_upload");
$klasse->renderLabel("dateiname_path");
$klasse->render("dateiname_path");
$klasse->renderLabel("dateiname_title");
$klasse->render("dateiname_title");
$klasse->renderLabel("_Patient");
$klasse->render("_Patient");
?>
</div>
</div><br><br>
<?php if($access["relations"] == "true"){ ?>
<h3 class="ui-bar ui-bar-b ui-corner-all">Beziehungen</h3>
<div class="ui-body ui-body-a ui-corner-all">
<div data-role="tabs" id="tabs" data-theme="a">
<div data-role="navbar" data-theme="a">
<ul>
<li><a href="#1" data-ajax="false">Patient</a></li>
</ul>
</div>
<div id="1" class="ui-body-d ui-content">
<div id="view_Patient">
<?php
Core::$view->render("view_Patient");
?>
<form method="post" action="?task=Dokument_handle_Patient&id=<?=$klasse->id?>" data-ajax="false">
<button type="submit" name="auswählen" id="auswählen" class="ui-btn ui-icon-bullets ui-btn-icon-left">Verbindung wählen</button>
</form>
<a href="?task=Patient_new&Dokument=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left">Neuanlegen</a>
</div>
</div>
<th></th>
</div>
</div>
<?php } ?>
