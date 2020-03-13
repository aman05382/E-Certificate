# E-Certificate-Script
A simple E-certificates generator made with PHP where people can generate and download their e-certificates.

## Installation and configuration
The installation is super easy. You just need to upload all files to your webserver directory, with the SQL(Database) File attached to this Project.

### PDF template
Replace dummy 'certificate.jpg' with the jpg file of your certificate design. Make sure that the design does not have the name of the participant, which will be written while generating the e-certificate. 

### PDF file orientation and dimension
Configure the dimension of PDF file in points; width and height in 'register.php' file.
```
 $pdf = new FPDF('L');
```

### Set font family and font size
Configure the font family and the font size. 
```
$pdf->SetFont("Arial","B","12");
```

The following fonts are already included in the package: Courier, Droid Serif, Helvetica, Roboto Bold, Roboto Regular, Symbol, Times Roman, Zapfdingbats. More fonts can be added as per this [tutorial](http://www.fpdf.org/en/tutorial/tuto7.htm).

### Set font color
Configure the font color in RGB.
```
$pdf->SetTextColor(10, 43, 73);
```



### Name alignment
Change the text alignment (6th parameter) as per your requirement. Check the [mannual](http://www.fpdf.org/en/doc/cell.htm) for more info.
```
 $pdf->Cell(0, 10, "$name", 0, 1, "L");
```

### Add Names in Database for verification
To make sure that only people who have attended the event can receive the e-certificate, we will have a Database of names that will be used to verify the name of the participant while generating the e-certificate.

Create a Database Connection and import the given `SQL` File.

### Home page
The home page can be customized as per your need by changing HTML (index.html) and CSS (`css/style.css`).

### Add QR-Code for verification
To make sure that the certificate is genuine or not I have added a barcode Facility in it only people who have attended the event can be able to scan the e-certificate.

```
 $pdf->Image('Verify.png',125,151,45,45);
```
### Registration Page(Only for admin Purpose)
The Registration is only for admin purpose to generate the certificates and this page can be customized as per your need by changing HTML (index.html) and CSS (`css/main.css`).



## Thank you
I have used the awesome [FPDF](http://www.fpdf.org) with [QR-LIB](http://phpqrcode.sourceforge.net/) for this application.