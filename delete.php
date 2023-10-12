<?php
require_once './lib/bootstrap.php';

$city = new City;

$id =  $_GET['id'];

var_dump($id);
$the_city = DB::selectOne("
SELECT *
FROM `cities`
   WHERE `id` = :id
", ['id' => $id], 'City');

DB::delete("
DELETE FROM cities
WHERE id = :id
", ['id' => $id]);
session()->flash('success_message', 'The record was successfully deleted.');
header('Location: list.php');
