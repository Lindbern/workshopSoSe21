<?php
class BezeichnungT extends DB{
//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public $literal;
public $sort;
public static $settings=array();
public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme
//Konstanten
const SQL_INSERT='INSERT INTO BezeichnungT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE BezeichnungT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT BezeichnungT.* FROM BezeichnungT WHERE id=?';
const SQL_SELECT_ALL='SELECT BezeichnungT.* FROM BezeichnungT';
const SQL_DELETE='DELETE FROM BezeichnungT WHERE id=?';
const SQL_PRIMARY='id';
}
BezeichnungT::$dataScheme=db::buildScheme("BezeichnungT");
$fp = fopen("models/json/BezeichnungT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("BezeichnungT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
BezeichnungT::$settings=db::loadSettings("BezeichnungT");
$fp = fopen("models/json/BezeichnungT_settings_complete.json", "w");
fwrite($fp, json_encode(BezeichnungT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
