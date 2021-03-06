<?php
class Arzt extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Name;
public $Vorname;
public $Email;
public $Fachrichtung;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Arzt (`Name` , `Vorname` , `Email` , `Fachrichtung` ) VALUES (?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Arzt SET `Name` =?, `Vorname` =?, `Email` =?, `Fachrichtung` =? where id=?';
const SQL_SELECT_PK='SELECT Arzt.`c_ts` as `c_ts`, Arzt.`m_ts` as `m_ts`, Arzt.`id` as `id`, `Arzt`.`Name` as `Name`, `Arzt`.`Vorname` as `Vorname`, `Arzt`.`Email` as `Email`, `FachrichtungT0`.`literal` as `Fachrichtung_literal`, `Arzt`.`Fachrichtung` as `Fachrichtung` from Arzt left join `FachrichtungT` as FachrichtungT0 on `Arzt`.`Fachrichtung` = `FachrichtungT0`.`id`  where Arzt.`id` = ?';
const SQL_SELECT_ALL='SELECT Arzt.`c_ts` as `c_ts`, Arzt.`m_ts` as `m_ts`, Arzt.`id` as `id`, `Arzt`.`Name` as `Name`, `Arzt`.`Vorname` as `Vorname`, `Arzt`.`Email` as `Email`, `FachrichtungT0`.`literal` as `Fachrichtung_literal`, `Arzt`.`Fachrichtung` as `Fachrichtung` from Arzt left join `FachrichtungT` as FachrichtungT0 on `Arzt`.`Fachrichtung` = `FachrichtungT0`.`id` ';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Arzt.`c_ts` as `c_ts`, Arzt.`m_ts` as `m_ts`, Arzt.`id` as `id`, `Arzt`.`Name` as `Name`, `Arzt`.`Vorname` as `Vorname`, `Arzt`.`Email` as `Email`, `FachrichtungT0`.`literal` as `Fachrichtung_literal`, `Arzt`.`Fachrichtung` as `Fachrichtung` from Arzt left join `FachrichtungT` as FachrichtungT0 on `Arzt`.`Fachrichtung` = `FachrichtungT0`.`id` ';
const SQL_DELETE='DELETE FROM Arzt WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Impftermin_b='select Arzt.id as id, Arzt.Name as Name, Arzt.Vorname as Vorname, Arzt.Email as Email, `FachrichtungT0`.`literal` as `Fachrichtung_literal`, `Arzt`.`Fachrichtung` as `Fachrichtung` from Arzt left join `FachrichtungT` as FachrichtungT0 on `Arzt`.`Fachrichtung` = `FachrichtungT0`.`id`  where Arzt.id = ?';
}

Arzt::$dataScheme=db::buildScheme("Arzt");
$fp = fopen("models/json/Arzt_complete.json", "w");
fwrite($fp, json_encode(Arzt::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Arzt::$settings=db::loadSettings("Arzt");
$fp = fopen("models/json/Arzt_settings_complete.json", "w");
fwrite($fp, json_encode(Arzt::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
