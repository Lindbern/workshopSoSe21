<?php
$ImpfstoffBezT = Core::$view->ImpfstoffBezT;
$ImpfstoffBezT_list = Core::$view->ImpfstoffBezT_list;
?>
<a href="?task=ImpfstoffBezT&id=<?=$ImpfstoffBezT->id?>" data-ajax="false" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_ImpfstoffBezT" method="post" action="?task=ImpfstoffBezT_edit&id=<?=$ImpfstoffBezT->id?>" data-ajax="false" enctype="<?=$ImpfstoffBezT::$enctype?>">
<div class="ui-field-contain">
<?php
$ImpfstoffBezT->renderLabel("id");
$ImpfstoffBezT->render("id");
$ImpfstoffBezT->renderLabel("c_ts");
$ImpfstoffBezT->render("c_ts");
$ImpfstoffBezT->renderLabel("m_ts");
$ImpfstoffBezT->render("m_ts");
$ImpfstoffBezT->renderLabel("literal");
$ImpfstoffBezT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >update</button>
</div>
</form>
