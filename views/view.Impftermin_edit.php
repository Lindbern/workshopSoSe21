<?php
$Impftermin = Core::$view->Impftermin;
$Impftermin_list = Core::$view->Impftermin_list ;
if (isset($_GET['task_source'])){
$task_source = $_GET['task_source'];
}else{
$task_source = "Impftermin";
}
$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Impftermin_edit",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}
?>
<a href="?task=<?=$task_source?>&id=<?=$Impftermin->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;">No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Impftermin_edit&icon=<?=$icon?>&id=<?=$Impftermin->id?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>
<form id="form_Impftermin" method="post" action="?task=Impftermin_edit&id=<?=$Impftermin->id?>" data-ajax="false" enctype="<?=$Impftermin::$enctype?>">
<div class="ui-field-contain">
<?php
$Impftermin->renderLabel("id");
$Impftermin->render("id");
$Impftermin->renderLabel("c_ts");
$Impftermin->render("c_ts");
$Impftermin->renderLabel("m_ts");
$Impftermin->render("m_ts");
$Impftermin->renderLabel("Termin");
$Impftermin->render("Termin");
$Impftermin->renderLabel("Aussage");
$Impftermin->render("Aussage");
$Impftermin->renderLabel("Ausführung");
$Impftermin->render("Ausführung");
$Impftermin->renderLabel("Impfbericht");
$Impftermin->render("Impfbericht");
$Impftermin->renderLabel("_Arzt");
$Impftermin->render("_Arzt");
?>
<button type="submit" name="update" id="update" value="1" style="width:100%">update</button>
</div>
</form>
