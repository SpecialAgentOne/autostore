<?php
if (isset($_POST['make_car']) && isset($_POST['name_usr']) && isset($_POST['part']) && isset($_POST['order_number'])){
    // Переменные с формы
    $make_car = $_POST['make_car'];
    $name_usr = $_POST['name_usr'];
    $part = $_POST['part'];
    $order_number = $_POST['order_number'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "a0008603_auto"; // Логин БД
    $db_password = "autopass2023"; // Пароль БД
    $db_base = 'a0008603_auto'; // Имя БД
    $db_table = "storage"; // Имя Таблицы БД
    
    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'make_car' => $make_car, 'name_usr' => $name_usr, 'part' => $part, 'order_number' => $order_number); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (make_car, name_usr, part, order_number) values (:make_car, :name_usr, :part, :order_number)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	echo "Успех. Информация занесена в базу данных";
    }
}
?>

<html>
<head>
<title>Магазин автозапчастей</title>
<link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.css" crossorigin="anonymous">
<style>
.container{
	width:70%;
	height:30%;
	padding:20px;
}
</style>
</head>

<body>
	<div class="container">
	<h3><u>Добавление клиента, автомобиля или запчасти</u></h3><br/>
	<a href="index.php" class="link-dark">Поиск</a>
	<a href="create.php" class="link-dark">Создать заявку</a>
	<a href="clients.php" class="link-dark">Клиенты</a>
	<a href="parts.php" class="link-dark">Запчасти</a>
	<a href="cars.php" class="link-dark">Машины</a>
	<br/><br/>

	<form action="" method="post">
	    <table>
	        <tr>
                <td>Марка автомобиля:</td>
                <td><input type="text" name="make_car"></td>
            </tr>
            <tr>
                <td>Клиент:</td>
                <td><input type="text" name="name_usr"></td>
            </tr>
            <tr>
                <td>Нименование автозапчасти:</td>
                <td><input type="text" name="part"></td>
            </tr>
            <tr>
                <td>Номер заказа:</td>
                <td><input type="text" name="order_number"></td>
            </tr>
            <tr>
                <button type="submit" class="btn btn-success btn-sm">Записать</button>
            </tr>
  </table>
    </form>


</div>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>