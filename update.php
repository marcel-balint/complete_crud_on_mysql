<?php

require_once './lib/bootstrap.php';
$id = $_GET['id'] ?? null;

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
    header('Location: edit.php?id=' . $id);
    exit();
}




$city = new City;
$city->name = $_POST['name'] ?? $city->name;
$city->district = $_POST['district'] ?? $city->district;
$city->population = $_POST['population'] ?? $city->population;


$query = "UPDATE cities SET name = :name, district = :district, population = :population WHERE id = :id";
$params = [
    'name' => $city->name,
    'district' => $city->district,
    'population' => $city->population,
    'id' => $id,
];

DB::update($query, $params);

session()->flash('success_message', 'The record was successfully edited.');
header('Location: list.php');
