<?php
	//include ("db.php");
	session_start();
	$product = array("Product A", "Product B", "Product C");
	$price = array(1500, 1000, 500);
	// Nếu chưa có giỏ hàng nào
	if (!isset($_SESSION["cart"]))
	{
		$_SESSION["total"] = 0;
		for ($i = 0; $i < count($product) ; $i++) {
			$_SESSION["quantity"][$i] = 0;
			$_SESSION["amount"][$i] = 0;
		}
	}
	$_SESSION["total"] = 0;

	//Nếu ấn button thêm
	if (isset($_REQUEST["add"]))
	{
		$i = $_REQUEST["add"];
		$quantity = $_SESSION["quantity"][$i] + 1;
		$_SESSION["cart"][$i] = $i;
		$_SESSION["amount"][$i] = $price[$i] * $quantity;
		$_SESSION["quantity"][$i] = $quantity;
	}


	//Nếu ấn button bớt
	if (isset($_REQUEST["remove"]))
	{
		$i = $_REQUEST["remove"];
		$quantity = $_SESSION["quantity"][$i] - 1;
		$_SESSION["quantity"][$i] = $quantity;
		if ($quantity == 0)
		{
			unset($_SESSION["cart"][$i]);
		}
		else
		{
			$_SESSION["amount"][$i] = $price[$i] * $quantity;
		}
	}

	//Nếu ấn button reset
	if (isset($_REQUEST["reset"]))
	{
		if ($_REQUEST["reset"] == "true")
		{
			unset($_SESSION["cart"]);
			unset($_SESSION["quantity"]);
			unset($_SESSION["amount"]);
			unset($_SESSION["total"]);
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Demo Cart</title>
<link rel="stylesheet" href="">
</head>

<body style="width: 500px;
			 height: 100%;
			 margin: 0 auto;
			 ">
	
<center style="background-color: #F2B6B6;
			   border: 1px solid #80808000;
			   box-shadow: 0px 0px 14px 0px grey;
			   
			   ">
		<h3>List of products</h3>
		<table border="1">
			<thead>
				<tr>
					<th>
						Product No.
					</th>
					<th>
						Product Name
					</th>
					<th>
						Product Price
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					for ($i = 0; $i < count($product) ; $i++) {
						?>
							<tr>
								<td>
									<?=($i + 1);?>
								</td>
								<td>
									<?=$product[$i];?>
								</td>
								<td>
									<?=$price[$i];?>
								</td>
								<td>
									<a href="DemoCart.php?add=<?=$i;?>">Add to cart</a>
								</td>
							</tr>
						<?php
					}
				?>
			</tbody>
			
  </table>
		<br>
		<?php
			$flag = false;
			if ((isset($_SESSION["cart"])) && (count($_SESSION["cart"]) != 0))
			{
				?>
					<h3>View cart</h3>
					<table border="1">
						<thead>
							<tr>
								<th>
									Product No.
								</th>
								<th>
									Product Price.
								</th>
								<th>
									Product Quantity
								</th>
								<th>
									Amount of money
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($_SESSION["cart"] as $i) 
								{
									?>
										<tr>
											<td>
												<?=$_SESSION["cart"][$i];?>
											</td>
											<td>
												<?=$price[$i];?>
											</td>
											<td>
												<?=$_SESSION["quantity"][$i];?>
											</td>							
											<td>
												<?=$_SESSION["amount"][$i];?>
											</td>		
											<td>
												<a href="DemoCart.php?remove=<?=$i;?>">Remove</a>
											</td>
										</tr>
									<?php
									$_SESSION["total"] = $_SESSION["total"] + $_SESSION["amount"][$i];
								}							
							?>
							<tr>
								<td>
									Total
								</td>
								<td align = "right" colspan="4">
									<?=$_SESSION["total"]?>
								</td>
							</tr>
							<tr>
								<td colspan="5" align="center">
									<a href="DemoCart.php?reset=true" style="text-decoration: none;">
										<button>Reset Cart</button>
									</a>
									<a href="DemoCart.php?save=true" style="text-decoration: none;">
										<button>Check in</button>
									</a>
								</td>
							</tr>
						</tbody>
					</table>
				<?php
				if (isset($_REQUEST["save"]))
				{
					if ($_REQUEST["save"] == "true")
					{
						$query1 = "INSERT INTO tblorder VALUES(0,".$_SESSION["total"].")";
						$result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
						if ($result1)
						{
							?>
							<script>
									alert("Saved");
									location.assign("DemoCart.php");
								</script>
							<?php
							unset($_SESSION["quantity"]);
							unset($_SESSION["amount"]);
							unset($_SESSION["total"]);
							unset($_SESSION["cart"]);

						}
					}
				}
			}
		?>
	</center>
</body>
</html>