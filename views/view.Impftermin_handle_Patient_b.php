<?php
$Patient_b_list=Core::$view->Patient_b_list;
$id=Core::$view->id;
$Patient=Core::$view->Patient;
?>
<div id="custom-border-radius">
<a href="?task=Impftermin_detail&id=<?=$id?>" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" data-ajax="false">No text</a>
</div>
<div data-role="ui-bar ui-bar-a">
<h1>Patient hinzufügen</h1>
</div>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impftermin" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Patient->renderHeader("id", "table"); ?>
<?php $Patient->renderHeader("c_ts", "table"); ?>
<?php $Patient->renderHeader("m_ts", "table"); ?>
<?php $Patient->renderHeader("Nachname", "table"); ?>
<?php $Patient->renderHeader("Name", "table"); ?>
<?php $Patient->renderHeader("Geburtsdatum", "table"); ?>
<?php $Patient->renderHeader("Telefonnummer", "table"); ?>
<?php $Patient->renderHeader("Adresse_Nachname", "table"); ?>
<?php $Patient->renderHeader("Adresse_Vorname", "table"); ?>
<?php $Patient->renderHeader("Adresse_Straße", "table"); ?>
<?php $Patient->renderHeader("Adresse_PLZ", "table"); ?>
<?php $Patient->renderHeader("Adresse_Ort", "table"); ?>
<?php $Patient->renderHeader("_Impftermin", "table"); ?>
</tr>
</thead>
<tbody>
<?php foreach($Patient_b_list as $klasse){
?>
<tr>
<?php $klasse->render("id"); ?>
<?php $klasse->render("c_ts"); ?>
<?php $klasse->render("m_ts"); ?>
<?php $klasse->render("Nachname"); ?>
<?php $klasse->render("Name"); ?>
<?php $klasse->render("Geburtsdatum"); ?>
<?php $klasse->render("Telefonnummer"); ?>
<?php $klasse->render("Adresse_Nachname"); ?>
<?php $klasse->render("Adresse_Vorname"); ?>
<?php $klasse->render("Adresse_Straße"); ?>
<?php $klasse->render("Adresse_PLZ"); ?>
<?php $klasse->render("Adresse_Ort"); ?>
<?php $klasse->render("_Impftermin"); ?>
<td>
<form method="post" action="?task=Impftermin_handle_Patient_b&id=<?=$id?>" data-ajax="false">
<input type="hidden" name="_id" value="<?=$klasse->id?>">
<button type="submit" name="add" id="add" value="1" class="ui-btn ui-icon-plus ui-btn-icon-notext ui-corner-all ui-btn-inline">add</button>
</form>
</td>
</tr>
<?php
        }
        ?>
</tbody>
</table>
</div>
<br>
