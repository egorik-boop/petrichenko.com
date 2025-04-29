<?php
$conn = pg_connect("host=localhost dbname=petrichenko_site  user=postgres password=password");
if (!$conn) {
    die("Ошибка подключения: " . pg_last_error());
}
echo "Подключение к PostgreSQL успешно!";
pg_close($conn);
?>

