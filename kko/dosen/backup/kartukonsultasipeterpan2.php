<?php
session_start();
include('include/config.php');
$klppeterpan=intval($_GET['klppeterpan']);
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	if(isset($_POST['idusers']))
	{

	$year = date('Y');
	$bulan_ini=date('n');
	if($bulan_ini<=6){
		$bulan_ini='2';
	}else{
		$bulan_ini='1';
	}
			$string_gabungan = $year.$bulan_ini;
			$semester=$string_gabungan;
			$iddosen=$_POST['iddosen'];
			$idusers=$_POST['idusers'];
			$klppeterpan=$_POST['klppeterpan'];
			$catatankonsultasi=$_POST['catatankonsultasi'];
      $statuskehadiran=$_POST['statuskehadiran'];
      $postingDate =$_POST['postingDate'];
      $count = count($idusers);

      $sql   = "INSERT INTO kehadiran (idkelompok,idusers,iddosen,semester,statuskehadiran,postingDate) VALUES ";

      for( $i=0; $i < $count; $i++ )
{
    $sql .= "('{$klppeterpan}','{$idusers[$i]}','{$iddosen}','{$semester}','{$statuskehadiran[$i]}','{$postingDate}')";
    $sql .= ",";
    
}


$sql = rtrim($sql,",");
$insert = $con->query($sql);
$sql =mysqli_query($con,"INSERT INTO catatankelompok(klppeterpan,iddosen,catatankonsultasi,semester,postingDate) VALUES ('$klppeterpan','$iddosen','$catatankonsultasi','$semester','$postingDate')");
// if( !$insert )
// {
// 	echo "gagal insert : ".$con->error;
// }else{
// 	echo "sukses, silahkan check database anda";
// }
	$_SESSION['msg']="Catatan evaluasi berhasil ditambahkan.";


	
}

if(isset($_GET['idkehadiran']) && $_GET['action']=='del')
{
$idkehadiran=$_GET['idkehadiran'];

$query=mysqli_query($con,"delete from kehadiran where idkehadiran='$idkehadiran'");

$sec = "1";

header("location:javascript://history.go(-1)");

}

if(isset($_GET['idcatatankelompok']) && $_GET['action']=='del')
{
$idcatatankelompok=$_GET['idcatatankelompok'];

$query=mysqli_query($con,"delete from catatankelompok where idcatatankelompok='$idcatatankelompok'");


header("location:javascript://history.go(-1)");

}


?>



<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="new_display_files/filelist.xml">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="WEB_REPORT_16451_Styles">
<!--table
	{mso-displayed-decimal-separator:"\,";
	mso-displayed-thousand-separator:"\.";}
.xl1516451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6316451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6416451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6516451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6616451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6716451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6816451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6916451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7016451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7116451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7216451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7316451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7416451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7516451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7616451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:normal;}
.xl7716451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7816451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:.5pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7916451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8016451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8116451
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
-->
</style>
</head>

<body>
<!--[if !excel]>&nbsp;&nbsp;<![endif]-->
<!--The following information was generated by Microsoft Excel's Publish as Web
Page wizard.-->
<!--If the same item is republished from Excel, all information between the DIV
tags will be replaced.-->
<!----------------------------->
<!--START OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD -->
<!----------------------------->

<div id="WEB_REPORT_16451" align=center x:publishsource="Excel">
<?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username  where k.klppeterpan='$klppeterpan' and semester='$semester' and k.iddosen='".$_SESSION['alogin']."'");
while($row=mysqli_fetch_array($ret))
{
?>	


<table border=0 cellpadding=0 cellspacing=0 width=945 style='border-collapse:
 collapse;table-layout:fixed;width:708pt'>
 <col width=35 style='mso-width-source:userset;mso-width-alt:1280;width:26pt'>
 <col width=89 style='mso-width-source:userset;mso-width-alt:3254;width:67pt'>
 <col width=11 style='mso-width-source:userset;mso-width-alt:402;width:8pt'>
 <col width=64 span=3 style='width:48pt'>
 <col width=90 style='mso-width-source:userset;mso-width-alt:3291;width:68pt'>
 <col width=64 style='width:48pt'>
 <col width=48 style='mso-width-source:userset;mso-width-alt:1755;width:36pt'>
 <col class=xl1516451 width=19 style='mso-width-source:userset;mso-width-alt:
 694;width:14pt'>
 <col width=29 style='mso-width-source:userset;mso-width-alt:1060;width:22pt'>
 <col width=71 style='mso-width-source:userset;mso-width-alt:2596;width:53pt'>
 <col width=155 style='mso-width-source:userset;mso-width-alt:5668;width:116pt'>
 <col width=39 style='mso-width-source:userset;mso-width-alt:1426;width:29pt'>
 <col width=31 style='mso-width-source:userset;mso-width-alt:1133;width:23pt'>
 <col width=72 style='mso-width-source:userset;mso-width-alt:2633;width:54pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl1516451 width=35 style='height:15.0pt;width:26pt'><a
  name="RANGE!A1:P17"></a></td>
  <td class=xl1516451 width=89 style='width:67pt'></td>
  <td class=xl1516451 width=11 style='width:8pt'></td>
  <td class=xl1516451 width=64 style='width:48pt'></td>
  <td class=xl1516451 width=64 style='width:48pt'></td>
  <td class=xl1516451 width=64 style='width:48pt'></td>
  <td class=xl1516451 width=90 style='width:68pt'></td>
  <td class=xl1516451 width=64 style='width:48pt'></td>
  <td class=xl1516451 width=48 style='width:36pt'></td>
  <td class=xl1516451 width=19 style='width:14pt'></td>
  <td class=xl1516451 width=29 style='width:22pt'></td>
  <td class=xl1516451 width=71 style='width:53pt'></td>
  <td class=xl1516451 width=155 style='width:116pt'></td>
  <td class=xl1516451 width=39 style='width:29pt'></td>
  <td class=xl1516451 width=31 style='width:23pt'></td>
  <td class=xl1516451 width=72 style='width:54pt'></td>
 </tr>

 <button type="button" style="font-size:24px" id="printPageButton" value="Print" 
               onclick="window.print()" ><i class="fa fa-print"></i> Print</button> 

 <tr height=21 style='height:15.75pt'>
  <td colspan=7 height=21 class=xl6816451 style='height:15.75pt'>Evaluasi
  Kemajuan Proses Pengerjaan Proyek</td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td colspan=6 rowspan=4 height=84 width=397 style='height:63.0pt;width:297pt'
  align=left valign=top><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
   coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
   filled="f" stroked="f">
   <v:stroke joinstyle="miter"/>
   <v:formulas>
    <v:f eqn="if lineDrawn pixelLineWidth 0"/>
    <v:f eqn="sum @0 1 0"/>
    <v:f eqn="sum 0 0 @1"/>
    <v:f eqn="prod @2 1 2"/>
    <v:f eqn="prod @3 21600 pixelWidth"/>
    <v:f eqn="prod @3 21600 pixelHeight"/>
    <v:f eqn="sum @0 0 1"/>
    <v:f eqn="prod @6 1 2"/>
    <v:f eqn="prod @7 21600 pixelWidth"/>
    <v:f eqn="sum @8 21600 0"/>
    <v:f eqn="prod @7 21600 pixelHeight"/>
    <v:f eqn="sum @10 21600 0"/>
   </v:formulas>
   <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
   <o:lock v:ext="edit" aspectratio="t"/>
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s3075" type="#_x0000_t75"
   style='position:absolute;margin-left:118.5pt;margin-top:5.25pt;width:174.75pt;
   height:51.75pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="new_display_files/WEB_REPORT_16451_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:158px;margin-top:7px;width:233px;
  height:69px'><img width=233 height=69
  src="new_display_files/WEB_REPORT_16451_image002.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=6 rowspan=4 height=84 class=xl7016451 width=397
    style='height:63.0pt;width:297pt'></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=9 height=21 class=xl6916451 style='height:15.75pt'>Pemograman
  Terintegrasi Terapan Semester Genap 2017/2018</td>
  <td class=xl6316451></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6316451 style='height:15.75pt'></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6316451 colspan=3 style='height:15.75pt'>Dosen
  Pembimbing :</td>
  <td colspan=5 class=xl6816451> <?php echo $row['nmdosen'];?><span style='mso-spacerun:yes'></span></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6316451 style='height:16.5pt'></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td rowspan=2 height=44 class=xl6616451 style='height:33.0pt'>NO.</td>
  <td rowspan=2 class=xl6616451>Tanggal</td>
  <td colspan=5 rowspan=2 class=xl6616451>Catatan Konsultasi</td>
  <td colspan=2 class=xl7816451 style='border-right:1.0pt solid black;
  border-left:none'>Kehadiran</td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl7716451 style='height:16.5pt;border-left:none'>Ivan</td>
  <td class=xl7716451 style='border-left:none'>Celine</td>
  <td class=xl6316451></td>
  <td class=xl6516451>No.</td>
  <td class=xl6616451 style='border-left:none'>NIM</td>
  <td class=xl6616451 style='border-left:none'>Nama Mahasiswa</td>
  <td class=xl6616451 style='border-left:none'>IPK</td>
  <td class=xl6616451 style='border-left:none'>Klp</td>
  <td class=xl6616451 style='border-left:none'>Nilai Akhir</td>
 </tr>
 <?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from catatankelompok where klppeterpan='$klppeterpan' and semester='$semester' and iddosen='".$_SESSION['alogin']."'");
$cnt=1;
while($row=mysqli_fetch_array($ret))
{
?>	
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>

  <td height=40 class=xl6616451 style='height:30.0pt;border-top:none'>1</td>
  <td class=xl6616451 style='border-top:none;border-left:none'><?php echo $row["postingDate"]; ?></td>
  <td colspan=5 class=xl7416451 width=293 style='border-right:1.0pt solid black;
  border-left:none;width:220pt'><?php echo $row["catatankonsultasi"]; ?></td>

  <td class=xl6616451 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl6316451></td>

  <td class=xl6616451 style='border-top:none'>1</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>72160057</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>Ivan Hector
  Sinambela</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>3.35</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>20</td>
  <td class=xl6616451 style='border-top:none;border-left:none'>95</td>
 </tr>
 <?php $cnt=$cnt+1; } ?>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl8016451 style='height:30.0pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6716451></td>
  <td colspan=3 class=xl7316451>&nbsp;</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl8016451 style='height:30.0pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6716451>Yogyakarta,<span style='mso-spacerun:yes'>�</span></td>
  <td colspan=3 class=xl8116451>20 Januari 2019</td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
  <td height=38 class=xl8016451 style='height:28.5pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td colspan=4 class=xl7016451>Dosen Pembimbing</td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl8016451 style='height:30.75pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td colspan=4 class=xl7016451></td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl8016451 style='height:30.75pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td colspan=4 class=xl7016451>(<?php echo $row['nmdosen'];?>)</td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl8016451 style='height:30.75pt'></td>
  <td class=xl6316451></td>
  <td colspan=5 class=xl7016451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td class=xl6316451></td>
  <td colspan=6 class=xl7016451>* Form ini dipegang dan disimpan oleh Dosen
  Pembimbing.</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl1516451 style='height:15.75pt'></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl6316451></td>
  <td colspan=6 class=xl7116451 width=397 style='width:297pt'>** Form
  dikembalikan ke Koordinator pada akhir Semester Genap 2017/2018 bersamaan
  dengan Laporan Hasil Kerja.</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1516451 style='height:15.0pt'></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl6316451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
  <td class=xl1516451></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=35 style='width:26pt'></td>
  <td width=89 style='width:67pt'></td>
  <td width=11 style='width:8pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=90 style='width:68pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=48 style='width:36pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=29 style='width:22pt'></td>
  <td width=71 style='width:53pt'></td>
  <td width=155 style='width:116pt'></td>
  <td width=39 style='width:29pt'></td>
  <td width=31 style='width:23pt'></td>
  <td width=72 style='width:54pt'></td>
 </tr>
 <![endif]>
 <?php } ?>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>
<?php } ?>
</html>
