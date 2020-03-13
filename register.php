<?php

session_start();

//Connect to server.
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die("Server Connection Failed" . mysqli_error($con));
}


//Connect to database.
$db = mysqli_select_db($con, 'social_certificate');
if (!$db) {
    die("Database Connection Failed" . mysqli_error($db));
}


$name = $_POST['name'];
$email = $_POST['email'];
$post = $_POST['post'];

if ((!$name) || (!$email) || (!$post)) {
    header("location:index.html?retry=Please re-enter your credentials");
}
//Checking if email is registered or not.
$q = "select * from intern where NAME='$name' && EMAIL='$email' && POST='$post'";

$result = mysqli_query($con, $q);

while($row=mysqli_fetch_array($result))
{           
    $start = $row['START_DATE'];
    $end = $row['END_DATE'];
}

$num = mysqli_num_rows($result);
if ($num >= 1) {

    require("pdf/fpdf.php");
    $pdf = new FPDF('L');

    $pdf->AddPage();
    $pdf->SetTitle("Certificate", True);
    $pdf->Image('certificate.jpg', 3, 3, 291, 203);

    $pdf->SetXY(32, 70);
    $pdf->SetFont("Arial", "B", "42");
    $pdf->SetTextColor(10, 43, 73);
    $pdf->Cell(0, 10, "$name", 0, 1, "L");

    $pdf -> SetXY(105,90); 
    $pdf->SetFont("Arial","B","12");
    $pdf->SetTextColor(10,43,73);
    $pdf->Cell(0,10,"$post",0,1,"L");

    $pdf -> SetXY(32,103); 
    $pdf->SetFont("Arial","B","12");
    $pdf->SetTextColor(10,43,73);
    $pdf->Cell(0,10,"$start",0,1,"L");

    $pdf -> SetXY(60,103); 
    $pdf->SetFont("Arial","B","12");
    $pdf->SetTextColor(10,43,73);
    $pdf->Cell(0,10,"$end",0,1,"L");



    include("phpqrcode/qrlib.php");
    QRcode::png("THIS CERTIFICATE IS AWARDED TO Ms/Mast. $name FOR SUCCESSFULLY COMPLETED HIS INTENSHIP FOR $post AT SOCIALDUKAN.","Verify.png","M","10","10");
    $pdf->Image('Verify.png',125,151,45,45);




    $pdf->Output();

} else{
    echo "<script>
	alert('Incorrect name or email or event. OR  You have not Completed Your Internship');
	window.location.href='http://localhost/';
	</script>";
}
?>