<?php
include 'db_connect.php';
$searchErr = '';
$storage_info='';
if(isset($_POST['save']))
{
	if(!empty($_POST['search']))
	{
		$search = $_POST['search'];
		$stmt = $con->prepare("select * from storage where make like '%$search%' or name like '%$search%' or part like '%$search% or order_number like '%$search%");
		$stmt->execute();
		$storage_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	else
	{
		$searchErr = "Пожалуйста введите запрос";
	}
   
}

?>