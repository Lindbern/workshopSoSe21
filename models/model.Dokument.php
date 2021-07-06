<?php
class Dokument extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Bezeichnung;
public $dateiname_upload;
public $dateiname_path;
public $dateiname_title;
public $_Patient;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Dokument (_Patient, `Bezeichnung` , `dateiname_upload` , `dateiname_path` , `dateiname_title` ) VALUES (?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Dokument SET _Patient=?, `Bezeichnung` =?, `dateiname_upload` =?, `dateiname_path` =?, `dateiname_title` =? where id=?';
const SQL_SELECT_PK='SELECT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Patient as _Patient, `BezeichnungT0`.`literal` as `Bezeichnung_literal`, `Dokument`.`Bezeichnung` as `Bezeichnung`, `Dokument`.`dateiname_path` as `dateiname_path`, `Dokument`.`dateiname_title` as `dateiname_title` from Dokument left join `BezeichnungT` as BezeichnungT0 on `Dokument`.`Bezeichnung` = `BezeichnungT0`.`id`  where Dokument.`id` = ?';
const SQL_SELECT_ALL='SELECT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Patient as _Patient, `BezeichnungT0`.`literal` as `Bezeichnung_literal`, `Dokument`.`Bezeichnung` as `Bezeichnung`, `Dokument`.`dateiname_path` as `dateiname_path`, `Dokument`.`dateiname_title` as `dateiname_title` from Dokument left join `BezeichnungT` as BezeichnungT0 on `Dokument`.`Bezeichnung` = `BezeichnungT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Dokument.`c_ts` as `c_ts`, Dokument.`m_ts` as `m_ts`, Dokument.`id` as `id`, Dokument._Patient as _Patient, `BezeichnungT0`.`literal` as `Bezeichnung_literal`, `Dokument`.`Bezeichnung` as `Bezeichnung`, `Dokument`.`dateiname_path` as `dateiname_path`, `Dokument`.`dateiname_title` as `dateiname_title` from Dokument left join `BezeichnungT` as BezeichnungT0 on `Dokument`.`Bezeichnung` = `BezeichnungT0`.`id` ';
const SQL_DELETE='DELETE FROM Dokument WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Patient='select Dokument.id as id, `BezeichnungT0`.`literal` as `Bezeichnung_literal`, `Dokument`.`Bezeichnung` as `Bezeichnung`, Dokument.dateiname_path as dateiname_path, Dokument.dateiname_title as dateiname_title from Dokument left join `BezeichnungT` as BezeichnungT0 on `Dokument`.`Bezeichnung` = `BezeichnungT0`.`id`  where Dokument._Patient = ?';
}

Dokument::$dataScheme=db::buildScheme("Dokument");
$fp = fopen("models/json/Dokument_complete.json", "w");
fwrite($fp, json_encode(Dokument::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Dokument::$settings=db::loadSettings("Dokument");
$fp = fopen("models/json/Dokument_settings_complete.json", "w");
fwrite($fp, json_encode(Dokument::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
