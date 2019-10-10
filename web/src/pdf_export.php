<?php  
function fetch_data()  
{  
$output = '';  
$conn = mysqli_connect(getenv('DB_SERV'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME')); 
$conn->query("SET NAMES 'utf8'"); 
$sql = "SELECT * FROM pracodawcy";  
$result = mysqli_query($conn, $sql);
 
while($row = mysqli_fetch_array($result))  
{       

$output .= '<tr>  
<td>'.$row["nazwa"].'</td>  
<td>'.$row["data_dodania"].'</td>  
<td>'.$row["adres"].'</td>  
</tr>  
';  

}  
return $output;  
}  
if(isset($_POST["generate_pdf"]))  
{  
require_once('tcpdf/tcpdf.php');  
$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Generator PDF");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('freeserif', '', 11);  
$obj_pdf->AddPage();  
$content = '';  
$content .= '  

<table border="1" cellspacing="0" cellpadding="5">  
<tr>  

<th width="50%">Nazwa</th>  
<th width="15%">Data Dodania</th>  
<th width="40%">Adres</th>  
</tr>  
';  
$content .= fetch_data();  
$content .= '</table>';  
$obj_pdf->writeHTML($content);  
$obj_pdf->Output('firmy_zabbix.pdf', 'I');  
}  
?>  
<!DOCTYPE html>  

<html>  
<head>  
<title>Generowanie PDF</title>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="icon" href="dw.ico" type="image/x-icon" />


<script language="javascript">
function onLoadSubmit() {
	document.login.submit();
}
</script>        
</head>  
<body onload="onLoadSubmit()">  
<br />
<div class="container">  

<div class="table-responsive">  
<div class="col-md-12" align="right">
<form method="post" name="login" id="login" ">
 
<input type="name" id="submitButton" name="generate_pdf" class="btn btn-success" value="Utwórz plik PDF" />  
</form>  
</div>
<br/>
<br/>
<table class="table table-bordered">  
<tr>  
 
<th width="30%">Nazwa</th>  
<th width="15%">Data Dodania</th>  
<th width="50%">Email</th>  

</tr>  
<?php  
echo fetch_data();  
?>  
</table>  
</div>  
</div>  
</body>  
</html>