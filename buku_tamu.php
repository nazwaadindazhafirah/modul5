<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 40px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            margin: auto;
            width: 400px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 6px;
            width: 100%;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            background-color: #e0ffe0;
            padding: 15px;
            margin-top: 20px;
            border-left: 5px solid #4CAF50;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<h1>Buku Tamu Digital STITEK Bontang</h1>

<?php
$nama = $email = $pesan = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["nama"]))) {
        $errors[] = "Nama Lengkap tidak boleh kosong.";
    } else {
        $nama = htmlspecialchars($_POST["nama"]);
    }

    if (empty($_POST["email"])) {
        $errors[] = "Alamat Email tidak boleh kosong.";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["pesan"])) {
        $errors[] = "Pesan/Komentar tidak boleh kosong.";
    } else {
        $pesan = htmlspecialchars($_POST["pesan"]);
    }

    if (empty($errors)) {
        echo "<div class='success'>";
        echo "<h3>Pesan Berhasil Dikirim!</h3>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Pesan:</strong><br>$pesan</p>";
        echo "</div>";
    }
}
?>

<form method="post" action="">
    <label for="nama">Nama Lengkap:</label>
    <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">

    <label for="email">Alamat Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>">

    <label for="pesan">Pesan/Komentar:</label>
    <textarea id="pesan" name="pesan" rows="5"><?php echo $pesan; ?></textarea>

    <input type="submit" value="Kirim Pesan">

    <?php
    if (!empty($errors)) {
        echo "<div class='error'><ul>";
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo "</ul></div>";
    }
    ?>
</form>

</body>
</html>
