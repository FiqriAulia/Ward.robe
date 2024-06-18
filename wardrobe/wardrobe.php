<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>otterplayingincoldwater</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      margin: 0;
      display: flex;
      justify-content: center;
      height: 100vh;
      overflow-y: scroll;
    }

    ::-webkit-scrollbar {
      width: 0px; /* Adjust as needed */
      height: 0px; /* Adjust as needed */
    }

    .egg {
      max-width: 80%;
      padding: 20px;
    }
  </style>
</head>
<body>
    <div class="egg">
    <?php
    $encrypted_file = "/asset/txt/DO NOT DELETE.txt";
    $encrypted_content = file_get_contents($encrypted_file);
    list($iv, $encrypted_text) = explode(':', $encrypted_content);
    $iv = base64_decode($iv);
    $password = "otterplayingincoldwater";
    $method = "aes-256-cbc";
    $key = hash('sha256', $password, true);

    $decrypted_text = openssl_decrypt($encrypted_text, $method, $key, 0, $iv);
    echo "<pre>";
    echo htmlspecialchars($decrypted_text);
    echo "</pre>";
    ?>
    </div>
</body>
</html>

