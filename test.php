<!-- форма отправления запроса с поисковика, при нажатие ктопки ПОИСК отправит запрос методом POST с помощщью php-->
<div class="box">
    <form class ="web-search" action=" " method="post" name="form">
        <input type="text" name="search" placeholder="Найти в интернете" autocomplete="off">
        <button type="submit" class="btn btn-outline-light">Поиск</button>
    <form>
</div>
<!-- получение запроса и вывод на экран -->
<?=$_POST['search'];?> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- форма отправления запроса с поисковика, при нажатие ктопки ПОИСК отправит запрос методом POST с помощщью ajax-->
<div class="box">
    <input type="text" class="search_2" placeholder="Найти в интернете" autocomplete="off">
    <button type="button" class="butt">Поиск</button>
</div>
<div class="box">
    <div id="count_1"></div>
</div>
<!-- прописываем нахождение на странице блоков формы отправки (для удобства прописано в этом файле)-->
<style>
    .box{
        width: auto;
        height: 20px;
        padding:5px;
        margin:20px;
    }
</style>    
<!-- при нажатие кнопки поиск класса butt сробатывает функция. Присваиваем переменной значение с блока input 
класса search_2. Отправляем в файл test_2.php с помоью ajax запрос и отображаем на странице-->
<script>
 $(document).ready(function(){
    $('button.butt').on('click', function(){
        var texts = $('input.search_2').val();
        $.ajax({
            url: "http://fin/test_2.php", //или /test_2.php"
            method: "POST",
            method: "POST",
            data:{ texts_1: texts },
            cache: false,
            date: 'json',
            success: function(data){
                $('#count_1').html(data); // отображение на странице
                $('input.search_2').val(''); // чистит строку поиска input класса search_2
            }
        });

    })
})
</script>
