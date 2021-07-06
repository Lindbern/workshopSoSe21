<?php
$Impftermin_b_list=Core::$view->Impftermin_b_list;
$Impftermin_b=Core::$view->Impftermin_b;
$Arzt=Core::$view->Arzt;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Impftermin <a href="#popup_Impftermin_b" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Impftermin_b" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Arzt (1..1) ---- (*..*) Impftermin <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Arzt) kann mehrere Verbindungen zu Objekten der Partnerklasse (Impftermin) haben (*..*).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Es ist zu beachten, dass das Partnerobjekt genau eine Verbindung zu einem Objekt dieser Klasse haben muss (1..1).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<?php
if(!empty($Impftermin_b_list)){
?>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Impftermin_b" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Impftermin_b->renderHeader("id", "table"); ?>
<?php $Impftermin_b->renderHeader("c_ts", "table"); ?>
<?php $Impftermin_b->renderHeader("m_ts", "table"); ?>
<?php $Impftermin_b->renderHeader("Termin", "table"); ?>
<?php $Impftermin_b->renderHeader("Aussage", "table"); ?>
<?php $Impftermin_b->renderHeader("Ausführung", "table"); ?>
<?php $Impftermin_b->renderHeader("Impfbericht", "table"); ?>
<?php $Impftermin_b->renderHeader("_Arzt", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Impftermin_b_list as $klasse){
?>
<tr>
<?php $klasse->render("id", "list"); ?>
<?php $klasse->render("c_ts", "list"); ?>
<?php $klasse->render("m_ts", "list"); ?>
<?php $klasse->render("Termin", "list"); ?>
<?php $klasse->render("Aussage", "list"); ?>
<?php $klasse->render("Ausführung", "list"); ?>
<?php $klasse->render("Impfbericht", "list"); ?>
<?php $klasse->render("_Arzt", "list"); ?>
<td>
<a href="?task=Arzt_delete_Impftermin_b&id=<?=$klasse->id?>&back=<?=$Arzt->id?>&muss=false" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
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
