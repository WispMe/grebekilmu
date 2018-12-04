<?php
include("koneksi.php");
require_once("auth.php"); 

if(isset($_GET['id'])) {
    $sql = "DELETE FROM member WHERE id='".$_GET['id']."'";
    $query = mysqli_query($con, $sql);
    if( $query ) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: user_admin.php');
    } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
    }
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
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible" data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="beranda_admin.php" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="beranda_admin.php" style="color:#ffffff;padding:14px;">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:#ffffff;"><button class="btn btn-primary" type="button">Keluar</button></a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="container" style="padding:83px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Belakang</th>
                        <th>Nama Depan</th>
                        <th>Peminatan</th>
                        <th>Email</th>
                        <th>No Hp</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM member";
                    $query = mysqli_query($con, $sql);

                    while($member = mysqli_fetch_array($query)){
                        echo "<tr>";
                        echo "<td>".$member['ID']."</td>";
                        echo "<td>".$member['namabelakang']."</td>";
                        echo "<td>".$member['namadepan']."</td>";
                        echo "<td>".$member['peminatan']."</td>";
                        echo "<td>".$member['email']."</td>";
                        echo "<td>".$member['nohp']."</td>";
                        echo "<td>";
                        echo "<a href='edit_user.php?id=".$member['ID']."'>Edit</a> | ";
                        echo "<a href='user_admin.php?id=".$member['ID']."' onclick='return confirm('Are you sure?')'>Hapus</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>