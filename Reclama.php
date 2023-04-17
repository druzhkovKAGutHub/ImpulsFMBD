<?php
require 'stranichka.html';
require 'ConnectionImpilFM.php';

try {
    $ImFM = ConnectionImpilFM::Get()->connect();
    //echo 'A connection to the PostgreSQL database sever has been established successfully.1';
} catch (\PDOException $e) {
    echo $e->getMessage();
}

$Table = '<Table border="1">'.'<thead>
<td>ИД записи</th>
<td>Текст сообщения</th>
<td>ИД чата</th>
<td>ИД пользователя</th>
<td>Дата время сообщения</th>
<td>ИД сообщения телеграм</th>
<td>Раздел</th>
</thead>
<tbody>';

// Выполнение SQL-запроса
$query = "SELECT * FROM users_mess where whith_section_mess='reclama' order by users_id, datatime_mess";
$result = $ImFM->query($query);
while ($row = $result->fetch())
{
    $Table .= "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td>
                <td>{$row[4]}</td><td>{$row[5]}</td><td>{$row[6]}</td>
</tr>";
    /*    echo '<pre>';
        print_r($row);
    */
}
echo $Table . '</tbody></table>';

