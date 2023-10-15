<?php

require_once './lib/bootstrap.php';

// validation
$valid = true;
$errors = [];

if (empty($_POST['name'])) {
    $valid = false;
    $errors[] = 'Name is a required field.';
}
if (empty($_POST['district'])) {
    $valid = false;
    $errors[] = 'District is required.';
}
if (!is_numeric($_POST['population'])) {
    $valid = false;
    $errors[] = 'Population field must be a number.';
}

if ($valid === false) {
    session()->flash('errors', $errors);
    session()->flashRequest();
    header('Location: create.php');
    exit();
}


$city = new City;
$city->name = $_POST['name'] ?? $city->name;
$city->district = $_POST['district'] ?? $city->district;
$city->population = $_POST['population'] ?? $city->population;

$city->insertNewCityToDB();

// ID of the inserted city
$id  = DB::getPdo()->lastInsertId();

session()->flash('success_message', 'The record was successfully saved!');

header('Location: list.php');
