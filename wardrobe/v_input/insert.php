<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wardrobe</title>
    <link rel="stylesheet" href="../styles.css">
    <script src="../jquery/jquery-3.7.1.min.js"></script>
    <script src="../jquery/script.js"></script>
</head>

<body>
<header class="header-container">
    <form action="../v_input.php" method="get" class="form-back">
        <input class="back" type="submit" value="Back">
    </form>
    <h3><?php echo $_POST['metode']; ?></h3>
</header>

    <div class="center">
        <div class="menukiri">
            <div class="box"><!-- Wizart -->
                <div class="wiz">
                    <div class="overlap-group">
                        <div class="rectangle"></div>
                        <main>
                            <img class="wake" id="anchor" src="../asset/wake.png" />
                            <div id="eyes">
                                <img class="eye" src="../asset/Mata.png" alt="mata" style="top: 240px;left: 35px;" />
                                <img class="eye" src="../asset/Mata.png" alt="mata" style="top: 240px;left: -52px;" />
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
        <div class="menukanan">
            <form action="process.php" method="post" class="container" enctype="multipart/form-data">
                <input type="hidden" name="metode" value="<?php echo $_POST['metode']; ?>">
                Nomor : <input type="text" class="nama" name="nomor" required>
                Nama : <input type="text" class="nama" name="nama" required>
                Deskripsi : <textarea name="deskripsi" class="deskripsi" cols="30" rows="10"
                    placeholder="Isi deskripsi ini dengan sesuatu yang unik dari <?php echo $_POST['metode']; ?> tesebut" required></textarea>

                <div style="display: flex; justify-content: space-between;">
                    <input type="file" class="file" name="file" required>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</body>

</html>