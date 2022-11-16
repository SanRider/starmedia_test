<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Startmedia - Тестовое задание</title>
    <link rel="stylesheet" href="style/style.css" media="screen">
</head>
<body>
<form>                                           <!--Отрисовка заголовков и основы таблицы-->
    <table id="table_sort">
        <thead>
        <tr>
            <th > ID </th>
            <th> Имя </th>
            <th> Город </th>
            <th> Автомобиль </th>
            <th class="click" id="4" onclick="sortTable(4)" data-type="number">
                1-ый заезд
            </th>
            <th class="click" id="5"  onclick="sortTable(5)"data-type="number">
                2-ой заезд
            </th>
            <th class="click" id="6"  onclick="sortTable(6)" data-type="number"> 
                3-ий заезд
            </th>
            <th class="click" id="7"  onclick="sortTable(7)" data-type="number">
                4-ый заезд
            </th>
            <th class="click sorted" id="8"  onclick="sortTable(8)" data-type="number">
                Итоговый результат
            </th>
            <th> 
                Место 
            </th>
        </tr>
        </thead>
            <?php
                include 'script/create-table.php';  //Подключение отрисовки таблицы
            ?>
    </table>                                                       <!--Конец таблицы-->
</form>
</body>
<script>
    
var n_temp = 8;
function sortTable(n) {
  
  document.getElementById(n).classList.add("sorted");

  if (n != n_temp) {
    document.getElementById(n_temp).classList.remove("sorted");
  }
  n_temp = n;
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table_sort");
  switching = true;

  while (switching) {
    switching = false;
    rows = table.rows; 
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];      

          if (Number(x.innerHTML.toLowerCase()) < Number(y.innerHTML.toLowerCase())) {
          shouldSwitch= true;
          break;
          
        }
      
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;   
      
    } 
  }
}

</script>
</html>