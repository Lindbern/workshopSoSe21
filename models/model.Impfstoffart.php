<?php
class Impfstoffart extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $ImpfstoffBez;
public $Beschreibung;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Impfstoffart (`ImpfstoffBez` , `Beschreibung` ) VALUES (?, ?)';
const SQL_UPDATE='UPDATE Impfstoffart SET `ImpfstoffBez` =?, `Beschreibung` =? where id=?';
const SQL_SELECT_PK='SELECT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `ImpfstoffBezT0`.`literal` as `ImpfstoffBez_literal`, `Impfstoffart`.`ImpfstoffBez` as `ImpfstoffBez`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart left join `ImpfstoffBezT` as ImpfstoffBezT0 on `Impfstoffart`.`ImpfstoffBez` = `ImpfstoffBezT0`.`id`  where Impfstoffart.`id` = ?';
const SQL_SELECT_ALL='SELECT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `ImpfstoffBezT0`.`literal` as `ImpfstoffBez_literal`, `Impfstoffart`.`ImpfstoffBez` as `ImpfstoffBez`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart left join `ImpfstoffBezT` as ImpfstoffBezT0 on `Impfstoffart`.`ImpfstoffBez` = `ImpfstoffBezT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Impfstoffart.`c_ts` as `c_ts`, Impfstoffart.`m_ts` as `m_ts`, Impfstoffart.`id` as `id`, `ImpfstoffBezT0`.`literal` as `ImpfstoffBez_literal`, `Impfstoffart`.`ImpfstoffBez` as `ImpfstoffBez`, `Impfstoffart`.`Beschreibung` as `Beschreibung` from Impfstoffart left join `ImpfstoffBezT` as ImpfstoffBezT0 on `Impfstoffart`.`ImpfstoffBez` = `ImpfstoffBezT0`.`id` ';
const SQL_DELETE='DELETE FROM Impfstoffart WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Impfstoff_b='select Impfstoffart.id as id, `ImpfstoffBezT0`.`literal` as `ImpfstoffBez_literal`, `Impfstoffart`.`ImpfstoffBez` as `ImpfstoffBez`, Impfstoffart.Beschreibung as Beschreibung from Impfstoffart left join `ImpfstoffBezT` as ImpfstoffBezT0 on `Impfstoffart`.`ImpfstoffBez` = `ImpfstoffBezT0`.`id`  where Impfstoffart.id = ?';
}

Impfstoffart::$dataScheme=db::buildScheme("Impfstoffart");
$fp = fopen("models/json/Impfstoffart_complete.json", "w");
fwrite($fp, json_encode(Impfstoffart::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Impfstoffart::$settings=db::loadSettings("Impfstoffart");
$fp = fopen("models/json/Impfstoffart_settings_complete.json", "w");
fwrite($fp, json_encode(Impfstoffart::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
