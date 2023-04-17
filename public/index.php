<?php
    require 'stranichka.html';
//Проверить доступные драйвера
print_r(PDO::getAvailableDrivers());
echo "<br>"."Выбирите раздел";
?>