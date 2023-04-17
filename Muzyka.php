<?php
require 'stranichka.html';

try {
    $ImFM = new PDO('pgsql:host=10.222.222.184;port=5433;dbname=ImpulsFM','postgres','sa');
}
catch (PDOException $e) {
    print('Error - '.$e->getMessage());
    die();
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
$query = "SELECT * FROM users_mess where whith_section_mess='muzyka' order by users_id, datatime_mess";
$result = $ImFM->query($query);
while ($row = $result->fetch())
{
    $Table .= "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td>
                <td>{$row[4]}</td><td>{$row[5]}</td><td>{$row[6]}</td>
</tr>";

}
echo $Table . '</tbody></table>';
