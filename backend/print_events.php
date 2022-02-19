<?php
function print_events(PDO $conn, $event_date, $user_id){
    $sql = "SELECT * FROM `events` WHERE user_id = :user_id AND event_date = :event_date ORDER BY event_start";
    $result = $conn->prepare($sql);
    $result->execute(array(':user_id' => $user_id, ':event_date' => $event_date));

    while ($row = $result->fetch()){
        $date_start = date_create($row['event_start']);
        $event_start = date_format($date_start, 'H:i');
        $date_end = date_create($row['event_end']);
        $event_end = date_format($date_end, 'H:i');
        echo("<div class='event_box' id='event_box-".$row['event_id']."'>
                <b class='title'>".$row['event_name']."</b>
                <a class='description'>".$row['event_description']."</a>
                <div class='event_bottom_wrap'>
                        <b class='place'>".$row['event_place']."</b>
                        <b class='time'>".$event_start."-".$event_end."</b>
                </div>
              </div>
    <div class='event_box_window' id='event_box_window-".$row['event_id']."'>
        <b>Подробнее</b>
        <span class='event_box_window_close'>ₓ</span>
        <div class='line'></div>
        <div class='add_window_line'>
                <b>Название: </b>
                <b class='title'>".$row['event_name']."</b>
        </div>
        <div class='add_window_line'>
                <b>Время: </b>
                <b>".$event_start."-".$event_end."</b>
        </div>
        <div class='add_window_line'>
                <b>Место проведения: </b>
                <b>".$row['event_place']."</b>
        </div>
        <div class='add_window_line'>
                <b>Описание: </b>
                <div class='description'><a>".$row['event_description']."</a></div>
        </div>
        <div class='add_window_line' style='justify-content: flex-end'>
                <input type='button' class='event_delete_button' id='event_delete_button-".$row['event_id']."' required name='event_name' size='34' maxlength='40' value='Удалить'></input>
        </div>
    </div>");
      }
}
?>