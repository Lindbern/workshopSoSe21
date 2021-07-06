<?php
$ImpfstoffBezT = Core::$view->ImpfstoffBezT;
$ImpfstoffBezT_list = Core::$view->ImpfstoffBezT_list ;
?>
<a href="?task=ImpfstoffBezT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_ImpfstoffBezT" method="post" action="?task=ImpfstoffBezT_new" data-ajax="false" enctype="<?=$ImpfstoffBezT::$enctype?>">
<div class="ui-field-contain">
<?php
$ImpfstoffBezT = Core::$view->ImpfstoffBezT;
$ImpfstoffBezT->renderLabel("id");
$ImpfstoffBezT->render("id");
$ImpfstoffBezT->renderLabel("c_ts");
$ImpfstoffBezT->render("c_ts");
$ImpfstoffBezT->renderLabel("m_ts");
$ImpfstoffBezT->render("m_ts");
$ImpfstoffBezT->renderLabel("literal");
$ImpfstoffBezT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
