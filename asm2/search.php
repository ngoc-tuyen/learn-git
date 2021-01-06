<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>



	<?php
$con;
				$con = new MySQLi('localhost','root','','sdlc');
				if (!$con)
					{
						echo "ket noi that bai";
					}

if(isset($_POST['button'])){    //trigger button click
  $search=$_POST['search'];
  $query=mysqli_query($link,"select * from song where SongName like '%{$search}%' || singer like '%{$search}%' ");
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


</body>
</html>