<?php

  // addDays
  //   Lisää (tai poistaa) annettuun Unix-aikaleimaan annetun
  //   määrän päiviä. Palauttaa kokonaisluvun, jossa on
  //   Unix-aikaleima.
  function addDays($timestamp, $daysToAdd) {
    // Luodaan uusi DateTime-olio.
    $day = new DateTime();
    // Asetetaan olion aika annetusta aikaleimasta.
    $day->setTimestamp($timestamp);
    // Lisätään paivien määrä lähtöpäivään.
    $day->add(new DateInterval("P{$daysToAdd}D"));
    // Palautetaan tulos aikaleimana.
    return $day->getTimestamp();
  }

  // addHoliday
  //   Lisää annetulle päivälle juhlapyhän. Juhlapyhä lisätään
  //   kaksiulotteiseen taulukkoon, jossa ensimmäinen arvo on
  //   kuukausi ja toinen päivä. Lisättävä päivä annetaan ns.
  //   ISO-muodossa (2021-11-30). Funktio palauttaa päivitetyn
  //   taulukon palautusarvona.
  function addHoliday($array, $day, $name) {
    $array[getMonthFromTimestamp($day)][getDayFromTimestamp($day)] = $name;
    return $array;
  }

  // calculateEasterDay
  //   Laskee pääsiäispäivän sijainnin annettuna vuonna.
  //   Palauttaa pääsiäispäivän Unix-aikaleimana.
  function calculateEasterDay($year) {
    // Lasketaan päivien määrä päivästä 21.3. eteenpäin.
    // Käytetään apuna PHP:n sisäistä funktiota.
    $days = easter_days($year);
    // Muodostetaan lähtöpäivästä aikaleima.
    $start = strtotime("$year-03-21");
    // Palautetaan aikaleima, jossa on lisätty päivien määrä
    // lähtöpäivästä eteenpäin.
    return addDays($start, $days);
  }

  // daysInMonth
  //   Selvittää kuukauden päivien määrän, kun vuosi ja kuukausi
  //   annetaan. Palauttaa päivien määrän kokonaislukuna.
  function daysInMonth($year,$month) {
    $days = array(
       1 => 31,
       2 => 28,
       3 => 31,
       4 => 30,
       5 => 31,
       6 => 30,
       7 => 31,
       8 => 31,
       9 => 30,
      10 => 31,
      11 => 30,
      12 => 31
    );

    if ($month == 2 && isLeapYear($year)) {
      return 29;
    } else {
      return $days[$month];
    }
  }

  // findNextWeekday
  //   Selvittää seuraavan pyydetyn viikonpäivän annetusta
  //   aikaleimasta eteenpäin. Jos aikaleimaksi annetaan "2021-05-01" ja
  //   ja tavoitepäiväksi 7 (sunnuntai), niin funktio etsii tuosta päivästä
  //   mukaanlukien seuraavan sunnuntai-päivän, esimerkkiarvoilla se olisi
  //   "2021-05-02", joka palautetaan Unix-aikaleimana.
  function findNextWeekday($starttime,$targetday) {
    // Selvitetään lähtöpäivän viikonpäivä.
    $weekday = date('N', $starttime);
    if ($weekday < $targetday) {
      // Lähtöpäivä on aiemmin viikolla, lasketaan päivien erotus.
      // Esimerkiksi lähtöpäivä on maanantai (1) ja tavoitepäivä on torstai (4),
      // tällöin lähtöpäivään lisätään 4-1=3 päivää.
      $delta = $targetday - $weekday;
      return addDays($starttime, $delta);
    } else if($weekday > $targetday) {
      // Lähtöpäivä on myöhemmin viikolla, lasketaan seuraavan viikon päivä.
      // Esimerkiksi lähtöpäivä on lauantai (6) ja tavoitepäivä on torstai (4),
      // tällöin lähtöpäivään lisätään loppuviikko (7-6=1) ja alkuviikko (4).
      $delta = (7 - $weekday) + $targetday;
      return addDays($starttime, $delta);
    } else {
      // Jäljelle jää vaihtoehto, että lähtöpäivä on sama kuin tavoitepäivä,
      // tällöin lähtöpäivä voidaan käyttää sellaisenaan.
      return $starttime;
    }
  }

  // getDayFromDate
  //   Selvittää kuukauden päivän annetusta Unix-aikaleimasta.
  //   Palauttaa kokonaisluvun välillä 1-31.
  function getDayFromTimestamp($timestamp) {
    return date('j', $timestamp);
  }


  // getHolidayName
  //   Selvittää, onko annettu päivälle pyhäpäiväteksti. Jos päivälle
  //   on teksti, palauttaa sen, muuten palauttaa null-arvon.
  function getHolidayName($holidays, $month, $day) {
    if (isset($holidays[$month][$day])) {
      return $holidays[$month][$day];
    } else {
      return null;
    }
  }

  // getMonthFromDate
  //   Selvittää kuukauden annetusta Unis-aikaleimasta.
  //   Palauttaa kokonaisluvun välillä 1-12.
  function getMonthFromTimestamp($timestamp) {
    return date('n', $timestamp);
  }

  // isHoliday
  //   Selvittää onko annettu päivä pyhäpäivä. Ensimmäiseksi
  //   tarkistetaan onko tarkasteltava päivä sunnuntai.
  //   Tämän jälkeen tarkistetaan onko tarkastetava päivä
  //   annetussa pyhäpäivä-taulukossa.
  //   Palauttaa toden, jos annettu päivä on pyhäpäivä, 
  //   muuten epätoden.
  function isHoliday($holidays, $month, $day, $dayOfWeek) {
    if ($dayOfWeek == 7) {
      return true;
    } else if (isset($holidays[$month][$day])) {
      return true;
    } else {
      return false;
    }
  }

  // isLeapYear
  //   Laskee onko annettu vuosi karkausvuosi.
  //   Tosi, jos vuosi on karkausvuosi, muuten epätosi.
  function isLeapYear($year) {
    return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year %400) == 0)));
  }

?>
