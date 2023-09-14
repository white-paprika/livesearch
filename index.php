<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Live Search</title>
</head>
<body>
    <div class="container">
        <div class="text-center mt-5 mb-4">
            <h2>PHP MySQL Live Seach</h2>
        </div>
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
        
        <div id="searchresult"></div> <!-- Сюда будут выводиться данные со страницы livesearch.php (См Ajax-запрос ниже) -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#live_search').keyup(function(){ //#live_search - id инпута выше. 
                                                //keyup означает, что при каждом отпускании клафиши при активном инпуте будет срабатывать функция
                
                var input = $(this).val();     //  в переменную input записывается значение, записанное в инпуте
                
                if(input != ''){ // если input не пустой
                    $("#searchresult").css('display','block'); // возвращаетт отображение после условия else
                    $.ajax({

                        url:'livesearch.php', //переход на страницу livesearch.php
                        method:"POST",        
                        data:{input:input},   //передача на livesearch.php данных из input
                        
                        success:function(data){  //при удачном выполнении запроса в div c #searchresult будет выведен ответ со страницы livesearch.php (data)
                            $("#searchresult").html(data)
                        }
                    })
                }else{ // если же input не пустой, мы скрываем  #searchresult
                    $("#searchresult").css('display','none'); 
                }

            })
        });
    </script>

</body>
</html>