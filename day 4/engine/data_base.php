<!-- Тут происходит всякая срань с базой данных, а так же тут внизу форма. Это файл справочник для будущего меня по БД и Функциям для работы с БД -->
<?php
require_once 'engine/db.php';
require_once 'engine/add.php';
//Тут мы будем подключатсья к созданной в 10ом уроке базе данных

// $db = @mysqli_connect('localhost', 'root', '', 'company') or die('Ошибка подключения к Базе Данных'); //задаем всякое разное для подключения. Символ @ нужен чтоб при ошибке не палить данные
//                                                                                                     А die() нужен чтоб при ошибке скрипт останавливался и вылезал текст с ошибкой

mysqli_set_charset($db, 'utf8') or die('Неправильная кодировка');  //сейчас написан правильный вариант установления кодировки

// $query = mysqli_query($db, "INSERT INTO `team` (`name`, `email`, `date`, `text`) VALUES ('Билли', 'billy@gmail.com', '2020-1-1', 'Очень супер хороший мальчик')"); // прост запрос. Ниже его описание
//выше происходит добавление некоторых данных в базу данных под именем company ($db которая) в таблицу с именем `team`. Данные добавляются новые, и добавляются 
//в строки указанные в скобках (name, email  и т.п.). А то что именно добавляется идёт после VALUES (Билли, billy@mail.com и т.п.). Всё это в БД теперь лежит


$somename = mysqli_real_escape_string($db, "Andy's"); // вот так можно передавать кавычки в базу данных
$insert = "INSERT INTO `team` (`name`, `email`, `date`, `text`) VALUES ('$somename', 'billy@gmail.com', '2023-1-1', 'Очень мальчик')"; //теперь мы поместили запросы в переменные чтоб юзать ниже
$update = "UPDATE `team` SET `text` = 'Boy next door' WHERE `id` = 7";
$delete = "DELETE FROM team WHERE id = 4"; // можно писать и без кавычек боковых
// $select = "SELECT * FROM team";
$select = "SELECT `name`, `email`, `date` FROM team LIMIT 1,100"; //тут можно выбрать не всё с помощью *, а нужные поля указав на них. LIMIT 1,100 делает показ начиная с первого элемента, а количество показываемых элементов это 100 штук

$query = mysqli_query($db, $select);

// var_dump(mysqli_fetch_all($query)); // выводит данные из нашей БД из таблицы team в виде массива.
var_dump(mysqli_fetch_all($query, MYSQLI_ASSOC)); // выводит данные из нашей БД из таблицы team в виде АССОЦИАТИВНОГО массива.




/*
if($query) var_dump($query); //если чо, то условие внутри if вообще работает по той причине что эти функции запроса, 
//                                          такие как mysqli_query и mysqli_connect просто возвращают true если срабатывает запрос
else echo "Ошибка добавления в базу" . '<br>' . mysqli_error($db); // эта новая функция выводит текст указывающий на ошибку если есть ошибка в подключении в БД
*/

?>
<form action="engine/add.php" method="post"> <!-- эта форма будет добавлять данные в БД. Обработка будет происходить в твоём очке (в файле add.php) -->
  <input type="text" name="name" placeholder="name"> <br> <br>
  <input type="text" name="email" placeholder="email"><br> <br>
  <input type="text" name="date" placeholder="date"> <br> <br>
  <button type="submit">Submit</button>
</form>