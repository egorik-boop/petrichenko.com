<?php
include '../includes/db.php';
$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");

echo "<style>
.article { 
    margin: 10px 0; 
    padding: 10px; 
    border: 1px solid #ddd; 
    font-family: Arial; 
    max-width: 600px;
}
.article h2 { 
    margin: 0 0 5px 0; 
    font-size: 18px; 
}
.article small { 
    color: #666; 
    font-size: 12px; 
}
.add-btn, .delete-btn {
    display: inline-block;
    margin: 10px 5px 10px 0;
    padding: 8px 15px;
    color: white;
    text-decoration: none;
    border-radius: 4px;
    font-family: Arial;
    border: none;
    cursor: pointer;
}
.add-btn {
    background: #007bff;
}
.add-btn:hover {
    background: #0069d9;
}
.delete-btn {
    background: #dc3545;
}
.delete-btn:hover {
    background: #c82333;
}
</style>";

echo "<div>
    <a href='add_article.php' class='add-btn'>Добавить статью</a>
    </form>
</div>";

while ($row = pg_fetch_assoc($result)) {
    echo "<div class='article'>
            <h2>{$row['title']}</h2>
            <p>{$row['content']}</p>
            <small>{$row['created_at']}</small>
          </div>";
}
?>
