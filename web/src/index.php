<!DOCTYPE html>
<head>
<html>
<link rel="stylesheet" href="css/styles.css" type="text/css">  
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
<link rel="stylesheet" href="css/style.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=iso-8859-2">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style>
.tabs a {
 cursor: pointer;
}

button {
	outline: none !important;
	border: none;
	background: transparent;
}
</style>
<script>

  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
 <title> Zabbix - Pracuj.pl</title>
</head>
<body>

 <div class="wrapper">
  <nav class="tabs">
    <div class="selector"></div>
	
	<a class="active" onClick="parent.location='index.php'">Strona Główna <i class="fa fa-lock"></i></a>
	<a onClick="parent.location='dodawanie.php'">Dodaj Firmę <i class="fa fa-user-plus"></i></a>
	<a onClick="window.open('https://www.pracuj.pl/')">Pracuj.pl <i class="fa fa-pinterest-p"></i></a>    
    <a onClick="window.open('https://intranet.hso.grupa.skok/SitePages/Strona%20g%C5%82%C3%B3wna.aspx')"></i>Intranet <i class="fas fa-burn"></i></a>
	
	<a onClick="window.open('pdf_export.php')"></i>Pobierz PDF <i class="fa fa-download"></i></a>	
  </nav>
</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script  src="js/index.js"></script>

  
  

<table>
 <tr>
  <th width="30%">Nazwa Firmy </th> 
  <th></th>
  <th>Data dodania</th>
  <th width="25%">Adres</th>   
  <th>Kontakt </th>
  <th>Materiały</th>
  <th>Operacje</th>
  
 </tr>
 

 
 <?php
$conn = mysqli_connect(getenv('DB_SERV'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')); 
$conn->query("SET NAMES 'utf8'");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  
$sql = "SELECT * FROM pracodawcy ORDER BY data_dodania DESC";
$result = $conn->query($sql);  

  
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_array()) {   
   
   
    $ID=$row["ID"];
	$kontakt=$row["kontakt"];
	$folder=$row["folder"];
	
	echo "<form method='post' action='index.php'>";
    echo "<tr><td align='left'>	
	" .$row["nazwa"]."</td><td><a class='btn btn-primary dropdown-toggle mr-4' type='button' data-toggle='dropdown' aria-haspopup='true'
  aria-expanded='false'></a>

<div class='dropdown-menu'>
  
  <a class='dropdown-item' href='" .  $row["link"] . "'>Przejdź do ogłoszenia</a>
</td><td>" .  $row["data_dodania"] . " </td>";
	echo "<td><center>" .$row["adres"]."</center></td>";
	if($kontakt == 1){
		echo "<td>
		<button type='submit' value='$kontakt' class='unstyled-button' name='kontakt'><img src='images/checked.png' /> </button></td>";
	}
	else{

		echo "<td><button type='submit' class='unstyled-button' name='kontakt'><img src='images/no.png'/> </button></td>";
		
	}
	
	if($folder == 1){
		echo "<td>
		<button type='submit' value='$folder' class='unstyled-button' name='folder'><img src='images/folder-green-unlocked-icon.png' /> </button></td>";
	}
	else{

		echo "<td><button type='submit' class='unstyled-button' name='folder'><img src='images/folder-red-locked-icon.png'/> </button></td>";
		
	}
	
	
	
	
	
	echo "<td><input type='hidden'  name='ID' value=$ID +/><input name='usun' type='submit' class='form-submit-button' value='Usuń'/></td></form>";  	
   }
   

   if(isset($_POST['kontakt']))
	{
	$id = $_POST["ID"];
	if($_POST['kontakt'] == 0)
	{
		$sql4 = "UPDATE pracodawcy SET kontakt = 1 WHERE ID = '$id'";
	}
	else
	{
		$sql4 = "UPDATE pracodawcy SET kontakt = 0 WHERE ID = '$id'";
	}
	$query_2 = mysqli_query($conn, $sql4);
	echo "<meta http-equiv='refresh' content='0'>";
}

  if(isset($_POST['folder']))
	{
	$id = $_POST["ID"];
	if($_POST['folder'] == 0)
	{
		$sql4 = "UPDATE pracodawcy SET folder = 1 WHERE ID = '$id'";
	}
	else
	{
		$sql4 = "UPDATE pracodawcy SET folder = 0 WHERE ID = '$id'";
	}
	$query_2 = mysqli_query($conn, $sql4);
	echo "<meta http-equiv='refresh' content='0'>";
}






	if(isset($_POST['usun']))
	{
		$id = $_POST["ID"];
		$sql3 = "DELETE FROM pracodawcy WHERE ID = '$id'";
		$query_2 = mysqli_query($conn, $sql3);
		echo "<meta http-equiv='refresh' content='0'>";
	}	
}



?>
</form>
</table>


<!--

<table>
<form method="post" action="crawler.php">

    <tr align='left'>
      <td align='left'>Nazwa:</td>
      <td><input align='left' type="text" name="name" id="name" ></td>    
	     </tr>  <tr align='left'>
	  <td align='left'>Adres:</td>
      <td align='left'><input type="text" align="left" name="adres" id="name" >							
	 </br> <input name="sADD" align="left" type="submit" id="submitBtn" value="Dodaj"></td>   

    </tr>    
    
  
 <?php
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
 -->


 
 
</body>
</html>