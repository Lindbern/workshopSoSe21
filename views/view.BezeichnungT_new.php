<?php
$BezeichnungT = Core::$view->BezeichnungT;
$BezeichnungT_list = Core::$view->BezeichnungT_list ;
?>
<a href="?task=BezeichnungT" class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all" align="right">No text</a>
<form id="form_BezeichnungT" method="post" action="?task=BezeichnungT_new" data-ajax="false" enctype="<?=$BezeichnungT::$enctype?>">
<div class="ui-field-contain">
<?php
$BezeichnungT = Core::$view->BezeichnungT;
$BezeichnungT->renderLabel("id");
$BezeichnungT->render("id");
$BezeichnungT->renderLabel("c_ts");
$BezeichnungT->render("c_ts");
$BezeichnungT->renderLabel("m_ts");
$BezeichnungT->render("m_ts");
$BezeichnungT->renderLabel("literal");
$BezeichnungT->render("literal");
?>
<label for="update">speichern:</label><button type="submit" onclick="BezHinweis()" name="update" id="update" value="1" >speichern</button>
</div>
</form>
<script>
</script>
