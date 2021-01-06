<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet"
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<form style="padding-top: 90px; text-align: center;" action="search.php" method="post">
  <input class="col-lg-6 col-md-6 col-sm-7 col-8" name="search" type="search" autofocus><button class="btn btn-default"  type="submit" name="button"><i class="fas fa-search"></i></button>
</form>

<div style="margin-top: 40px" class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 877.5px;">
	<?php
$con = new MySQLi('localhost','root','','sdlc');
				if (!$con)
					{
						echo "ket noi that bai";
					}

if(isset($_POST['button'])){    //trigger button click
  $search=$_POST['search'];
  $query=mysqli_query($link,"select * from product where name like '%{$search}%' || singer like '%{$search}%' ");
if (mysqli_num_rows($query) > 0) {
  while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="col-lg-3 col-sm-4 col-md-4 col-11 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px; margin:  40px 45px;">
            <div class="portfolio-wrap">
              <img style="width: 255px; height: 255px"  src="img/<?php echo $row['img'];?>" class="img-fluid" alt="">
              <div class="portfolio-info">
              	 <audio style="width: 275px; margin-left: -25px;" id='audio_1' controls preload autoplay='autoplay' loop>
					<source src='img/<?php echo $row['file'];?>' />
				</audio><br>
                <a class="song_a" title="Nghe bài hát <?php echo $row['name'];?>" href="./?mod=playhot&baihat=<?php echo $row['id'];?>"><strong><?php echo $row['name'];?></strong>
<a href="cart.php?id=<?php echo $row['id'] ?>" style="margin-left: 35px; font-size: 11px" class="btn btn-xs btn-default "><span style="color: red">Download</span> <i style="color: red !important" class="fas fa-arrow-alt-circle-down"></i></a>                </a><br>
                <a  href="#" ><?php echo $row['singer'];?></a>
                </div>
            </div>
          </div>
    <?php
 }
}else{
    echo "No song Found<br><br>";
  }
}
    ?>
</div> 

	
	<!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

  
  <!-- Footer Links -->
  <div style="background-color: #E9E9E9" class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Support</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
        <a href="#!">help</a>
        </p>
        <p>
        <a href="#!">diagram</a>
        </p>
        <p>
        <a href="#!">Contact advertising</a>
		</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">other services</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Mobile app</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Mobile web</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Desktop</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">3G service</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Viet Nam, Ha Noi,</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@example.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 84 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 84 234 567 89</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2020 Copyright
  
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</div>
</body>
</html>