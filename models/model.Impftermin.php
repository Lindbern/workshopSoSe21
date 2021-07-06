<?php
class Impftermin extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Termin;
public $Aussage;
public $Ausführung;
public $Impfbericht;
public $_Arzt;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Impftermin (_Arzt, `Termin` , `Aussage` , `Ausführung` , `Impfbericht` ) VALUES (?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Impftermin SET _Arzt=?, `Termin` =?, `Aussage` =?, `Ausführung` =?, `Impfbericht` =? where id=?';
const SQL_SELECT_PK='SELECT Impftermin.`c_ts` as `c_ts`, Impftermin.`m_ts` as `m_ts`, Impftermin.`id` as `id`, Impftermin._Arzt as _Arzt, `Impftermin`.`Termin` as `Termin`, `Impftermin`.`Aussage` as `Aussage`, `Impftermin`.`Ausführung` as `Ausführung`, `Impftermin`.`Impfbericht` as `Impfbericht` from Impftermin where Impftermin.`id` = ?';
const SQL_SELECT_ALL='SELECT Impftermin.`c_ts` as `c_ts`, Impftermin.`m_ts` as `m_ts`, Impftermin.`id` as `id`, Impftermin._Arzt as _Arzt, `Impftermin`.`Termin` as `Termin`, `Impftermin`.`Aussage` as `Aussage`, `Impftermin`.`Ausführung` as `Ausführung`, `Impftermin`.`Impfbericht` as `Impfbericht` from Impftermin';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Impftermin.`c_ts` as `c_ts`, Impftermin.`m_ts` as `m_ts`, Impftermin.`id` as `id`, Impftermin._Arzt as _Arzt, `Impftermin`.`Termin` as `Termin`, `Impftermin`.`Aussage` as `Aussage`, `Impftermin`.`Ausführung` as `Ausführung`, `Impftermin`.`Impfbericht` as `Impfbericht` from Impftermin';
const SQL_DELETE='DELETE FROM Impftermin WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Patient_b='select Impftermin.id as id, Impftermin.Termin as Termin, Impftermin.Aussage as Aussage, Impftermin.Ausführung as Ausführung, Impftermin.Impfbericht as Impfbericht from Impftermin where Impftermin.id = ?';
const SQL_SELECT_Impfstoff_a='select Impftermin.id as id, Impftermin.Termin as Termin, Impftermin.Aussage as Aussage, Impftermin.Ausführung as Ausführung, Impftermin.Impfbericht as Impfbericht from Impftermin where Impftermin.id = ?';
const SQL_SELECT_Arzt='select Impftermin.id as id, Impftermin.Termin as Termin, Impftermin.Aussage as Aussage, Impftermin.Ausführung as Ausführung, Impftermin.Impfbericht as Impfbericht from Impftermin where Impftermin._Arzt = ?';
}

Impftermin::$dataScheme=db::buildScheme("Impftermin");
$fp = fopen("models/json/Impftermin_complete.json", "w");
fwrite($fp, json_encode(Impftermin::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Impftermin::$settings=db::loadSettings("Impftermin");
$fp = fopen("models/json/Impftermin_settings_complete.json", "w");
fwrite($fp, json_encode(Impftermin::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
