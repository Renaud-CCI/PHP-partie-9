<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 9</title>
</head>
<?php 
require("calendarFunctions.php");
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR');
$semaine = array(" Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi ",
" vendredi "," samedi ");
$mois =array(1=>" janvier "," février "," mars "," avril "," mai "," juin ",
" juillet "," août "," septembre "," octobre "," novembre "," décembre ");
$date = new DateTimeImmutable("now");
$mai2016 = new DateTime("2016-05-16 00:00:00");
$amountDays = $date->diff($mai2016);
$fev2016 = new DateTime("2016-02-01");
$mar2016 = new DateTime("2016-03-01");
$amountFev = $fev2016->diff($mar2016);
$date2 = new DateTime ("now");
$date3 = clone $date2;
$intervalPlus = $date2->modify(" + 20 days");
$intervalLess = $date3->modify(" - 22 days");
?>
<body>
<!-- Afficher la date courante en respectant la forme jj/mm/aaaa (ex : 16/05/2016) -->
    <p>Date du jour : <?= date("d/m/Y") ?></p>

    <!-- Exercice 2
Afficher la date courante en respectant la forme jj-mm-aa (ex : 16-05-16) -->
    <p>Date du jour : <?= date("d-m-y") ?></p>

    <!-- Exercice 3
Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)
Bonus : Le faire en français. -->
    <p>Date du jour : <?= $semaine[date('w')] ," ",date('j'),"", $mois[date('n')], date('Y'); ?></p>

    <!-- Exercice 4
Afficher le timestamp du jour.
Afficher le timestamp du mardi 2 août 2016 à 15h00. -->
    <p>Timestamp du jour : <?= $date->getTimestamp()?></p>
    <p>Timestamp du mardi 2 août 2016 à 15h00 : <?= mktime(15, 00, 0, 8, 2, 2016)?></p>

    <!-- Exercice 5
Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016. -->
    <p>Nombre de jour qui sépare aujourd'hui avec le 16 mai 2016 : <?=$amountDays->format('%a jours')?></p>

    <!-- Exercice 6
Afficher le nombre de jour dans le mois de février de l'année 2016. -->
    <p>Nombre de jours dans le mois de février 2016 : <?=$amountFev->format('%a jours')?></p>

<!-- Exercice 7
Afficher la date du jour + 20 jours. -->
    <p>Date du jour + 20 jours : <?= $intervalPlus->format("d/m/Y")?></p>

<!-- Exercice 8
Afficher la date du jour - 22 jours -->
    <p>Date du jour - 22 jours : <?= $intervalLess->format("d/m/Y")?></p>

<!-- TP
Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année. -->
    <hr>
    <br>
    <form action="index.php" method="get">
        <label for="months">Choisir un mois</label>
        <select name="months">
        <?php 
        foreach ($mois as $key=>$month){
            echo "<option value ='$key'>$month</option>";
        };
        ?>
        </select>
        <label for="years">Choisir une année</label>
        <select name="years">
        <?php 
        for ($year=2023; $year >= 1900; $year--) { 
            echo "<option value ='$year'>$year</option>";
        };
        ?>
        </select>
        <button type="submit">Valider</button>
    </form>
    <br>
    <h2><?=(isset ($_GET["months"]) && isset ($_GET["years"]))? ucwords($mois[$_GET["months"]]). " ". $_GET["years"]: ""; ?></h2>
    <table border="1px">
        <tr bgcolor="grey">
            <?php
            foreach($semaine as $day){
                echo "<td width=\"80px\" align=\"center\">". ucwords($day). "</td>";
            }
            ?>
        </tr>

    </table>

            <?= test() ?>
            <?php
            var_dump(daysInMonth($_GET["months"], $_GET["years"]));

            ?>
    
</body>
</html>