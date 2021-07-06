<?php
$referrer=Core::import("referrer");
$autocomplete=Core::import("autocomplete");

$Favoriten=new Favoriten();
$icon=$Favoriten->find_task("Patient_new",$_SESSION['uid']);
if ($icon =="star"){
$hover = "hinzufügen";
}else{
$hover = "entfernen";
}

$Patient = Core::$view->Patient;


if(!isset($referrer) && $_POST["registrieren"] != "1"){ ?>

<a href="?task=Patient" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right" style="display:inline-block;" data-ajax=false>No text</a>
<div class="tooltip_hs" style="margin-left:20px;position:absolute">
<a href="?task=favoriten&db_task=Patient_new&icon=<?=$icon?>" class="ui-nodisc-icon ui-alt-icon" data-ajax="false" data-role="button" data-icon="<?=$icon?>" data-iconpos="notext" data-theme="b" data-inline="true" ></a>
<span style="font-size: 15px" class="tooltiptext">Favorit <?=$hover?></span>
</div>

<?php } ?>


<form id="form_Patient" method="post" action="?task=Patient_new" data-ajax="false" <?php if(isset($autocomplete)){ ?> autocomplete="on" <?php } ?> enctype="<?=$Patient::$enctype?>">


<div class="ui-field-contain">
<?php
$Patient = Core::$view->Patient;
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
