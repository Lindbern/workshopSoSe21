<?php
$referrer=Core::import("referrer");
$autocomplete=Core::import("autocomplete");

$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Dokument_new",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}

$Dokument = Core::$view->Dokument;


if(!isset($referrer) && $_POST["registrieren"] != "1"){ ?>

<a href="?task=Dokument" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;" data-ajax=false>No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Dokument_new&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>

<?php } ?>


<form id="form_Dokument" method="post" action="?task=Dokument_new" data-ajax="false" <?php if(isset($autocomplete)){ ?> autocomplete="on" <?php } ?> enctype="<?=$Dokument::$enctype?>">


<div class="ui-field-contain">
<?php
$Dokument = Core::$view->Dokument;
$Dokument->renderLabel("id");
$Dokument->render("id");
$Dokument->renderLabel("c_ts");
$Dokument->render("c_ts");
$Dokument->renderLabel("m_ts");
$Dokument->render("m_ts");
$Dokument->renderLabel("Bezeichnung");
$Dokument->render("Bezeichnung");
$Dokument->renderLabel("dateiname");
$Dokument->renderLabel("dateiname_upload");
$Dokument->render("dateiname_upload");
$Dokument->renderLabel("dateiname_path");
$Dokument->render("dateiname_path");
$Dokument->renderLabel("dateiname_title");
$Dokument->render("dateiname_title");
$Dokument->renderLabel("_Patient");
$Dokument->render("_Patient");

if(!isset($referrer)){
   if ($_POST["registrieren"] == "1"){ ?>
   <button type="submit" onclick="BezHinweis()" name="registrieren-ng" id="registrieren-ng" value="1" style="width:100%">speichern</button>
   <?php }else{ ?>
   <button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" style="width:100%">speichern</button>
   <?php }
}else{ ?>
<div id="action" style="text-align:center">
<a type="button" name="back" id="cancel" data-ajax="false" href="?task=<?=$referrer?>" class=" ui-btn ui-shadow ui-corner-all ui-btn-inline ui-icon-delete ui-btn-icon-left" style="width:18%;margin:30px;20px;" data-ajax=false>abbrechen</a>
<button type="submit" name="back" id="back" data-ajax="false" value="<?=$referrer?>" class=" ui-btn ui-shadow ui-corner-all ui-btn-inline ui-icon-check ui-btn-icon-left" style="width:25%;margin:30px;20px;" data-ajax=false>speichern</button>
</div>
<?php } ?>

</div>
</form>
<script>
</script>
