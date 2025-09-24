<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PHP KT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Calling jquery first -->
        
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Kursused logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Avaleht</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Kontakt</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Teenused</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pood</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Teenused</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Populaarsed kursused</a></li>
                                <li><a class="dropdown-item" href="#!">Uued kursused</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
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
          // echo '<img class="d-block img-fluid w-100" style="height: 550px;" src="'.$dir_path."/".$filename.'" alt="'.$filename.'">';
          echo $dir_path.'/'.$filename;
        }
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php randpildid(); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php randpildid(); ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php randpildid(); ?>" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Section-->
        <h1 class="text-center">Teenused</h1>
        <?php
          function kursused(){
	          $allikas = 'kursused.csv';
	          $minu_csv = fopen($filedir, 'r') or die ('Ei leia faili');
            $jrk = 1;
            while(!feof($minu_csv)){
              $rida = fgetcsv($minu_csv, filesize($allikas),';');
              $arv = count($rida);
              echo $jrk.'. ';
              $jrk++;
              for($i = 0; $i<$arv; $i++){
                echo $rida[$i].' ';
              }
              echo '<br>';
            }
            fclose($minu_csv);
          }
        ?>
        <section class="my-5 mx-5 text-center">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">#</h5>
                  <p class="card-text">#</p>
                  <a href="#" class="btn btn-primary">Lisa ostukorvi</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
          </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2025</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script language="JavaScript" type="text/javascript" src="scripts/jquery.js"></script>
        <script language="JavaScript" type="text/javascript" src="scripts/bootstrap.min.js"></script> 
    </body>
</html>
