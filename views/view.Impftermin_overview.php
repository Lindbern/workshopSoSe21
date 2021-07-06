<?php
$Impftermin_list=Core::$view->Impftermin_list;
$Impftermin=Core::$view->Impftermin;
$access=Core::import("access");
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impftermin",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<div data-role="ui-bar ui-bar-a">
<h1>Übersichtsseite Impftermin

<?php if(Core::$user->Gruppe >0){ ?>
<div class="tooltip_hs">
<a href="?task=favoriten&db_task=Impftermin&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true"></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<?php } ?>

</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impftermin" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Impftermin->renderHeader("id", "table"); ?>
<?php $Impftermin->renderHeader("c_ts", "table"); ?>
<?php $Impftermin->renderHeader("m_ts", "table"); ?>
<?php $Impftermin->renderHeader("Termin", "table"); ?>
<?php $Impftermin->renderHeader("Aussage", "table"); ?>
<?php $Impftermin->renderHeader("Ausführung", "table"); ?>
<?php $Impftermin->renderHeader("Impfbericht", "table"); ?>
<?php $Impftermin->renderHeader("_Arzt", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Impftermin_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Termin"); ?>
<?php $klasse->render("Aussage"); ?>
<?php $klasse->render("Ausführung"); ?>
<?php $klasse->render("Impfbericht"); ?>
<?php $klasse->render("_Arzt"); ?>
<td>
<?php if($access["detail"] == "true"){ ?>
<a href="?task=Impftermin_detail&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-eye ui-btn-icon-notext ui-corner-all ui-btn-inline">show</a>
<?php } ?>
<?php if($access["edit"] == "true"){ ?>
<a href="?task=Impftermin_edit&id=<?=$klasse->id?>&task_source=Impftermin" data-ajax="false" data-role="button"  class="ui-btn ui-icon-pencil ui-btn-icon-notext ui-corner-all ui-btn-inline">edit</a>
<?php } ?>
<?php if($access["delete"] == "true"){ ?>
<a href="?task=Impftermin_delete&id=<?=$klasse->id?>" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline" onclick="return confirm("Soll der Datensatz mit der ID: <?=$Klasse->id." wirklich gelöscht werden?"?>")">delete</a>
<?php } ?>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<?php if($access["new"] == "true"){ ?>
<a href="?task=Impftermin_new" class="ui-btn ui-btn-b ui-icon-plus ui-btn-icon-left" data-ajax="false">Neuanlegen</a><br>
<?php } ?>
<br>
