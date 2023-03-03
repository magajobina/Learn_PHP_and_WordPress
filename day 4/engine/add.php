<!-- Этот файл обрабатывает инфу из формы которая находится в файле data_base -->
<?php
if (!empty($_POST)) {
  require_once 'db.php';

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $date = mysqli_real_escape_string($db, $_POST['date']);

  $insert = "INSERT INTO `team` (`name`, `email`, `date`) VALUES ('$name', '$email', '$date')"; //теперь мы поместили запросы в переменные чтоб юзать ниже

  $query = mysqli_query($db, $insert);

  if($query) header('Location: /');
}

