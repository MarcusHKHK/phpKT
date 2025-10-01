<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PHP KT</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <!-- Koolituskeskus
    Fail: 'courses.csv' (kursuse nimi; hind; kestus; kirjeldus).
    Failid tuleb genereerida saidil https://mockaroo.com
    Leht peab olema kujundatud Bootstrapiga ja kohanduv (responsive)
    Navigeerimismenüü tuleb teha Bootstrap komponentidega. Menüüs vähemalt: Avaleht, Tooted/Teenused, Kalkulaator, Kontakt, Ostukorv
    Logo (võib olla tekstina või pildina)
    Bänner – Bootstrap carousel, mis võtab pildid automaatselt kaustast 'reklaam/'. Pildid valitakse suvaliselt, nt PHP 'glob()' abil
    Teenused: kuvatakse failist ('.csv' või '.txt'), vähemalt 12 teenust, Bootstrap kaardina, 3 veerus ('col-md-4'). Kuvada nimi, hind, pilt, nupp "Lisa ostukorvi". Lisatud eraldi kausta 'pildid/'
    Kalkulaator: arvutab kursuse koguhinna osalejate arvu põhjal. Lisavalik: online (–20%) või klassikoolitus (tavahind). Tulemus tuleb salvestada faili (nt 'orders.txt')
    Kontaktileht: sisaldab Google Mapsi ja kontaktivormi
    Leht peab olema üleval: 'liivakast.hkhk.edu.ee/~kasutaja/phpprojekt'
    Lisaks GitHubi repositoorium
    Esitada tuleb nii liivakasti link kui GitHubi link -->
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Kursused logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Avaleht</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Teenused</a></li>
                        <li class="nav-item dropdown">
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-light" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Korv
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <?php
        function randpildid(){
          $dir_path = "reklaam/";
          if(!empty($dir_path)){
            $files = scandir($dir_path);
            $count = count($files);
            if($count > 2){
                $index = rand(2, ($count-1));
                $filename = $files[$index];
            }
          }
          echo '<img src="'.$dir_path."/".$filename.'" class="d-block w-100" height="800" alt="'.$filename.'">';
        }
        ?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">              
              <?php randpildid(); ?>
            </div>
            <div class="carousel-item">
              <?php randpildid(); ?>
            </div>
            <div class="carousel-item">
              <?php randpildid(); ?>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Section-->
        <div class="container p-5">
            <h1 class="py-5">Summa arvutamine</h1>
            <?php
            function kursuskalk(){    
              echo '
                <form action="#" method="get">
                    <div class="mb-3">
                      <select name="kursused" class="form-select" required>';
                        $rows = file("kursused.csv");
                        $len = count($rows);
                        $loend = 1;
                        foreach ($rows as $row) {
                          $csv = $rows[$loend];
                          $data = str_getcsv($csv);
                          echo '<option>'.$data[0].'</option>';
                          $loend++;
                          if ($loend>=$len) {
                            break;
                          }
                        }
                        echo '
                      </select>
                    </div>                    
                    <div class="mb-3">
                        <label class="">Mitu inimest</label>
                        <input type="number" name="kogus" class="form-control" required>                        
                    </div>
                    <button type="submit" class="btn btn-primary">Kontrolli hinda</button>
                </form>
                <h1 class="py-2">Hind</h1>';

                if(isset($_GET["kogus"], $_GET["kursused"])){
                    $kogus = $_GET["kogus"];
                    $kursus = $_GET["kursused"];
                    $rows = file("kursused.csv");
                    $len = count($rows);
                    $loend = 1;
                    foreach ($rows as $row) {
                      $csv = $rows[$loend];
                      $data = str_getcsv($csv);
                      $loend++;
                      if ($data[0] == $kursus) {
                        $hind = $data[1];
                        echo '<p class="h5">Kursuse hind ühele inimesele: '.$hind.'</p>'."<br>";
                        echo '<p class="h5">Inimeste kogus: '.$kogus.'</p>'."<br>";
                        echo '<p class="h5">Hind kokku: '.$hind*$kogus.'</p>'."<br>";
                        break;
                      }
                    }
                }
            }
            kursuskalk();
          ?>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2025</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script language="JavaScript" type="text/javascript" src="scripts/jquery.js"></script>
        <script language="JavaScript" type="text/javascript" src="scripts/bootstrap.min.js"></script> 
    </body>
</html>
