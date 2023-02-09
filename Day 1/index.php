<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Урок по PHP</title>
</head>
<body>
<?php 

echo 'Текстик выше';


  include 'template/header.php'; //подключение другого php файла. include не будет выдавать fatal error при неправильном указании пути
  require 'template/header.php'; //подключение другого php файла. require выдаст fatal error при неправильном указании пути 
  include_once 'template/header.php'; //то же самое, но он не даст подключить ещё раз то же самое, тем самым экономя память и ускоряя загрузку 
  require_once 'template/header.php'; //то же самое что выше, только require

echo 'Текстик ниже';

?>
  
</body>
</html>
