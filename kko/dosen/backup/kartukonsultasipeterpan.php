
<?php
session_start();
include('include/config.php');
$klppeterpan=intval($_GET['klppeterpan']);
if(strlen($_SESSION['dlogin'])==0)
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
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=ProgId content=Excel.Sheet>
<meta name=Generator content="Microsoft Excel 15">
<link rel=File-List href="PETERPAN_files/filelist.xml">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style>
   @media print {
  #printPageButton {
    display: none;
  }
}
   </style>
<style id="WEB_REPORT_3846_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl153846
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
.xl633846
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
.xl643846
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
.xl653846
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
.xl663846
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
.xl673846
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
.xl683846
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
	border:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl693846
	{
      
   padding:0px;
   vertical-align:middle;
   text-align:center;
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
.xl703846
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
.xl713846
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
.xl723846
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
.xl733846
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

<?php
$semester=intval($_GET['semester']);
$klppeterpan=intval($_GET['klppeterpan']);
$ret=mysqli_query($con,"select * from kelompok k join users u on k.idusers=u.nim join dosen d on k.iddosen=d.username where k.klppeterpan='$klppeterpan' and semester='$semester'");
while($row=mysqli_fetch_array($ret))
{
?>	



<div id="WEB_REPORT_3846" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=1015 style='border-collapse:
 collapse;table-layout:fixed;width:761pt'>
 <col width=35 style='mso-width-source:userset;mso-width-alt:1280;width:26pt'>
 <col width=89 style='mso-width-source:userset;mso-width-alt:3254;width:67pt'>
 <col width=11 style='mso-width-source:userset;mso-width-alt:402;width:8pt'>
 <col width=64 span=3 style='width:48pt'>
 <col width=90 style='mso-width-source:userset;mso-width-alt:3291;width:68pt'>
 <col width=64 span=3 style='width:48pt'>
 <col width=19 style='mso-width-source:userset;mso-width-alt:694;width:14pt'>
 <col width=29 style='mso-width-source:userset;mso-width-alt:1060;width:22pt'>
 <col width=64 style='width:48pt'>
 <col width=156 style='mso-width-source:userset;mso-width-alt:5705;width:117pt'>
 <col width=39 style='mso-width-source:userset;mso-width-alt:1426;width:29pt'>
 <col width=27 style='mso-width-source:userset;mso-width-alt:987;width:20pt'>
 <col width=72 style='mso-width-source:userset;mso-width-alt:2633;width:54pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl153846 width=35 style='height:15.0pt;width:26pt'><a
  name="RANGE!A1:Q17"></a></td>
  <td class=xl153846 width=89 style='width:67pt'></td>
  <td class=xl153846 width=11 style='width:8pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=90 style='width:68pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=19 style='width:14pt'></td>
  <td class=xl153846 width=29 style='width:22pt'></td>
  <td class=xl153846 width=64 style='width:48pt'></td>
  <td class=xl153846 width=156 style='width:117pt'></td>
  <td class=xl153846 width=39 style='width:29pt'></td>
  <td class=xl153846 width=27 style='width:20pt'></td>
  <td class=xl153846 width=72 style='width:54pt'></td>
 </tr>

        <button type="button" style="font-size:24px" id="printPageButton" value="Print" 
               onclick="window.print()" ><i class="fa fa-print"></i> Print</button> 
   
 <tr height=21 style='height:15.75pt'>
  <td colspan=7 height=21 class=xl633846 style='height:15.75pt'>Evaluasi
  Kemajuan Proses Pengerjaan Proyek</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td colspan=6 rowspan=4 height=84 width=387 style='height:63.0pt;width:290pt'
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
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s3073" type="#_x0000_t75"
   style='position:absolute;margin-left:113.25pt;margin-top:5.25pt;width:174.75pt;
   height:51.75pt;z-index:1;visibility:visible' o:gfxdata="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
">
   <v:imagedata src="PETERPAN_files/WEB_REPORT_3846_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:151px;margin-top:7px;width:233px;
  height:69px'><img width=233 height=69
  src="PETERPAN_files/WEB_REPORT_3846_image002.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
   <tr>
    <td colspan=6 rowspan=4 height=84 class=xl723846 width=387
    style='height:63.0pt;width:290pt'></td>
   </tr>
  </table>
  </span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=7 height=21 class=xl653846 style='height:15.75pt'>Pemograman
  Terintegrasi Terapan Semester Genap 2017/2018</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl643846 style='height:15.75pt'></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl643846 colspan=3 style='height:15.75pt'>Dosen
  Pembimbing :</td>
  
  <td colspan=3 class=xl633846><?php echo $row['nmdosen'];?><span style='mso-spacerun:yes'></span></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl643846 style='height:16.5pt'></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td rowspan=2 height=44 class=xl673846 style='height:33.0pt'>NO.</td>
  <td rowspan=2 class=xl673846>Tanggal</td>
  <td colspan=5 rowspan=2 class=xl673846>Catatan Konsultasi</td>
  <td colspan=3 class=xl683846 style='border-left:none'>Kehadiran</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl673846 style='height:16.5pt;border-top:none;border-left:
  none'>Ivan</td>
  <td class=xl673846 style='border-top:none;border-left:none'>Celine</td>
  <td class=xl673846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl693846>No.</td>
  <td class=xl673846 style='border-left:none'>NIM</td>
  <td class=xl673846 style='border-left:none'>Nama Mahasiswa</td>
  <td class=xl673846 style='border-left:none'>IPK</td>
  <td class=xl673846 style='border-left:none'>Klp</td>
  <td class=xl673846 style='border-left:none'>Nilai Akhir</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl673846 style='height:30.0pt;border-top:none'>1</td>
  <td class=xl693846 style='border-top:none' >This is it</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl673846 style='border-top:none'>1</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=39 style='mso-height-source:userset;height:29.25pt'>
  <td height=39 class=xl673846 style='height:29.25pt;border-top:none'>2</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl673846 style='border-top:none'>2</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl673846 style='height:30.0pt;border-top:none'>3</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl673846 style='border-top:none'>3</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl673846 style='height:30.0pt;border-top:none'>4</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl703846>Yogyakarta,<span style='mso-spacerun:yes'>�</span></td>
  <td colspan=3 class=xl713846>20 Januari 2019</td>
 </tr>
 <tr height=40 style='mso-height-source:userset;height:30.0pt'>
  <td height=40 class=xl673846 style='height:30.0pt;border-top:none'>5</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td colspan=4 class=xl723846>Dosen Pembimbing</td>
 </tr>
 <tr height=38 style='mso-height-source:userset;height:28.5pt'>
  <td height=38 class=xl673846 style='height:28.5pt;border-top:none'>6</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td colspan=4 class=xl723846></td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl673846 style='height:30.75pt;border-top:none'>7</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td class=xl643846></td>
  <td colspan=4 class=xl723846>(Yetli)</td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl673846 style='height:30.75pt;border-top:none'>8</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td colspan=6 class=xl723846>* Form ini dipegang dan disimpan oleh Dosen
  Pembimbing.</td>
 </tr>
 <tr height=41 style='mso-height-source:userset;height:30.75pt'>
  <td height=41 class=xl673846 style='height:30.75pt;border-top:none'>9</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td colspan=5 class=xl683846 style='border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl693846 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl643846></td>
  <td colspan=6 class=xl733846 width=387 style='width:290pt'>** Form
  dikembalikan ke Koordinator pada akhir Semester Genap 2017/2018 bersamaan
  dengan Laporan Hasil Kerja.</td>
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
  <td width=64 style='width:48pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=19 style='width:14pt'></td>
  <td width=29 style='width:22pt'></td>
  <td width=64 style='width:48pt'></td>
  <td width=156 style='width:117pt'></td>
  <td width=39 style='width:29pt'></td>
  <td width=27 style='width:20pt'></td>
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

</html>
<?php } ?>
