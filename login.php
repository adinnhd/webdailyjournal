<?php
session_start();

include "koneksi.php";

if(isset($_SESSION['username'])){
    header("location:admin.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['user'];

    $password = md5($_POST['pass']);

    $stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");

    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();

    $hasil = $stmt->get_result();

    $row = $hasil->fetch_array(MYSQLI_ASSOC);

    if(!empty($row)){
        $_SESSION['username'] = $row['username'];

        header("location:admin.php");
    } else{
        header("location:login.php");
    }

    $stmt->close();
    $conn->close();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
            margin: 0;
             background-image: url("assets/greekbg.jpeg"); 
        }

        

        .center-container {
            max-width: 900px; 
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center bg-light">


    <div class="container center-container bg-white shadow rounded">
        <div class="row">
            <!-- Kolom kiri -->
            <div class="col-md-6 text-center p-5 bg-dark text-light d-flex justify-content-center align-items-center ">
                <h1>Welcome to Daily Journal!</h1>
            </div>
            <!-- Kolom kanan -->
            <div class="col-md-6 p-5 bg-light">
                <!-- awal form -->
                <form class="m-auto" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="user" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <!-- akhir form -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
}
?>
