<?php session_start(); ?>
<div class="top">
	<div class="contain">
		<div class="top-w">
			<div class="top-to-main">
				<a href="index.php" class="logo">Главная страница</a>
			</div>
			<div class="top-right">
				<div class="top-feedback">
					<a href="feedback_page.php" class="feedback">Отзывы</a>
				</div>
				<div class="top-contacts">
					<a href="" class="contacts">Контакты</a>
				</div>
				<?php if ($_SESSION['user_id'] == NULL) {
				echo("<div class='top-log-in'>
					<a href='#' class='log'>Войти</a>
				</div>");
				}
				else {
					echo("<div class='top-log-in'>
					<a href='personal_cabinet.php' class='personal_cabinet_link'>Личный кабинет</a>
				</div>");
					echo("<div class='top-log-in'>
					<a href='#' class='logout'>Выход</a>
				</div>");
				} ?>
			</div>
		</div>
	</div>
</div>