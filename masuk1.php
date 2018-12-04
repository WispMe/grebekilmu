<?php 

require_once("auth.php");
require 'koneksi.php';

$namabelakang = $_SESSION["user"]["namabelakang"];
$namadepan = $_SESSION["user"]["namadepan"];
$nama = $namabelakang . ' ' . $namadepan;


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
    <div></div>
    <div></div>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/abc10.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/abc11.jpg&quot;);"></div>
                <div class="swiper-slide" style="background-image:url(&quot;assets/img/abc12.jpg&quot;);"></div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div style="padding:23px;background-color:#f8f8f8;">
        <div class="container">
            <?php 
                require 'koneksi.php';
                $sql = 'SELECT * FROM buku';
                $result = mysqli_query($con, $sql);
            ?>
            <h1>Daftar Buku</h1>
            <div class="table-responsive">
                <table class="table" id="t01">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama_buku</th>
                            <th>Tahun_terbit</th>
                            <th>Penerbit</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($product = mysqli_fetch_object($result)) { ?> 
                        <tr>
                            <td> <?php echo $product->id; ?> </td>
                            <td> <?php echo $product->nama_buku; ?> </td>
                            <td> <?php echo $product->tahun_terbit; ?> </td>
                            <td> <?php echo $product->penerbit; ?> </td>
                            <td> <?php echo $product->jenis; ?> </td>
                            <td><a name='pinjam' href="masuk1.php?id= <?php echo $product->id; ?> &action=add">Pinjam</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
        // Start the session
        require 'koneksi.php';
        require 'item.php';

        if(isset($_GET['id']) && !isset($_POST['update']))  { 
            $sql = "SELECT * FROM buku WHERE id=".$_GET['id'];
            $result = mysqli_query($con, $sql);
            $product = mysqli_fetch_object($result); 
            $item = new Item();
            $item->id = $product->id;
            $item->nama_buku = $product->nama_buku;
            $item->penerbit = $product->penerbit;
            $item->tahun_terbit = $product->tahun_terbit;
            $item->jenis = $product->jenis;
            $iteminstock = $product->quantity;
            $item->quantity = 1;
            // Check product is existing in cart
            $index = -1;
            $cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
            for($i=0; $i<count($cart);$i++)
                if ($cart[$i]->id == $_GET['id']){
                    $index = $i;
                    break;
                }
                if($index == -1) 
                    $_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
                else {
                    
                    if (($cart[$index]->quantity) < $iteminstock)
                         $cart[$index]->quantity ++;
                         $_SESSION['cart'] = $cart;
                }
        }
        // Delete product in cart
        if(isset($_GET['index']) && !isset($_POST['update'])) {
            $cart = unserialize(serialize($_SESSION['cart']));
            unset($cart[$_GET['index']]);
            $cart = array_values($cart);
            $_SESSION['cart'] = $cart;
        }
        // Update quantity in cart
        if(isset($_POST['update'])) {
          $arrQuantity = $_POST['quantity'];
          $cart = unserialize(serialize($_SESSION['cart']));
          for($i=0; $i<count($cart);$i++) {
             $cart[$i]->quantity = $arrQuantity[$i];
          }
          $_SESSION['cart'] = $cart;
        }
        ?>
        
        <div class="container">
            <h1>Keranjang</h1>
            <div class="table-responsive">
                <form  action='' method="POST">
                <table class="table" id ="t01">
                    <thead>
                        <tr>
                            <th>Option</th>
                            <th>Id</th>
                            <th>Nama Buku</th>
                            <th>Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        //  if (isset($_POST['pinjam'])) {
                        # code...
                        $cart = unserialize(serialize($_SESSION['cart']));
                        $s = 0;
                        $index = 0;
                        for($i=0; $i<count($cart); $i++){
                     ?> 
                        <tr>
                            <td><a href="masuk1.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Delete</a> </td>
                            <td> <?php echo $cart[$i]->id; ?> </td>
                            <td> <?php echo $cart[$i]->nama_buku; ?> </td>
                            <td> <?php echo $cart[$i]->penerbit; ?> </td>
                        </tr>
                    <?php 
                            $index++;
                        } 
                    ?>
                    </tbody>
                </table>
                <input class="form-control" type="submit" name="pesan" style="background-color:rgb(147,147,147);" value="Pesan"></div>
            </div>
        </div>
    </form>
    <?php 
    if(isset($_GET["id"]) || isset($_GET["index"])){
     header('Location: masuk1.php');
    } 

    ?>

<?php  

    if (isset($_POST['pesan'])) {
        # code...
        $cart = unserialize(serialize($_SESSION['cart']));
        for($i=0; $i<count($cart);$i++) {
        $sql = "INSERT INTO pesanan (order_nama, id_buku, tanggal, status) VALUES ('$nama', '".$cart[$i]->id."', '".date('Y-m-d')."', '0')";
        $query = mysqli_query($con, $sql);
        if( $query ) {
            // kalau berhasil alihkan ke halaman list-siswa.php
            header('Location: sukses.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }

        unset($_SESSION['cart']);
        }
    }

?>
    </div>
    <div class="social-icons"><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-youtube"></i></a></div>
    <nav class="navbar navbar-light navbar-expand-md fixed-top visible"
        data-aos="flip-up" data-aos-delay="900" style="background-color:#72aeda;color:rgb(205,207,208);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="color:#ffffff;">Grebek<strong>Ilmu</strong></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" style="color:#ffffff;padding:14px;"><?php echo $_SESSION["user"]["email"] ?></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="masuk1.html" style="color:#ffffff;padding:14px;">Beranda</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profil.html" style="color:#ffffff;padding:14px;">Profil</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:#ffffff;padding:14px;">Ajuan</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:#ffffff;"><button class="btn btn-primary" type="button">Keluar</button></a></li>
                </ul>
        </div>
        </div>
    </nav>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>