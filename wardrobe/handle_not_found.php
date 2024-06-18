<?php
// Set 404 HTTP response status
http_response_code(404);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan</title>
    <style>
        body {
            font-family: "Plus Jakarta Sans-Bold", Helvetica;
            background-color: #F5CB5C;
            user-select: none;
        }

        .center {
            position: fixed;
            display: flex;
            align-items: center;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            font-size: 51px;
            user-select: none;
        }

        /* Style untuk paragraf */
        p {
            text-align: right; /* Membuat teks paragraf rata kiri */
            margin-top: 10px; /* Jarak atas dari paragraf */
        }
    </style>
</head>

<body>
    <div class="center">
        <h1>Halaman Tidak Ditemukan</h1>
        <div>
            <p>Maaf, halaman yang Anda cari tidak ditemukan.</p>
        </div>
    </div>
</body>

</html>
