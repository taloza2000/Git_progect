<?php 
session_start(); //запустить сессию
$_SESSION['role'];
require('./exampel.php'); // подключить пример страницы
include_once './bd.php'; // подключиться к базе данных

$record_per_page = 10; // обозначить сколько на сранице сколько будет отображаться карточек контрагента
//определить на какой странице находиться пользователь
$pages_counterpaty = '';
if(isset($_GET["pages_counterpaty"]))
{
 $pages_counterpaty = $_GET["pages_counterpaty"];
}
else
{
 $pages_counterpaty = 1;
}
$start_from = ($pages_counterpaty-1)*$record_per_page; 

$articl = $connection->query("SELECT * FROM counterparty LIMIT $start_from , $record_per_page"); //вывод данных с определённого номера данных
?>
<main>
<form action="./tit.php">
     <div class="back"> <!-- функция возвраения на главную странуцу -->
        <button type="submit" name="id_reg" class="btn btn-outline-info btn-lg btn-block"><span>Назад</span> <i class="fa fa-check"> </i></button>
    </div>
</form>

<form action="./add_counterparty.php">
    <div class="back"> <!-- функция перехода на добавление контрагента -->
        <button type="submit" name="id_reg" class="btn btn-outline-light btn-lg btn-block"><span>Добавить контрагента</span> <i class="fa fa-check"> </i></button>
    </div>
</form>
<!-- вывод карточек с контрагентами -->
    <div class="box1"> 
    <?php
        foreach($articl as $article){
        ?>
            <div class="boxi">

            <div class="textcols">
	            <div class="textcols-items">
                    <div class="text3" style="word-wrap: break-word"><?= "<font color=#6C8AD5>".$article['name_n']."</font>"?></div>
                    </div>
                <div class="textcols-item">
                    <div class="summ">Электронная почта: <?= "<font color=#6C8AD5>".$article['email']."</font>"?>  </div>
                    </div>
                <div class="textcols-item">
                    <div class="text3"> Номер контактного телефона: <br/> <?= "<font color=#6C8AD5>".$article['tel']."</font>" ?></div>
                    </div>  
                <div class="textcols-item">                
                    <form class="form-signin" action="./counterparty_more_details.php" method="post" name="form" class='forms'>
                        <input type="hidden" name="ids" value="<?= $number = $article['id'] ?>">
                        <button type="submit" name="upload" class="btn btn-outline-success"><span>Подробнее</span> <i class="fa fa-check"></i></button>
                    </form>
                </div>  

        </div><!--boxi-->

    </div><!--box1-->      
    <?php }?> 
    <div class="pagination  box3">
            <?php //пагинация
            $query = $connection->query("SELECT * FROM counterparty ORDER BY id");   
            $total_recrds = $query->num_rows;            
            $total_pages = ceil($total_recrds/$record_per_page);
            $start_loop = $pages_counterpaty;
            $difference = $total_pages - $pages_counterpaty;
             
            if($difference <= 5)
            {
                if(($total_pages - 5) > 0){
                  $start_loop = $total_pages - 5;  
                } else $start_loop = 1;
             
            }
            if($total_pages > 5)
            $end_loop = $start_loop + 5;
            else $end_loop = $total_pages;
            
            if($pages_counterpaty > 1)
            {
             echo "<a href='counterparty.php?pages_counterpaty=1'>Первая</a>";
             echo "<a href='counterparty.php?pages_counterpaty=".($pages_counterpaty - 1)."'><<</a>";
            }
            for($i=$start_loop; $i<=$end_loop; $i++)
            {     
             if($i == $pages_counterpaty){
                echo "<a class=active href='counterparty.php?pages_counterpaty=".$pages_counterpaty."'>".$pages_counterpaty."</a>";
             }
             else{
               echo "<a href='counterparty.php?pages_counterpaty=".$i."'>".$i."</a>";  
             }
             
            }
            if($pages_counterpaty < $end_loop)
            {
             echo "<a href='counterparty.php?pages_counterpaty=".($pages_counterpaty + 1)."'>>></a>";
             echo "<a href='counterparty.php?pages_counterpaty=".$total_pages."'>Последняя</a>";
            }   
            ?>
        </div>
</main>
</html>