<?php
if (isset($_GET['task'])){
    $task = $_GET['task'];
}else{
    $task = "";
}
if ($task != "GruppeT"&& $task != "BezeichnungT"&& $task != "FachrichtungT"&& $task != "ImpfstoffBezT"){
?>
<div id="menupanel" data-role="panel" data-display="overlay">
<?php if(Core::$user->id!=""){ ?>
<a href="?task=home" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >Home</a>
<?php } ?>
<?php
Patient::renderNav("Patient");
Dokument::renderNav("Dokument");
Impftermin::renderNav("Impftermin");
Impfstoff::renderNav("Impfstoff");
Impfstoffart::renderNav("Impfstoffart");
Arzt::renderNav("Arzt");
?>
<?php if(Core::$user->id!=""){ ?>
    <a href="?task=user_edit" data-role="button" data-icon="user" data-theme="a" data-ajax="false" >Mein Profil</a>
<?php } ?>
<?php if(Core::$user->Gruppe>=4){ ?>
<a href="?task=GruppeT" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >Enumerationen</a>
<?php } ?>
<?php if(Core::$user->Gruppe>=4){ ?>
<a href="?task=speicherstande" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >Speicherstände</a>
<?php } ?>
<?php if(Core::$user->Gruppe>=4){ ?>
<a href="?task=visits" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >Statistik</a>
<?php } ?>
</div>
<?php }else{ ?>
<div id="menupanel" data-role="panel" data-display="overlay">
<a href="?task=GruppeT" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >GruppeT</a>
<a href="?task=BezeichnungT" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >BezeichnungT</a>
<a href="?task=FachrichtungT" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >FachrichtungT</a>
<a href="?task=ImpfstoffBezT" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >ImpfstoffBezT</a>
<a href="?task=home" data-role="button" data-icon="bars" data-theme="a" data-ajax="false" >Zurück</a>
</div>
<?php } ?>
