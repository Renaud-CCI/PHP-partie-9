<?php

function test(){
    echo $_GET["months"];
};

function daysInMonth($month,$year)
{
    $date = sprintf('%s-%02s-01', $year,$month);
    return (int) (new DateTime($date))->format('t');
}

//https://phpsources.net/code/php/date-heure/937_affichage-d-un-mois


