<!DOCTYPE html>
<html lang="pl">
<head>
	<title>Zabbix - Pracuj.pl</title>
<style>
.tabs a {
 cursor: pointer;
}
</style>
    <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=iso-8859-2">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/add.ico" type="image/x-icon" />

<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
<!--===============================================================================================-->
<link rel="stylesheet" href="styles.css" type="text/css">  
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="wrapper" >
  <nav class="tabs">
    <div class="selector"></div>
	<a class="active" onClick="parent.location='dodawanie.php'">Dodaj Firmę <i class="fa fa-user-plus"></i></a>
	<a onClick="parent.location='index.php'">Strona Główna <i class="fa fa-lock"></i></a>

    <a onClick="window.open('https://www.pracuj.pl/')">Pracuj.pl <i class="fa fa-pinterest-p"></i></a>    
    <a onClick="window.open('https://intranet.hso.grupa.skok/SitePages/Strona%20g%C5%82%C3%B3wna.aspx')"></i>Intranet <i class="fas fa-burn"></i></a>
		<a onClick="window.open('pdf_export.php')"></i>Pobierz PDF <i class="fa fa-download"></i></a>
  </nav>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script  src="js/index.js"></script>

	<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
	
	
	
	
	
	
	
	
		<div class="container-contact100">
		
			<div class="wrap-contact100">
			
				<div class="contact100-pic js-tilt" data-tilt>
				<img src="aplitt.png" alt="IMG">

					<img src="images/img-01.png" alt="IMG">
					
				</div>
		
				<form method="post" class="contact100-form validate-form" action="dodawanie.php"">
				
					<span class="contact100-form-title">
						Dodaj nową firmę!
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Nazwa jest wymagana!">
						<input class="input100" type="text" name="name" placeholder="Nazwa Firmy">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Podaj miejscowość!">
						<input class="input100" type="text" name="adres" placeholder="Lokalizacja">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="container-contact100-form-btn">
						<input name="sADD" align="left" type="submit" id="submitBtn" value="Dodaj" class="contact100-form-btn">						
		
					</div>					

					

				</form>
			</div>
		</div>
	</div>

 <?php 
 
$conn = mysqli_connect(getenv('DB_SERV'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));
$conn->query("SET NAMES 'utf8'");
if(isset($_POST['sADD']))
{
$nazwa = $_POST['name'];
$adres = $_POST['adres'];

#$data_dodania = $_POST['data'];
$data=date("y-m-d");
$sql1 = "insert into pracodawcy(nazwa,data_dodania,adres) values('$nazwa','$data','$adres')";
$query_2 = mysqli_query($conn, $sql1);
}
$conn->close();
  ?> 
 


<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
