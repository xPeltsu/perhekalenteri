<?php

  // Liitetään globaalit muuttujat ja funktiot.
  require_once("globals.php");
  require_once("functions.php");

  // Käytetään kuluvaa vuotta, jos vuotta ei ole määritelty.
  if (isset($_GET["year"])) {
    $year = $_GET["year"];
  } else {
    $year = date("Y");
  }

  // Käytetään kuluvaa kuukautta, jos kuukautta ei ole määritelty.
  if (isset($_GET["month"])) {
    $month = $_GET["month"];
  } else {
    $month = date("n");
  }

  // Käytetään listan ensimmäistä fonttia, jos otsikkofonttia
  // ei ole määritelty.
  if (isset($_GET["header"])) {
     $font = $_GET["header"];
  } else {
     $font = array_keys($headerfonts)[0];
  }

  // Käytetään listan ensimmäistä taustakuvaa, jos sitä
  // ei ole määritelty.
  if (isset($_GET["bgimage"])) {
     $bgimage = $_GET["bgimage"];
  } else {
     $bgimage = array_keys($bgimages)[0];
  }

  // Käytetään oletuslistaa, jos nimilistaa ei ole määritelty.
  if (isset($_GET["names"])) {
    $names = split("\n",$_GET["names"]);
  } else {
    $names = split("\n",$defaultnames);
  }

  // Muodostetaan pyhäpäivistä ns. pohjataulukko, jossa on
  // kaikki ne pyhäpäivät, joiden paikka ei muutu vuoden aikana.
  $holidays = array(
     1 => array(
        1 => "Uudenvuodenpäivä",
        6 => "Loppiainen"),
     5 => array(
        1 => "Vappu"),
    12 => array(
        6 => "Itsenäisyyspäivä",
       25 => "Joulupäivä",
       26 => "Tapaninpäivä")
  );

  // Lasketaan pääsiäisen ja helatorstain paikat.
  $easter = calculateEasterDay($year);
  $holidays = addHoliday($holidays, $easter, "Pääsiäispäivä");
  $holidays = addHoliday($holidays, strtotime('+1 days', $easter), "2. pääsiäispäivä");
  $holidays = addHoliday($holidays, strtotime('-2 days', $easter), "Pitkäperjantai");
  $holidays = addHoliday($holidays, strtotime('+39 days', $easter), "Helatorstai");

  // Lasketaan pyhäinpäivän paikka, jota vietetään välille 31.10.–6.11. osuvana lauantaina.
  $allsaintsday =  findNextWeekday(strtotime("$year-10-31"),6);
  $holidays = addHoliday($holidays, $allsaintsday, "Pyhäinpäivä");

  // Lasketaan isänpäivän paikka, jota vietetään marraskuun toisena sunnuntaina.
  $fathersday = strtotime('+1 week',findNextWeekday(strtotime("$year-11-1"),7));
  $holidays = addHoliday($holidays, $fathersday, "Isänpäivä");

  // Lasketaan äitienpäivän paikka, jota vietetään toukokuun toisena sunnuntaina.
  $mothersday = strtotime('+1 week',findNextWeekday(strtotime("$year-5-1"),7));
  $holidays = addHoliday($holidays, $mothersday, "Äitienpäivä");

  // Lasketaan juhannuksen paikka, jota vietetään kesäkuun 20. ja 26. päivien välisenä lauantaina.
  $midsummerday = findNextWeekday(strtotime("$year-6-20"),6);
  $holidays = addHoliday($holidays, $midsummerday, "Juhannuspäivä");

  // Lasketaan yksittäisen muistiokentän leveys. Kokonaisleveys
  // 220mm jaetaan tasan kaikkien nimien kesken.
  $memoColumnWidth = floor(220/count($names));

  // Lasketaan kuukauden päivien määrä.
  $days = daysInMonth($year,$month);

?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <title><?= $months[$month] . " " . $year ?></title>
    <link rel="stylesheet" href="style.php?header=<?=$font?>&bgimage=<?=$bgimage?>" type="text/css">
  </head>
  <body>
<?php
  echo "<h1>" . $months[$month] . " " . $year . "</h1>";

  echo "<table>";
  echo "<tr class='names'>";
  echo "  <td style='width:6mm'></td>";
  echo "  <td style='width:10mm'></td>";
  echo "  <td></td>";

  foreach ($names as $name) {
    echo "<td class='name' style='width:{$memoColumnWidth}mm'>$name</td>";
  }
  echo "</tr>";

  for ($day=1; $day<=$days; $day++) {

    $timestamp = strtotime("$year-$month-$day");
    $weekday = date('N', $timestamp);
    $week =  date('W', $timestamp);

    if (isHoliday($holidays, $month, $day, $weekday)) {
      echo "<tr class='holiday'>";
    } else {
      echo "<tr>";
    }
    if ($weekday == 1) {
      echo "<td class='week'>$week</td>";
    } else {
      echo "<td class='week'></td>";
    }
    echo "<td class='day'>$day</td>";
    echo "<td class='weekday'>$weekdays[$weekday]<span class='holidayname'>" . $holidays[$month][$day]  . "</span></td>";
    foreach ($names as $name) {
      echo "<td class='memo'></td>";
    }
    echo "</tr>";

  }

  echo "</table>";

?>
<div class="footer">perhekalenteri by Kurpitsa</div>

</body>
</html>
