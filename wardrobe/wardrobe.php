<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wardrobe</title>
  <link rel="stylesheet" href="styles.css">
  <script src="jquery/jquery-3.7.1.min.js"></script>
  <script src="jquery/script.js"></script>
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
    $wardrobeContent = file_get_contents('wardrobe.txt');
    $lines = explode("\n", $wardrobeContent);
    ?>
    <pre>
    <?php
    foreach ($lines as $line) {
        echo htmlspecialchars($line) . "\n";
    }
    ?>
    </pre>
    </div>
    
</body>
</html>
