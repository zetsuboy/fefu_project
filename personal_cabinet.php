<?php session_start(); 
$_SESSION['week_counter'] = 0;
if ($_SESSION['user_id'] == NULL) {
	header("Location:/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="frontend/css/style2.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<script
       src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
       crossorigin="anonymous">	
    </script>
	
</head>
<body>
	<div class="wrapper_lk">
		<?php include "header.php"?>

		<div class="main_block">
			<div class="foot_wrap">
				<div class="lk_left">
					<?php
					include 'backend/dbconnect.php';
					$user_id = $_SESSION['user_id'];
					$sql = "SELECT * FROM `users` WHERE id = :user_id";
					$result = $conn->prepare($sql);
					$result->execute(array(':user_id' => $user_id));
					$row = $result->fetch();
					?>
					<div class="avatar">
						
					</div>
					<div class="user_data">
						<div class="udata_wrap">
							<span class="ustate">Статус: <?php echo($row['status']); ?></span>
							<span class="ufname">Имя: <?php echo($row['name']); ?></span>
							<span class="usname">Фамилия: <?php echo($row['surname']); ?></span>
							<span class="uemail">email: <?php echo($row['login']); ?></span>
						</div>
					</div>
					<div class="helper_lk"></div>
				</div>
				<div class="lk_right">
					<div class="change_pass">
						<span class="change_pass_topic">Смена пароля</span>
						<form method="" class="form_pass">
							<input type="text" name="old_pass" placeholder="введите старый пароль" ></br>
							<input type="text" name="new_pass" placeholder="введите новый пароль" ></br>
							<div type="submit" class="butt_accept"> Подтвердить </div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php include "footer.php"?>
		<script src="frontend/js/javascript.js"></script>
	</div>
</body>
</html>