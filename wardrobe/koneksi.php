<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', ''); // Ganti dengan password MySQL Anda jika ada
define('DATABASE', 'wardrobe');

try {
    $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
    if ($mysqli->connect_error) {
        throw new Exception("Database 'wardrobe' tidak ditemukan. Silakan instal database 'wardrobe'. Jika belum, ikuti instruksi instalasi database.");
    }
} catch (Exception $e) {
    echo "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Wardrobe</title>
            <link rel=\"stylesheet\" href=\"styles.css\">
            <script src=\"jquery/jquery-3.7.1.min.js\"></script>
            <script src=\"jquery/script.js\"></script>
        </head>
        <body class=\"center\">
            <div class=\"center\">
                <h2 class=\"install\">Install Database Dulu</h2>
            </div>
        </body>
        </html>
    ";
    exit(); // Keluar dari skrip untuk menghentikan eksekusi lebih lanjut
}
?>
