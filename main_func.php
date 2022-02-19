<?php
include 'backend/dbconnect.php';

session_start();
if ($_SESSION['user_id'] == NULL){
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
	<link rel="stylesheet" type="text/css" href="frontend/css/style3.css">
	<link rel="stylesheet" type="text/css" href="frontend/css/style4.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<script
       src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
       crossorigin="anonymous"></script>
	
</head>
<body>
		<header class="header"> 
			<?php include "header.php"?>
		</header>

		<?php include 'frontend/html/add_window.html'; ?>
		<div class='overlay'></div>

		<div class="wrapper_m">
			<div class="top_butt">
				<div class="top_butt_wrap">
					<div class="top_butt_left">
						<div class="butt_m" id="add_ev" style="width: 300px">Добавить событие</div>
						<div class="week_buutons">
							<div class="butt_m" id="butt_prev" style="width: 40px"><div id="prev_tri"></div></div>
							<div class="butt_m" id="week" style="width: 150px">Сегодня</div>
							<div class="butt_m" id="butt_next" style="width: 40px"><div id="next_tri"></div></div>
						</div>
					</div>
					<div class="top_butt_right">
						<?php //<div class="butt_m" id="filters" style="width: 150px">Фильтры</div> ?>
					</div>
				</div>
			</div>
			
			<?php include 'backend/print_events.php';
			$user_id = $_SESSION['user_id'];
			$week_counter = $_SESSION['week_counter'] * 7;
			$monday = date('Y-m-d', strtotime("monday this week + $week_counter days"));
			$tuesday = date('Y-m-d', strtotime("tuesday this week + $week_counter days"));
			$wednesday = date('Y-m-d', strtotime("wednesday this week + $week_counter days"));
			$thursday = date('Y-m-d', strtotime("thursday this week + $week_counter days"));
			$friday = date('Y-m-d', strtotime("friday this week + $week_counter days"));
			$saturday = date('Y-m-d', strtotime("saturday this week + $week_counter days"));
			$sunday = date('Y-m-d', strtotime("sunday this week + $week_counter days"));?>

			<div class="main_block_of_schdl">
				<div class="main_block_of_schdl_wrap"> 
					
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Понедельник<p><?php echo($monday);?></div>

						</div>
						<div class="class_cont_main">
							<div class="class_cont_main" id="ponedelnik">
								<?php 
								print_events($conn, $monday, $user_id);
								?>
							</div>
						</div>
					</div>
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Вторник<p><?php echo($tuesday);?></div>

						</div>
						<div class="class_cont_main" id="vtornik">
						<?php 
								print_events($conn, $tuesday, $user_id);
								?>
						</div>
					</div>
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Среда<p><?php echo($wednesday);?></div>

						</div>
						<div class="class_cont_main" id="sreda">
						<?php 
								print_events($conn, $wednesday, $user_id);
								?>
						</div>
					</div>
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Четверг<p><?php echo($thursday);?></div>

						</div>
						<div class="class_cont_main" id="chetverg">
						<?php 
								print_events($conn, $thursday, $user_id);
								?>
						</div>
					</div>
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Пятница<p><?php echo($friday);?></div>
							
						</div>
						<div class="class_cont_main" id="pyatnica">
						<?php 
								print_events($conn, $friday, $user_id);
								?>
						</div>
					</div>
					<div class="class_cont">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Суббота<p><?php echo($saturday);?></div>

						</div>
						<div class="class_cont_main" id="subbota">
						<?php 
								print_events($conn, $saturday, $user_id);
								?>
						</div>
					</div>
					<div class="class_cont" id="class_cont_last">
						<div class="class_cont_top">
							<div class="class_cont_top_date">Воскресенье<p><?php echo($sunday);?></div>

						</div>
						<div class="class_cont_main" id="voskresenie">
						<?php 
								print_events($conn, $sunday, $user_id);
								?>
						</div>
					</div>
				</div>
				<script src='frontend/js/event_scripts.js'></script>
			</div>
		</div>

		<?php include "footer.php"?>
	</div>
	<script src="frontend/js/javascript.js"></script>
</body>
</html>