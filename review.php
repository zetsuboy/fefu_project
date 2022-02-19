<div class="review">
	<div class="author_review">
		<div class="author_review_wrap">
			<div class="users_pic"></div>
			<div class="review_data">
				<div class="review_data1">
					<div>Имя пользователя:</div>
					<div>php code</div>
				</div>
				<div class="review_data2">
					<div>Дата:</div>
					<div>php code</div>
				</div>
				<div class="review_data3">
					<div>Время:</div>
					<div>php code</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text_review_wrap">
		<div class="text_review">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.
		</div>
		<?php if ($_SESSION['user_status'] == 'Администратор'){
			echo("<div class='del_butt'>Удалить сообщение</div>");
		 } ?>
	</div>
</div>