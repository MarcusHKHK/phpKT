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
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Kursused logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Teenused</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="kalk.php">Kalkulaator</a></li>
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
        <h1 class="text-center py-5">Teenused</h1>
        <div class="container">
          <?php
            function tootepilt(){
              $dir_path = "reklaam/";
              if(!empty($dir_path)){
                $files = scandir($dir_path);
                $count = count($files);
                if($count > 2){
                    $index = rand(2, ($count-1));
                    $filename = $files[$index];
                }
              }
              echo '<img src="'.$dir_path."/".$filename.'" class="card-img-top allign-center" style="width:18rem;height:200px;" alt="'.$filename.'">';     
            }
            function kursused(){
              $rows = file("kursused.csv");
              $len = count($rows);
              $rand = [];
              while (count($rand) < 1) {
                  $r = rand(1, $len);
                  if (!in_array($r, $rand)) {
                      $rand[] = $r;
                  }
              }
              foreach ($rand as $r) {
                $csv = $rows[$r];
                $data = str_getcsv($csv);
                // echo $data[0];
                // echo $data[1];
                // echo $data[2];
                // echo $data[3];
                // // now do whatever you want with $data, which is one random row of your CSV
                // echo "first column from row $r: $data[1]";
              }          
              echo '
                <div class="col-md-4 ">
                  <div class="card card text-bg-secondary mb-3" style="width:18rem;height:18rem;">                
                    <div class="card-body">
                      '.tootepilt().'
                      <h5 class="card-title">'.$data[0].'</h5>
                      <p class="card-text">'.$data[3].'</p>
                      <p>Kestvus: '.$data[2].' tundi</p>
                      <p>Hind: '.$data[1].'€</p>
                      <a href="#" class="btn btn-primary">Lisa ostukorvi</a>
                    </div>
                  </div>
                </div>';
            }
          ?>
          <div class="row align-items-center py-5">
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>             
            </div>
          </div>
          <div class="row align-items-center py-5">
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>             
            </div>
          </div>
          <div class="row align-items-center py-5">
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>
            </div>
            <div class="col-md-4">
              <?php kursused(); ?>             
            </div>
          </div>
        </div>
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
