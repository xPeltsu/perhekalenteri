<?php

  require_once("globals.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Perhekalenteri</title>
  </head>
  <body>
    <header>
      <h1>Perhekalenteri</h1>
    </header>
    <section>

      <form action="kalenteri.php" method="GET" target="_blank">

        Vuosi: <input type="number" name="year" value="<?php echo date("Y"); ?>"><br>

        Kuukausi:
        <select name="month">
        <?php
          foreach($months as $key => $value) {
            echo "<option value='$key'>$value</option>\n";
          }
        ?>
        </select><br>

        Otsikkofontti:
        <select name="header">
        <?php
          foreach($headerfonts as $key => $value) {
            echo "<option value='$key'>$value[name]</option>\n";
          }
        ?>
        </select><br>

        Kuva:
        <select name="bgimage">
        <?php
          foreach ($bgimages as $key => $value) {
            echo "<option value='$key'>$value[name]</option>\n";
          }
        ?>
        </select><br>

        Perheenjäsenet:
        <textarea name="names" rows="5"><?= $defaultnames ?></textarea><br>

        <input type="submit" value="Avaa kalenterisivu">

      </form>
    </section>
    <footer>
      <hr>
      <div>perhekalenteri by epelande</div>
    </footer>
  </body>
</html>
