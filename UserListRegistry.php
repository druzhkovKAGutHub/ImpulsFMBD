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
<td>ИД пользователя</th>
<td>Бот</th>
<td>Имя</th>
<td>Фамилия</th>
<td>Ник</th>
<td>Язык</th>
<td>Тариф премиум</th>
<td>Добавлено меню</th>
<td>входит в группу</th>
</thead>
<tbody>';

// Выполнение SQL-запроса
$query = "SELECT * FROM users_info";
$result = $ImFM->query($query);
while ($row = $result->fetch())
{
    $Table .= "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td><td>{$row[3]}</td>
<td>{$row[4]}</td><td>{$row[5]}</td><td>{$row[6]}</td><td>{$row[7]}</td><td>{$row[8]}</td><td>{$row[9]}</td>
</tr>";
    /*    echo '<pre>';
        print_r($row);
    */
}
echo $Table . '</tbody></table>'

?>