<?php include 'components/head.php'; ?>
<?php  
$conn = mysqli_connect('mysql', 'root', 'rootpassword', 'mydb');

$sql = "CREATE TABLE IF NOT EXISTS news ( id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255) NOT NULL, date DATE NOT NULL, text TEXT NOT NULL )";

if (mysqli_query($conn, $sql)) { echo "Таблица успешно создана!"; } else { echo "Ошибка: " . mysqli_error($conn); }


$title = 'Заголовок новости';
$date = date('Y-m-d');
$text = 'Текст новости';

$sql = "INSERT INTO news (title, date, text) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $title, $date, $text);

if (mysqli_stmt_execute($stmt)) {
    echo "Новость успешно добавлена!";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn); 
?>


<?php include 'components/footer.php'; ?>