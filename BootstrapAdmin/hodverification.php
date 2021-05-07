<?php
session_start();
$con= mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");



if(isset($_GET['bookingid']) && !empty($_GET['bookingid']) AND isset($_GET['otp']) && !empty($_GET['otp']))
{
    $bookingid = $_GET['bookingid'];
    $otp =$_GET['otp'];

$search = "SELECT bookingid,otp,emailconfirmationstatus FROM confirmationstatus WHERE bookingid='".$bookingid."' AND otp='".$otp."' AND emailconfirmationstatus='0'";
$match  =mysqli_query($con,$search);
//if($match > 0){
 $query="UPDATE confirmationstatus SET emailconfirmationstatus='1' WHERE bookingid='".$bookingid."' AND otp='".$otp."' AND emailconfirmationstatus='0' ";
 $result=mysqli_query($con,$query); 
       
//echo "<script>alert('Verified Successfully!!'); window.location='../index.html'; </script>";    
//}
    
$query="SELECT serialnumber,name from booking WHERE bookingid='$bookingid' ";
$result=mysqli_query($con,$query); 
$results=mysqli_fetch_array($result);
$snum=$results['serialnumber'];
$studentname=$results['name'];

        
$query1="SELECT username from industry WHERE serialnumber='$snum' ";
$result1=mysqli_query($con,$query1); 
$results1=mysqli_fetch_array($result1);
$indususer=$results1['username']; 
    
        
$query2="SELECT email from login WHERE username='$indususer' ";
$result2=mysqli_query($con,$query2); 
$results2=mysqli_fetch_array($result2);
$industryemail=$results2['email']; 
 
        
$query3="SELECT email from login WHERE username='$studentname' ";
$result3=mysqli_query($con,$query3); 
$results3=mysqli_fetch_array($result3);
$institutionemail=$results3['email']; 



require('fpdf.php');

class PDF_MySQL_Table extends FPDF
{
protected $ProcessingTable=false;
protected $aCols=array();
protected $TableX;
protected $HeaderColor;
protected $RowColors;
protected $ColorIndex;

function Header()
{
    // Print the table header if necessary
    if($this->ProcessingTable)
        $this->TableHeader();
}

function TableHeader()
{
    $this->SetFont('Arial','B',12);
    $this->SetX($this->TableX);
    $fill=!empty($this->HeaderColor);
    if($fill)
        $this->SetFillColor($this->HeaderColor[0],$this->HeaderColor[1],$this->HeaderColor[2]);
    foreach($this->aCols as $col)
        $this->Cell($col['w'],6,$col['c'],1,0,'C',$fill);
    $this->Ln();
}

function Row($data)
{
    $this->SetX($this->TableX);
    $ci=$this->ColorIndex;
    $fill=!empty($this->RowColors[$ci]);
    if($fill)
        $this->SetFillColor($this->RowColors[$ci][0],$this->RowColors[$ci][1],$this->RowColors[$ci][2]);
    foreach($this->aCols as $col)
        $this->Cell($col['w'],5,$data[$col['f']],1,0,$col['a'],$fill);
    $this->Ln();
    $this->ColorIndex=1-$ci;
}

function CalcWidths($width, $align)
{
    // Compute the widths of the columns
    $TableWidth=0;
    foreach($this->aCols as $i=>$col)
    {
        $w=$col['w'];
        if($w==-1)
            $w=$width/count($this->aCols);
        elseif(substr($w,-1)=='%')
            $w=$w/100*$width;
        $this->aCols[$i]['w']=$w;
        $TableWidth+=$w;
    }
    // Compute the abscissa of the table
    if($align=='C')
        $this->TableX=max(($this->w-$TableWidth)/2,0);
    elseif($align=='R')
        $this->TableX=max($this->w-$this->rMargin-$TableWidth,0);
    else
        $this->TableX=$this->lMargin;
}

function AddCol($field=-1, $width=-1, $caption='', $align='L')
{
    // Add a column to the table
    if($field==-1)
        $field=count($this->aCols);
    $this->aCols[]=array('f'=>$field,'c'=>$caption,'w'=>$width,'a'=>$align);
}

function Table($link, $query, $prop=array())
{
    // Execute query
    $res=mysqli_query($link,$query) or die('Error: '.mysqli_error($link)."<br>Query: $query");
    // Add all columns if none was specified
    if(count($this->aCols)==0)
    {
        $nb=mysqli_num_fields($res);
        for($i=0;$i<$nb;$i++)
            $this->AddCol();
    }
    // Retrieve column names when not specified
    foreach($this->aCols as $i=>$col)
    {
        if($col['c']=='')
        {
            if(is_string($col['f']))
                $this->aCols[$i]['c']=ucfirst($col['f']);
            else
                $this->aCols[$i]['c']=ucfirst(mysqli_fetch_field_direct($res,$col['f'])->name);
        }
    }
    // Handle properties
    if(!isset($prop['width']))
        $prop['width']=0;
    if($prop['width']==0)
        $prop['width']=$this->w-$this->lMargin-$this->rMargin;
    if(!isset($prop['align']))
        $prop['align']='C';
    if(!isset($prop['padding']))
        $prop['padding']=$this->cMargin;
    $cMargin=$this->cMargin;
    $this->cMargin=$prop['padding'];
    if(!isset($prop['HeaderColor']))
        $prop['HeaderColor']=array();
    $this->HeaderColor=$prop['HeaderColor'];
    if(!isset($prop['color1']))
        $prop['color1']=array();
    if(!isset($prop['color2']))
        $prop['color2']=array();
    $this->RowColors=array($prop['color1'],$prop['color2']);
    // Compute column widths
    $this->CalcWidths($prop['width'],$prop['align']);
    // Print header
    $this->TableHeader();
    // Print rows
    $this->SetFont('Arial','',11);
    $this->ColorIndex=0;
    $this->ProcessingTable=true;
    while($row=mysqli_fetch_array($res))
        $this->Row($row);
    $this->ProcessingTable=false;
    $this->cMargin=$cMargin;
    $this->aCols=array();
}
}

class PDF extends PDF_MySQL_Table
{
// Page header
function Header()
{

    // Logo
$this->Image('logo.png',10,6,30,0,'','localhost/code/eyevee');
$this->SetFont('Times','B',18);
$this->Cell(0,10,'eyeVee - Book your Industrial Visit',0,1,'C');
$this->Ln(3);
 $this->Cell(0,11,'Booking Details',0,1,'C'); 
$this->SetFont('Times','B',14);
$this->Cell(0,10,'Booking ID:'.$_SESSION['bookingidtiredbro'].'',0,1,'R');
$this->SetLineWidth(0.8);    
$this->SetDash();
$this->Line(10,33,200,33);      
}

// Page footer
function Footer()
{
   // Position at 1.5 cm from bottom   
    $this->SetY(-15);
   
    $this->Cell(0,-50,'HOD Signature',0,0,'R');
    $this->SetLineWidth(0.5);    
    $this->SetDash();
    $this->Line(170,250,205,250); 
    
    $this->Cell(-350,-50,'Faculty in-charge',0,0,'C');
    $this->SetLineWidth(0.5);    
    $this->SetDash();
    $this->Line(10,250,45,250); 
    
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
    
    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
    
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
    
    
    
    
    
    
    
}
// Connect to database
$link =mysqli_connect("localhost", "id5131089_yash","yash123","id5131089_eyevee");


$name=$_SESSION['name'];
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',18);
//$pdf->SetLineWidth(0.8);
//$pdf->SetDash();
//$pdf->Line(10,33,200,33);

$query = "SELECT * from booking where bookingid =".$bookingid." ";                 $result=mysqli_query($link,$query); 
$results=mysqli_fetch_array($result);
$institutionname=$results['institutionname'];                   
$institutionaddress=$results['institutionaddress'];                   
$industryname=$results['offeruploadedbyindustry'];

$html = 'These are the details of the Booking for the Industrial Visit Booked by <br><br><b>'.$studentname.'</b>, on <a href="http://localhost/code/eyevee">eyeVee</a>.';
$pdf->WriteHTML($html);
$pdf->Ln(20);

$pdf->SetFont('Times','',20);
$html1 = '<b> Industry : </b>'.$industryname.'';
$pdf->WriteHTML($html1);
$pdf->Ln(10);

$indname=$industryname;
$query1 = "SELECT city,fromdate,todate from industry where industry ='$indname' "; $result1=mysqli_query($link,$query1); 
$results1=mysqli_fetch_array($result1);
$industryaddress=$results1['city'];
$fromdate=$results1['fromdate'];
$todate=$results1['todate'];

$html2 = '<b> Industry Address : </b>'.$industryaddress.'';
$pdf->WriteHTML($html2);
$pdf->Ln(10);

$html3 = '<b> Instituion Name : </b>'.$institutionname.'';
$pdf->WriteHTML($html3);
$pdf->Ln(10);

$html4 = '<b> Instituion Address : </b>'.$institutionaddress.'';
$pdf->WriteHTML($html4);
$pdf->Ln(10);

$html5 = '<b> From Date</b> (YYYY-MM-DD) <b>:</b> '.$fromdate.'';
$pdf->WriteHTML($html5);
$pdf->Ln(10);

$html6 = '<b> To Date</b> (YYYY-MM-DD) <b>:</b> '.$todate.'';
$pdf->WriteHTML($html6);
$pdf->Ln(10);

$pdf->SetFont('Times','B',20);
$pdf->Cell(0,25,'Registered Students',0,1,'C'); 

$pdf->SetLineWidth(0.2);
// First table: output all columns
$pdf->Table($link,'select bookingid as "Booking ID",studentname as "Student Name",studentid as "Student ID" from studentdetails  where bookingid = "'.$bookingid.'" order by studentid ');
$pdf->Ln(5);


/*
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('Booking ID',20,'','Booking ID');
$pdf->AddCol('Student Name',40,'Student Name');
$pdf->AddCol('Student ID',40,'Student ID');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,'select institutionname, offeruploadedbyindustry, institutionaddress from booking where bookingid ="'.$_SESSION['bookingidtiredbro'].'"',$prop);
//order by rank limit 0,10
*/

//for($i=1;$i<=40;$i++)
//  $pdf->Cell(0,10,'Printing line number '.$i,0,1);


$pdf->Output('CNF/INDUSTRIAL VISIT BOOKING DETAILS.pdf','F');


if($con!=TRUE){
echo "Error1: ".mysql_error()."<br>";
} 
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'eyeveeinfo@gmail.com';          // SMTP username
$mail->Password = 'eyeveeeyevee'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('eyeveeinfo@gmail.com', 'eyeVee');
$mail->addReplyTo('eyeveeinfo@gmail.com', 'eyeVee');
$mail->addAddress($industryemail);
$mail->addAddress($institutionemail); // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
$mail->addAttachment('CNF/INDUSTRIAL VISIT BOOKING DETAILS.pdf','INDUSTRIAL VISIT BOOKING DETAILS.pdf','base64','application/pdf');


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h3>Booking Confirmed!!!</h3>

                                           Your Industrial Visit booking(Booking ID:'.$bookingid.') is confirmed. Also, a PDF is attached along with this email consisting of all the details.
                                            <br><br>
<h3>
<b>Thank you for choosing eyeVee !!!<b> 
    
<br> <br>


</h3>
';
$bodyContent .= '';

$mail->Subject = 'Booking ID:'.$bookingid.' Industrial Visit Booking Confirmation ';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
   echo "<script>alert('ERROR!! '); window.location = 'register.html'; </script>";
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   
echo "<script>alert('Booking Approved'); window.location='../index.html'; </script>";
}
    
    
    
    
    
}

else

{
    
   echo "<script>alert('Invalid URL!!!'); window.location='Bootstrap Admin/Login.html'; </script>";  
  
}

 

?>
