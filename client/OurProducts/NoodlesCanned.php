<?php include ( "../inc/connect.inc.php" ); ?>
<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION['user_login'])) {
		$user = "";
	}
	else {
		$user = $_SESSION['user_login'];
		$result = mysqli_query($con, "SELECT * FROM user WHERE id='$user'");
		$get_user_email = mysqli_fetch_assoc($result);
		$uname_db = $get_user_email['firstName'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Stock up on convenience and flavor with our canned noodle selection, available online in Madagascar! Whether you crave classic ramen or exotic varieties, enjoy delicious meals in minutes. Explore our noodle aisle and simplify your pantry today!">
	<title>NITA | Our products in the noodle and canned category | Best Madagascar product</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-RXDP9GNBEG"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-RXDP9GNBEG');
	</script>
</head>
<body>
	<?php include ( "../inc/mainheader.inc.php" ); ?>
	<?php include ( "../inc/nav-categorie.inc.php" ); ?>

	<div style="padding: 15px 0px; font-size: 15px; margin: 0 auto; display: table; width: 98%;">
		<center><h1>This is our <strong>noodle and canned</strong> products that our <strong>groceries</strong> sell</h1></center>

		<div>
			
		<?php 
			$getposts = mysqli_query($con, "SELECT * FROM products WHERE available >='1' AND item ='noodles'  ORDER BY id DESC LIMIT 10") or die(mysqlI_error($con));
					if (mysqli_num_rows($getposts)) {
					echo '<ul id="recs">';
					while ($row = mysqli_fetch_assoc($getposts)) {
						$id = $row['id'];
						$pName = $row['pName'];
						$price = $row['price'];
						$description = $row['description'];
						$picture = $row['picture'];
						
						echo '
							<ul style="float: left;">
								<li style="float: left; padding: 0px 25px 25px 25px;">
									<article class="home-prodlist-img"><a href="'.$pName.'-'.$id.'">
										<img alt="'.$pName.'" src="../../image/product/noodles/'.$picture.'" class="home-prodlist-imgi">
										</a>
										<div style="text-align: center; padding: 0 0 6px 0;"> 
											<h2>
												<span style="font-size: 15px;">'.$pName.'</span>
											<h2><br> 
											Price: '.$price.' Php
										</div>
									</article>
								</li>
							</ul>
						';

						}
				}
		?>
			
		</div>
	</div>
</body>
</html>