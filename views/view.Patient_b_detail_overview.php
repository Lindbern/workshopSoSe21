<?php
$Patient_b_list=Core::$view->Patient_b_list;
$Patient_b=Core::$view->Patient_b;
$Impftermin=Core::$view->Impftermin;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Patient <a href="#popup_Patient_b" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Patient_b" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Impftermin (1..1) ---- (*..*) Patient <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Impftermin) kann mehrere Verbindungen zu Objekten der Partnerklasse (Patient) haben (*..*).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Es ist zu beachten, dass das Partnerobjekt genau eine Verbindung zu einem Objekt dieser Klasse haben muss (1..1).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<?php
if(!empty($Patient_b_list)){
?>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Patient_b" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Patient_b->renderHeader("id", "table"); ?>
<?php $Patient_b->renderHeader("c_ts", "table"); ?>
<?php $Patient_b->renderHeader("m_ts", "table"); ?>
<?php $Patient_b->renderHeader("Nachname", "table"); ?>
<?php $Patient_b->renderHeader("Name", "table"); ?>
<?php $Patient_b->renderHeader("Geburtsdatum", "table"); ?>
<?php $Patient_b->renderHeader("Telefonnummer", "table"); ?>
<?php $Patient_b->renderHeader("Adresse_Nachname", "table"); ?>
<?php $Patient_b->renderHeader("Adresse_Vorname", "table"); ?>
<?php $Patient_b->renderHeader("Adresse_Straße", "table"); ?>
<?php $Patient_b->renderHeader("Adresse_PLZ", "table"); ?>
<?php $Patient_b->renderHeader("Adresse_Ort", "table"); ?>
<?php $Patient_b->renderHeader("_Impftermin", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Patient_b_list as $klasse){
?>
<tr>
<?php $klasse->render("id", "list"); ?>
<?php $klasse->render("c_ts", "list"); ?>
<?php $klasse->render("m_ts", "list"); ?>
<?php $klasse->render("Nachname", "list"); ?>
<?php $klasse->render("Name", "list"); ?>
<?php $klasse->render("Geburtsdatum", "list"); ?>
<?php $klasse->render("Telefonnummer", "list"); ?>
<?php $klasse->render("Adresse_Nachname", "list"); ?>
<?php $klasse->render("Adresse_Vorname", "list"); ?>
<?php $klasse->render("Adresse_Straße", "list"); ?>
<?php $klasse->render("Adresse_PLZ", "list"); ?>
<?php $klasse->render("Adresse_Ort", "list"); ?>
<?php $klasse->render("_Impftermin", "list"); ?>
<td>
<a href="?task=Impftermin_delete_Patient_b&id=<?=$klasse->id?>&back=<?=$Impftermin->id?>&muss=false" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
</td>
</td>
</tr>
<?php }
}else{
echo"<div>";
echo"Aktuell liegt keine Verbindung zu einem Objekt der Partnerklasse vor.";
}
?>
</tbody>
</table>
</div>
