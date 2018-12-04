<?php 

require_once("auth.php");
include("koneksi.php");

$id = $_SESSION["user"]["ID"];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM member WHERE id=$id";
$query = mysqli_query($con, $sql);
$member = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}




?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible"
        data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" style="color:#ffffff;padding:14px;"><?php echo $_SESSION["user"]["email"] ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="masuk.php" style="color:#ffffff;padding:14px;">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profil.php" style="color:#ffffff;padding:14px;">Profil</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="soal.php" style="color:#ffffff;padding:14px;">Soal</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cart.php" style="color:#ffffff;padding:14px;">Ajuan</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:#ffffff;"><button class="btn btn-primary" type="button">Keluar</button></a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="login-clean">
        <form action="proses-edit-user.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <p>edit user</p>
            <input type="hidden" name="id" value="<?php echo $member['ID'] ?>" />
            <div class="form-group"><input class="form-control" type="text" name="namabelakang" placeholder="Nama Belakang" style="height:41px;margin:11px;" value="<?php echo $member['namabelakang'] ?>"></div>
            <div class="form-group">
                <input class="form-control" type="text" name="namadepan" placeholder="Nama Depan" style="margin:13px;" value="<?php echo $member['namadepan'] ?>">
                <div class="form-group">
                    <p>Peminatan</p><select class="form-control" name="peminatan">
                        <?php $pm = $member['peminatan']; ?>
                        <option value="Saintek" <?php echo ($pm == 'Saintek') ? "checked": "" ?>>Saintek</option>
                        <option value="Soshum" <?php echo ($pm == 'Soshum') ? "checked": "" ?>>Soshum</option>
                    </select>
                </div>
                <input
                    class="form-control" type="text" name="email" placeholder="email" style="margin:14px;padding:-1px;height:40px;" value="<?php echo $member['email'] ?>">
                <input class="form-control" type="tel" name="nohp" placeholder="No HP" style="margin:14px;padding:-1px;height:40px;" value="<?php echo $member['nohp'] ?>">
            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(71,171,244);" name="submit">edit user</button></div><a href="masuk.php" class="forgot">home</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>