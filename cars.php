<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'db_connect.php';
$searchErr = '';
$storage_info='';

$stmt = $con->prepare("select make_car from storage");
$stmt->execute();
$storage_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
	<h3><u>Поиск по базе данных клиентов, автомобилей и запчастей</u></h3>
	<br/>
	<a href="index.php" class="link-dark">Поиск</a>
	<a href="create.php" class="link-dark">Создать заявку</a>
	<a href="clients.php" class="link-dark">Клиенты</a>
	<a href="parts.php" class="link-dark">Запчасти</a>
	<a href="cars.php" class="link-dark">Машины</a>
	<br/><br/>
	<h3><u>Список автомобилей</u></h3><br/>
	<div class="table-responsive">          
	  <table class="table">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Марка автомобиля</th>
	      </tr>
	    </thead>
	    <tbody>
	    		<?php
		    	 if(!$storage_info)
		    	 {
		    		echo '<tr>Информации не найдено</tr>';
		    	 }
		    	 else{
		    	 	foreach($storage_info as $key=>$value)
		    	 	{
		    	 		?>
		    	 	<tr>
		    	 		<td><?php echo $key+1;?></td>
		    	 		<td><?php echo $value['make_car'];?></td>
		    	 	</tr>
		    	 		
		    	 		<?php
		    	 	}
		    	 	
		    	 }
		    	?>
	    	
	     </tbody>
	  </table>
	</div>
</div>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>