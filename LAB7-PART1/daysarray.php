<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Using PHP Variables, arrays and operators</title>
    <!-- add other meta -->
</head>
<body>
    <h1>PHP Variables, arrays and operators </h1>

<?php
    $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    echo "<p>The days of the week in English are:
    $days[0], $days[1], $days[2], $days[3],$days[4], $days[5], $days[6]</p>";

    $days_fre = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

    echo "<p>The days of the week in French are:
    $days_fre[0], $days_fre[1], $days_fre[2], $days_fre[3],$days_fre[4], $days_fre[5], $days_fre[6]</p>";
    