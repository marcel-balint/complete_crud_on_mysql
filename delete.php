<?php
require_once './lib/bootstrap.php';

$id = $_GET['id'];
$city = new City;
$city->delete($id);

session()->flash('success_message', 'The record was successfully deleted.');
header('Location: list.php');
