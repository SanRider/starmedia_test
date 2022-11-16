<?php
$json_test1 = file_get_contents('jdb/data_cars.json');                  //Декодирование двух JSON файлов в многомерные массивы
$json_array_cars = json_decode($json_test1,true);
$json_test2 = file_get_contents('jdb/data_attempts.json');
$json_array_attempts = json_decode($json_test2,true);
$count = 0;       
//$key_test = array_keys($json_array_cars);  
//var_dump($json_array_cars);

                                             //Подключение сортировки 

foreach ($json_array_cars as $key => $x) {                //Подсчет итоговых результатов 
    $count = 0;
    foreach ($json_array_attempts as $j)
        {
            
            if ($j['id'] == $x['id'])
            {   
                $count++;
                $x_result = $x_result + $j['result']; 

                if ($count >= 4) {
                $json_array_cars[$key]['result'] = $x_result;
                $x_result = 0;
                }
            }

        };

};

$sort_list = array(
	'first_asc'   => 'first',
	'second_asc'  => 'second',
	'third_asc'   => 'third',
	'fourth_asc'   => 'fourth',
	'total_asc'  => 'total', 
);

include 'script/base-sort.php';   

/*include 'variable-sort.php';*/

foreach ($json_array_cars as $key => $x) {                              //Заполнение таблицы информацией                                    
    
    echo '<td>';
        echo  $x['id'] ;
    echo '</td>';
    echo '<td>';
        echo  $x['name'] ;
    echo '</td>';
    echo '<td>';
        echo  $x['city'] ;
    echo '</td>';
    echo '<td>';
        echo  $x['car'] ;
    echo '</td>';

    foreach ($json_array_attempts as $j)                                //Результаты каждого забега, каждого участника
    {
        if ($j['id'] == $x['id'])
        {   
            $count++;
            echo "<td class=id$count >";
                echo  $j['result'] ;
            echo '</td>'; 
            if ($count >=4) {
                $count = 0;
            }
        }
    };

                                                                
    echo "<td class=total>";
        echo $json_array_cars[$key]['result'] ;                        //Заполнение столбца Итоговый результат
    echo '</td>';

    echo '<td>';                                                        //Вывод места каждого участника
        echo $x['place'];
    echo '</td>';
    echo '</tr>';

}
//var_dump($json_array_cars);
$count = 0;


?>