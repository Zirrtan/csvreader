<?php
function loadDataFromFile($file)
{
  if (!file_exists($file))
      throw new Exception("Ошибка: файл $file не существует!");
  if (!filesize($file))
      throw new Exception("Файл $file пустой!");
  $f = fopen($file, "r");
  $content = fread($f, filesize ($file));
  fclose ($f);
  return $content;
}
$file1 = $_FILES["file"];
$file = $file1['tmp_name'];

$resstr = loadDataFromFile($file);
$manystr = explode(",", $resstr);
$path = implode(['upload/', $manystr[0] ]);
$content = $manystr[1];
file_put_contents($path,$content);
?>