<?php

  // Otsakefontit aakkosjärjestyksessä.
  $headerfonts = array(
    "bebasneue" => array(
      "name" => "Bebas Neue",
      "url"  => "https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"),
    "leckerlione" => array(
      "name" => "Leckerli One",
      "url"  => "https://fonts.googleapis.com/css2?family=Leckerli+One&display=swa"),
    "lobster" => array(
      "name" => "Lobster",
      "url"  => "https://fonts.googleapis.com/css2?family=Lobster&display=swap"),
    "pacifico" => array(
      "name" => "Pacifico",
      "url"  => "https://fonts.googleapis.com/css2?family=Pacifico&display=swap"),
    "passionone" => array(
      "name" => "Passion One",
      "url"  => "https://fonts.googleapis.com/css2?family=Passion+One&display=swap"),
    "satisfy" => array(
      "name" => "Satisfy",
      "url"  => "https://fonts.googleapis.com/css2?family=Satisfy&display=swap"),
    "sigmarone" => array(
      "name" => "Sigmar One",
      "url"  => "https://fonts.googleapis.com/css2?family=Sigmar+One&display=swap"),
    "titanone" => array(
      "name" => "Titan One",
      "url"  => "https://fonts.googleapis.com/css2?family=Titan+One&display=swap")
  );

  // Otsakkeen taustat aakkosjärjestyksessä.
  //   name  = Taustan nimi, joka näkyy listassa.
  //   color = Otsaketekstin väri, joka on sovitettu taustakuvaan. Lähtökohtaisesti
  //           voi käyttää arvoa "#fff".
  //   image = URL-osoite taustakuvan sijaintiin, taustakuvat sijaitsevat 
  //           backgrounds-kansiossa.
  $bgimages = array(
    "dyynit" => array(
      "name"  => "Dyynit",
      "color" => "#d7ab7f",
      "image" => "backgrounds/dyynit.jpg"
    ),
    "jouluseimi" => array(
      "name" => "Jouluseimi",
      "color" => "#fff",
      "image" => "backgrounds/jouluseimi.jpg"
    ),
    "jaakiteet" => array(
      "name"  => "Jääkiteet",
      "color" => "#ced5df",
      "image" => "backgrounds/jaakiteet.jpg"
    ),
    "kirsikka" => array(
      "name"  => "Kirsikka",
      "color" => "#e5e5ff",
      "image" => "backgrounds/kirsikankukat.jpg"
    ),
    "kukka" => array(
      "name"  => "Kukka",
      "color" => "#e28ad6",
      "image" => "backgrounds/kukka.jpg"
    ),
    "kukkaketo" => array(
      "name"  => "Kukkaketo",
      "color" => "#fbe6f9",
      "image" => "backgrounds/kukkaketo.jpg"
    ),
    "lumi" => array(
      "name"  => "Lumi",
      "color" => "#f9f9f9",
      "image" => "backgrounds/lehtilumessa.jpg"
    ),
    "marjat" => array(
      "name"  => "Marjat",
      "color" => "#d4b5c5",
      "image" => "backgrounds/marjat.jpg"
    ),
    "metsa" => array(
      "name"  => "Metsä",
      "color" => "#9aacc2",
      "image" => "backgrounds/metsa.jpg"
    ),
    "mustikat" => array(
      "name" => "Mustikat",
      "color" => "#98a9bd",
      "image" => "backgrounds/mustikat.jpg"
    ),
    "niitty" => array(
      "name"  => "Niitty",
      "color" => "#fdc21e",
      "image" => "backgrounds/niitty.jpg"
    ),
    "puu1" => array(
      "name"  => "Puukuvio 1",
      "color" => "#d9d4d0",
      "image" => "backgrounds/puukuvio1.jpg"
    ),
    "puu2" => array(
      "name"  => "Puukuvio 2",
      "color" => "#eee2de",
      "image" => "backgrounds/puukuvio2.jpg"
    ),
    "puu3" => array(
      "name"  => "Puukuvio 3",
      "color" => "#e8d2b7",
      "image" => "backgrounds/puukuvio3.jpg"
    ),
    "puu4" => array(
      "name"  => "Puukuvio 4",
      "color" => "#d1d2d6",
      "image" => "backgrounds/puukuvio4.jpg"
    ),
    "syyslehdet" => array(
      "name"  => "Syyslehdet",
      "color" => "#f4f4dc",
      "image" => "backgrounds/syyslehdet.jpg"
    ),
    "syyslehdet2" => array(
      "name"  => "Syyslehdet2",
      "color" => "#c3c6c5",
      "image" => "backgrounds/syyslehdet2.jpg"
    ),
    "syysviljaa" => array(
      "name"  => "Syysviljaa",
      "color" => "#e1c19b",
      "image" => "backgrounds/syysviljaa.jpg"
    ),
    "vadelmat" => array(
      "name"  => "Vadelmat",
      "color" => "#faa7b9",
      "image" => "backgrounds/vadelmat.jpg"
    )
  );

  // Kuukauden nimet, tulostuu sivun yläreunaan.
  $months = array(
       1 => "tammikuu",
       2 => "helmikuu",
       3 => "maaliskuu",
       4 => "huhtikuu",
       5 => "toukokuu",
       6 => "kesäkuu",
       7 => "heinäkuu",
       8 => "elokuu",
       9 => "syyskuu",
      10 => "lokakuu",
      11 => "marraskuu",
      12 => "joulukuu"
  );

  // Viikonpäivien nimet, tulostuu kalenteririveille.
  $weekdays = array(
       1 => "maanantai",
       2 => "tiistai",
       3 => "keskiviikko",
       4 => "torstai",
       5 => "perjantai",
       6 => "lauantai",
       7 => "sunnuntai"
  );

  // Nimilistan esimerkkinimet.
  $defaultnames = "Pekka\nHanna-Leena\nSamuel\nJoel\nMirjam";

?>
