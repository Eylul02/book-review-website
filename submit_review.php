<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "eylul"; // Veritabanı kullanıcı adınızı buraya yazın
$password = "Sherlock2002."; // Veritabanı şifrenizi buraya yazın
$dbname = "eylul"; // Veritabanı adınızı buraya yazın

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form verilerini al
$name = $_POST['name'];
$book = $_POST['book'];
$review = $_POST['review'];

// Veritabanına ekle
$sql = "INSERT INTO reviews (name, book, review) VALUES ('$name', '$book', '$review')";

if ($conn->query($sql) === TRUE) {
    echo "Review submitted successfully!";
    echo "<a href='book_reviews.php'>Back to Book Reviews</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
