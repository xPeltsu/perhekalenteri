<?php

  header('Content-type: text/css');

  require_once("globals.php");

  $header = $_GET['header'];
  $bgimage = $_GET['bgimage'];

  echo "/* header: $header */\n";
  echo "/* bgimage: $bgimage */\n";

?>

@import url('http://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap');
@import url('<?=$headerfonts[$header][url] ?>');

body {
  width: 297mm;
  font-family: 'Lato', sans-serif;
  margin: 0;
  padding: 0;
}

h1 {
  font-family: '<?php echo $headerfonts[$header][name]?>', sans-serif;
  font-size: 30mm;
  text-align: center;
  text-transform: capitalize;
  text-shadow: 2px 2px 0px #333;
  color: <?php echo $bgimages[$bgimage][color] ?>;
  height: 60mm;
  line-height: 60mm;
  background-color: #eee;
  background-image: url("<?php echo $bgimages[$bgimage][image];?>");
  background-size: 100%;
  margin: 0;
}

table {
  width: 100%;
  border-collapse: collapse;
}

tr {
  height: 11mm;
  border-top: 1px solid #999;
  border-bottom: 1px solid #999;
}

.name {
  text-align: center;
}

.holiday {
  background-color: #ddd;
  color: red;
}

.week {
  font-size: 75%;
  color: #999;
  vertical-align: top;
}

.day {
  text-align: right;
  padding-right: 1em;
  font-weight: 700;
}

.weekday {
  text-transform: capitalize;
  overflow: hidden;
}

.memo {
  border: 1px solid #999;
}

.holidayname {
  font-size: 70%;
  margin-left: 0.5em;
  text-transform: none;
}

.footer {
  text-align: right;
  font-size: 70%;
}
