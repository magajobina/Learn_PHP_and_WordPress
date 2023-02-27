<?php 
  // print_r($_POST); // выводили массивы
  // echo '<br>';
  // print_r($_FILES);

  if (!empty($_FILES)) {
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name']); //тут была проверка не пуст ли массив, а тут мы перемещаем файл из временной
  }                                                                                     //директории в нужную нам + пишем ему новое имя (после uploads/)

  if (file_exists('uploads/green-line.png')) {echo 'Он тут';} else {echo 'Не тут';} //предельно понятно что тут происходит

  // rename('uploads/green-line.png','notgreen-line.png'); //эта функция умеет не только переименовывать но и перемещать файлы. Может даже переименовать каталог(папку)
?>

<form action="" method="POST" enctype="multipart/form-data">
  <p><input type="text" name="title"></p>
  <p><input type="file" name="file"></p>
  <p><button>Submit</button></p>
</form>