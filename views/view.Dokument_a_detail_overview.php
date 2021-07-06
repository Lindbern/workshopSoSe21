<?php
$Dokument_a_list=Core::$view->Dokument_a_list;
$Dokument_a=Core::$view->Dokument_a;
$Patient=Core::$view->Patient;
?>
<div data-role="ui-bar ui-bar-a">
<p><h3>Beziehungsübersicht zur Klasse: Dokument <a href="#popup_Dokument_a" data-rel="popup" data-transition="pop" class="my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Erfahre mehr">Erfahre mehr</a></h3></p>
<div data-role="popup" id="popup_Dokument_a" class="ui-content" data-theme="a" style="max-width:800px;">
<h3>Informationen zu dieser Beziehung ():</h3><br>
Patient (1..1) ---- (*..*) Dokument <br><br>
<h4>Bedeutet für diese Seite der Beziehung:</h4>
<p>Das Objekt in dieser Detailansicht (aus der Klasse: Patient) kann mehrere Verbindungen zu Objekten der Partnerklasse (Dokument) haben (*..*).</p><br>
<h4>Bedeutet für die Partner-Seite der Beziehung:</h4>
<p>Es ist zu beachten, dass das Partnerobjekt genau eine Verbindung zu einem Objekt dieser Klasse haben muss (1..1).</p>
<h4>Die Information zur Partner-Seite sollte vor allem dann beachtet werden:</h4>
<ul><li>wenn eine Verbindung gelöscht wird</li>
<li>wenn ein Objekt gelöscht wird</li></ul>
... durch einen solchen Vorgang könnte nämlich eine erfüllte Muss-Beziehung, auf Seite des Partnerobjekts auf einmal nicht mehr erfüllt sein!
</div>
</div>
<?php
if(!empty($Dokument_a_list)){
?>
<form>
<input id="filterTable-input" data-type="search">
</form>
<div class="overflowx">
<table data-role="table" id="tbl_Dokument_a" data-filter="true" data-input="#filterTable-input" class="ui-responsive" data-mode="columntoggle" data-column-btn-theme="b" data-column-btn-text="Spalten" data-column-popup-theme="a">
<thead>
<tr>
<?php $Dokument_a->renderHeader("id", "table"); ?>
<?php $Dokument_a->renderHeader("c_ts", "table"); ?>
<?php $Dokument_a->renderHeader("m_ts", "table"); ?>
<?php $Dokument_a->renderHeader("Bezeichnung", "table"); ?>
<?php $Dokument_a->renderHeader("dateiname_upload", "table"); ?>
<?php $Dokument_a->renderHeader("dateiname_path", "table"); ?>
<?php $Dokument_a->renderHeader("dateiname_title", "table"); ?>
<?php $Dokument_a->renderHeader("_Patient", "table"); ?>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($Dokument_a_list as $klasse){
?>
<tr>
<?php $klasse->render("id", "list"); ?>
<?php $klasse->render("c_ts", "list"); ?>
<?php $klasse->render("m_ts", "list"); ?>
<?php $klasse->render("Bezeichnung", "list"); ?>
<?php $klasse->render("dateiname_upload", "list"); ?>
<?php $klasse->render("dateiname_path", "list"); ?>
<?php $klasse->render("dateiname_title", "list"); ?>
<?php $klasse->render("_Patient", "list"); ?>
<td>
<a href="?task=Patient_delete_Dokument_a&id=<?=$klasse->id?>&back=<?=$Patient->id?>&muss=false" data-ajax="false" data-role="button"  class="ui-btn ui-icon-delete ui-btn-icon-notext ui-corner-all ui-btn-inline">delete</a>
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
