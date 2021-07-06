<?php
class ImpfstoffBezT extends DB{
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
const SQL_INSERT='INSERT INTO ImpfstoffBezT (literal, sort) VALUES (?, ?)';
const SQL_UPDATE='UPDATE ImpfstoffBezT SET literal=?, sort=? WHERE id=?';
const SQL_SELECT_PK='SELECT ImpfstoffBezT.* FROM ImpfstoffBezT WHERE id=?';
const SQL_SELECT_ALL='SELECT ImpfstoffBezT.* FROM ImpfstoffBezT';
const SQL_DELETE='DELETE FROM ImpfstoffBezT WHERE id=?';
const SQL_PRIMARY='id';
}
ImpfstoffBezT::$dataScheme=db::buildScheme("ImpfstoffBezT");
$fp = fopen("models/json/ImpfstoffBezT_complete.json", "w");
fwrite($fp, json_encode(db::buildScheme("ImpfstoffBezT"),JSON_UNESCAPED_UNICODE));
fclose($fp);
ImpfstoffBezT::$settings=db::loadSettings("ImpfstoffBezT");
$fp = fopen("models/json/ImpfstoffBezT_settings_complete.json", "w");
fwrite($fp, json_encode(ImpfstoffBezT::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
