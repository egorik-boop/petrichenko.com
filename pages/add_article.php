<?php
include '../includes/db.php';
// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);
   
    $result = pg_query_params(
        $conn,
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );
   
    if ($result) {
        header("Location: article.php");
        exit;
    } else {
        echo "Ошибка: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить статью</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .form-container { max-width: 600px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea { height: 150px; }
        .submit-btn {
            padding: 8px 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover { background: #218838; }
        .back-btn {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Добавить статью</h1>
        <form method="POST">
            <div class="form-group">
                <label for="title">Заголовок:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Содержание:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Сохранить</button>
            <a href="article.php" class="back-btn">← Назад к статьям</a>
        </form>
    </div>
</body>
</html>
