<?php
class Patient extends DB{

//Variablenliste
public $id;
public $c_ts;
public $m_ts;
public static $settings=array();
public $Nachname;
public $Name;
public $Geburtsdatum;
public $Telefonnummer;
public $Adresse_Nachname;
public $Adresse_Vorname;
public $Adresse_Straße;
public $Adresse_PLZ;
public $Adresse_Ort;
public $_Impftermin;
public $ts;

public $dataMapping=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

public static $dataScheme=array(); // damit ein eigenes statisches Array entsteht. Sonst ist es DB::$dataScheme

//Konstanten
const SQL_INSERT='INSERT INTO Patient (_Impftermin, `Nachname` , `Name` , `Geburtsdatum` , `Telefonnummer` , `Adresse_Nachname` , `Adresse_Vorname` , `Adresse_Straße` , `Adresse_PLZ` , `Adresse_Ort` ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
const SQL_UPDATE='UPDATE Patient SET _Impftermin=?, `Nachname` =?, `Name` =?, `Geburtsdatum` =?, `Telefonnummer` =?, `Adresse_Nachname` =?, `Adresse_Vorname` =?, `Adresse_Straße` =?, `Adresse_PLZ` =?, `Adresse_Ort` =? where id=?';
const SQL_SELECT_PK='SELECT Patient.`c_ts` as `c_ts`, Patient.`m_ts` as `m_ts`, Patient.`id` as `id`, Patient._Impftermin as _Impftermin, `Patient`.`Nachname` as `Nachname`, `Patient`.`Name` as `Name`, `Patient`.`Geburtsdatum` as `Geburtsdatum`, `Patient`.`Telefonnummer` as `Telefonnummer`, `Patient`.`Adresse_Nachname` as `Adresse_Nachname`, `Patient`.`Adresse_Vorname` as `Adresse_Vorname`, `Patient`.`Adresse_Straße` as `Adresse_Straße`, `Patient`.`Adresse_PLZ` as `Adresse_PLZ`, `Patient`.`Adresse_Ort` as `Adresse_Ort` from Patient where Patient.`id` = ?';
const SQL_SELECT_ALL='SELECT Patient.`c_ts` as `c_ts`, Patient.`m_ts` as `m_ts`, Patient.`id` as `id`, Patient._Impftermin as _Impftermin, `Patient`.`Nachname` as `Nachname`, `Patient`.`Name` as `Name`, `Patient`.`Geburtsdatum` as `Geburtsdatum`, `Patient`.`Telefonnummer` as `Telefonnummer`, `Patient`.`Adresse_Nachname` as `Adresse_Nachname`, `Patient`.`Adresse_Vorname` as `Adresse_Vorname`, `Patient`.`Adresse_Straße` as `Adresse_Straße`, `Patient`.`Adresse_PLZ` as `Adresse_PLZ`, `Patient`.`Adresse_Ort` as `Adresse_Ort` from Patient';
const SQL_SELECT_IGNORE_DERIVED='SELECT DISTINCT Patient.`c_ts` as `c_ts`, Patient.`m_ts` as `m_ts`, Patient.`id` as `id`, Patient._Impftermin as _Impftermin, `Patient`.`Nachname` as `Nachname`, `Patient`.`Name` as `Name`, `Patient`.`Geburtsdatum` as `Geburtsdatum`, `Patient`.`Telefonnummer` as `Telefonnummer`, `Patient`.`Adresse_Nachname` as `Adresse_Nachname`, `Patient`.`Adresse_Vorname` as `Adresse_Vorname`, `Patient`.`Adresse_Straße` as `Adresse_Straße`, `Patient`.`Adresse_PLZ` as `Adresse_PLZ`, `Patient`.`Adresse_Ort` as `Adresse_Ort` from Patient';
const SQL_DELETE='DELETE FROM Patient WHERE id=?';
const SQL_PRIMARY='id';

const SQL_SELECT_Dokument_a='select Patient.id as id, Patient.Nachname as Nachname, Patient.Name as Name, Patient.Geburtsdatum as Geburtsdatum, Patient.Telefonnummer as Telefonnummer, Patient.Adresse_Nachname as Adresse_Nachname, Patient.Adresse_Vorname as Adresse_Vorname, Patient.Adresse_Straße as Adresse_Straße, Patient.Adresse_PLZ as Adresse_PLZ, Patient.Adresse_Ort as Adresse_Ort from Patient where Patient.id = ?';
const SQL_SELECT_Impftermin='select Patient.id as id, Patient.Nachname as Nachname, Patient.Name as Name, Patient.Geburtsdatum as Geburtsdatum, Patient.Telefonnummer as Telefonnummer, Patient.Adresse_Nachname as Adresse_Nachname, Patient.Adresse_Vorname as Adresse_Vorname, Patient.Adresse_Straße as Adresse_Straße, Patient.Adresse_PLZ as Adresse_PLZ, Patient.Adresse_Ort as Adresse_Ort from Patient where Patient._Impftermin = ?';
}

Patient::$dataScheme=db::buildScheme("Patient");
$fp = fopen("models/json/Patient_complete.json", "w");
fwrite($fp, json_encode(Patient::$dataScheme,JSON_UNESCAPED_UNICODE));
fclose($fp);
Patient::$settings=db::loadSettings("Patient");
$fp = fopen("models/json/Patient_settings_complete.json", "w");
fwrite($fp, json_encode(Patient::$settings,JSON_UNESCAPED_UNICODE));
fclose($fp);
