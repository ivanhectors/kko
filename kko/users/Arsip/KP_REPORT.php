<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

?>

<html xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<title>Cetak Kartu Konsultasi - Kerja Praktik</title>
	<style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }
   td.a {
  display: table-cell;
  vertical-align: inherit;
  font-family:calibri;
  text-transform: uppercase;
}
</style>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<!--[if !mso]>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<style id="WEB_REPORT_30228_Styles">
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
.xl1530228
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
.xl6330228
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
	text-align:center;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6430228
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
	text-align:left;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6530228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6630228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6730228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6830228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl6930228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7030228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:1.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7130228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.5pt solid windowtext;
	border-left:1.5pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7230228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:none;
	border-bottom:1.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7330228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7430228
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
	text-align:center;
	vertical-align:bottom;
	border-top:1.5pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7530228
	{padding:3px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:top;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:wrap;}
.xl7630228
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
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7730228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7830228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl7930228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8030228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8130228
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
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8230228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8330228
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
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8430228
	{padding:3px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8530228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:middle;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8630228
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
	text-align:center;
	vertical-align:middle;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl8730228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl8830228
	{padding:3px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:general;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl8930228
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
	text-align:center;
	vertical-align:bottom;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9030228
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
	text-align:center;
	vertical-align:bottom;
	border-top:none;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9130228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.5pt solid windowtext;
	border-right:1.5pt solid windowtext;
	border-bottom:none;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9230228
	{padding:0px;
	mso-ignore:padding;
	color:black;
	font-size:12.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:none;
	border-right:1.5pt solid windowtext;
	border-bottom:1.5pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9330228
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:11.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9430228
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:204;
	mso-number-format:General;
	text-align:center;
	vertical-align:bottom;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9530228
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:28.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9630228
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:28.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:none;
	border-left:1.0pt solid windowtext;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9730228
	{padding:0px;
	mso-ignore:padding;
	color:white;
	font-size:28.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:center;
	vertical-align:middle;
	border-top:none;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	background:#E96E11;
	mso-pattern:black none;
	white-space:nowrap;}
.xl9830228
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
	text-align:right;
	vertical-align:bottom;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl9930228
	{padding:3px;
	mso-ignore:padding;
	color:black;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri, sans-serif;
	mso-font-charset:0;
	mso-number-format:General;
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:1.0pt solid windowtext;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10030228
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
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:none;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
	mso-background-source:auto;
	mso-pattern:auto;
	white-space:nowrap;}
.xl10130228
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
	text-align:left;
	vertical-align:middle;
	border-top:1.0pt solid windowtext;
	border-right:1.0pt solid windowtext;
	border-bottom:1.0pt solid windowtext;
	border-left:none;
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

<div id="WEB_REPORT_30228" align=center x:publishsource="Excel">

<table border=0 cellpadding=0 cellspacing=0 width=775 style='border-collapse:
 collapse;table-layout:fixed;width:584pt'>
 <col width=113 style='mso-width-source:userset;mso-width-alt:4132;width:85pt'>
 <col width=148 style='mso-width-source:userset;mso-width-alt:5412;width:111pt'>
 <col width=118 style='mso-width-source:userset;mso-width-alt:4315;width:89pt'>
 <col width=20 style='mso-width-source:userset;mso-width-alt:731;width:15pt'>
 <col width=18 style='mso-width-source:userset;mso-width-alt:658;width:14pt'>
 <col width=6 style='mso-width-source:userset;mso-width-alt:219;width:5pt'>
 <col width=145 span=2 style='mso-width-source:userset;mso-width-alt:5302;
 width:109pt'>
 <col width=62 style='mso-width-source:userset;mso-width-alt:2267;width:47pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 width=113 style='height:15.0pt;width:85pt' align=left
  valign=top><!--[if gte vml 1]><v:shapetype id="_x0000_t75" coordsize="21600,21600"
   o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f"
   stroked="f">
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
  </v:shapetype><v:shape id="Picture_x0020_1" o:spid="_x0000_s2051" type="#_x0000_t75"
   style='position:absolute;margin-left:3pt;margin-top:14.25pt;width:36pt;
   height:50.25pt;z-index:1;visibility:visible' >
   <v:imagedata src="KP_REPORT_files/WEB_REPORT_30228_image001.png" o:title=""/>
   <x:ClientData ObjectType="Pict">
    <x:SizeWithCells/>
    <x:CF>Bitmap</x:CF>
    <x:AutoPict/>
   </x:ClientData>
  </v:shape><![endif]--><![if !vml]><span style='mso-ignore:vglayout;
  position:absolute;z-index:1;margin-left:4px;margin-top:19px;width:48px;
  height:67px'><img width=48 height=67
  src="KP_REPORT_files/WEB_REPORT_30228_image002.png" v:shapes="Picture_x0020_1"></span><![endif]><span
  style='mso-ignore:vglayout2'>
  <table cellpadding=0 cellspacing=0>
  
   <tr>
    <td height=20 class=xl1530228 width=113 style='height:15.0pt;width:85pt'><a
    name="RANGE!A1:I52"></a></td>
   </tr>
  </table>
  </span></td>

  <td class=xl1530228 width=148 style='width:111pt'></td>
  <td class=xl1530228 width=118 style='width:89pt'></td>
  <td class=xl1530228 width=20 style='width:15pt'></td>
  <td class=xl1530228 width=18 style='width:14pt'></td>
  <td class=xl1530228 width=6 style='width:5pt'></td>
  <td class=xl1530228 width=145 style='width:109pt'></td>
  <td class=xl1530228 width=145 style='width:109pt'></td>
  <td class=xl1530228 width=62 style='width:47pt'></td>
 </tr>

 <tr height=21 style='height:15.75pt'>
  <td rowspan=3 height=64 class=xl6330228 style='height:48.0pt'></td>
  <td colspan=4 class=xl6530228>UNIVERSITAS KRISTEN DUTA WACANA</td>
  <td class=xl1530228></td>
  <td colspan=3 class=xl8630228>KARTU KONSULTASI KERJA PRAKTIK</td>
 </tr>
 <tr height=22 style='height:16.5pt'>
  <td colspan=3 height=22 class=xl6530228 style='height:16.5pt'>FAKULTAS
  TEKNOLOGI INFORMASI</td>
  <td class=xl8530228></td>
  <td class=xl1530228></td>
  <td colspan=3 class=xl8730228>Th. Ajaran : 2019/2020<span></span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=2 height=21 class=xl8130228 style='height:15.75pt'>PROGRAM STUDI
  SISTEM INFORMASI</td>
  <td class=xl8330228></td>
  <td class=xl8330228></td>
  <td class=xl1530228></td>
  <td colspan=3 class=xl9330228>SI 4023</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=9 height=21 class=xl8230228 style='height:15.75pt'>&nbsp;</td>
 </tr>
 <?php
  $matakuliah="3"; 
  $query=mysqli_query($con,"select * from users where nim='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl6630228 style='height:16.5pt;border-top:none'>NIM<span
  style='mso-spacerun:yes'> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
  <td class=xl6730228 style='font-size:13px;border-top:none'><strong><?php echo htmlentities($row['nim']);?></td>
  <td class=xl6830228 style='border-top:none'>&nbsp;</td>
  <td class=xl6830228 style='border-top:none'>&nbsp;</td>
  <td class=xl6830228 style='border-top:none'>&nbsp;</td>
  <td class=xl6830228 style='border-top:none'>&nbsp;</td>
  <td class=xl6830228 style='border-top:none'>NAMA MAHASISWA &nbsp;:</td>
  <td colspan=2 class="a" class="upper" class=xl6730228 style='font-size:13px;border-right:1.5pt solid black;'><strong><?php echo htmlentities($row['fullName']);?></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl6930228 style='height:15.75pt'>JUDUL KP<span
  style='mso-spacerun:yes'> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
  <td class="a" class="upper" colspan=8 class=xl6530228 style='font-size:13px; border-right:1.5pt solid black'><strong><?php echo htmlentities($row['judulkp']);?></td>
 </tr>
 <?php } ?>
 <?php
  $matakuliah="3"; 
  $query=mysqli_query($con,"SELECT * FROM tblkonsultasi where userId='".$_SESSION['id']."' and  matakuliah='$matakuliah'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl7130228 style='height:16.5pt'>PEMBIMBING &nbsp;&nbsp;&nbsp;:</td>
 
  <td class="a" class="upper" style="font-size:13px;" class=xl7230228  ><strong><?php echo htmlentities($row['dosen']);?></td>
  <?php } ?>
  <td class=xl7330228>&nbsp;</td>
  <td class=xl7330228>&nbsp;</td>
  <td class=xl7330228>&nbsp;</td>
  <td class=xl7330228>&nbsp;</td>
  <td class=xl7330228>LOKASI<span style='mso-spacerun:yes'>
  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
  <?php
  $matakuliah="3"; 
  $query=mysqli_query($con,"select * from users where nim='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
  <td colspan=2 class="a" class="upper" class=xl7230228 style='font-size:13px;border-right:1.5pt solid black'><strong><?php echo htmlentities($row['tempatkp']);?></td>
 </tr>
 <?php } ?>
 <tr height=22 style='height:16.5pt'>
  <td colspan=9 height=22 class=xl7430228 style='height:16.5pt'>&nbsp;</td>
 </tr>
 <?php
 function format_indo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);               
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1]. " ". $tahun;
    return($result);
}

  $status="selesai"; 
  $cnt=1;
  $date = "regDate";
  $query=mysqli_query($con,"SELECT * FROM tblkonsultasi where userId='".$_SESSION['id']."' and  status='$status'");
 while($row=mysqli_fetch_array($query)) 
 { 
 ?> 
 <tr height=22 style='height:16.5pt'>
  <td height=22 class=xl8430228 style='height:16.5pt'>Tanggal <span
  style='mso-spacerun:yes'> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>

  <td colspan=7 class=xl9930228 style='border-right:1.0pt solid black'><?php echo format_indo($row['regDate']);?></td>

  <td rowspan=4 class=xl9530228 style='border-bottom:1.0pt solid black'><?php echo htmlentities($cnt);?></td>
 </tr>

 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl8830228 style='height:15.75pt'>PARAF &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
  <td colspan=7 rowspan=3 class=xl7530228 style='border-right:1.0pt solid black;
  border-bottom:1.0pt solid black'><?php echo htmlentities($row['detailkonsultasi']);?></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td rowspan=2 height=41 class=xl7730228 style='border-bottom:1.0pt solid black;
  height:30.75pt'>&nbsp;</td>
 </tr>

 <tr height=21 style='height:15.75pt'>
 </tr>
 <?php $cnt=$cnt+1; } ?>

  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
 </tr>

 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl6430228 style='height:15.0pt'>Koordinator
  Kerja Praktik</td>

  <td colspan=5 class=xl6330228>Mahasiswa</td>
  <td colspan=2 class=xl9830228>Dosen Pembimbing</td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl1530228 style='height:15.75pt'></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td height=20 class=xl1530228 style='height:15.0pt'></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl1530228 style='height:15.75pt'></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
 </tr>
 <tr height=21 style='mso-height-source:userset;height:15.75pt'>
  <td height=21 class=xl1530228 style='height:15.75pt'></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
  <td class=xl1530228></td>
 </tr>
 <?php
  $id="1"; 
  $query=mysqli_query($con,"select * from master where idmaster='$id'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl6430228 style='height:15.0pt'>( <?php echo htmlentities($row['koordinatorkp']);?> )</td>
  <?php } ?>
  <?php
  $matakuliah="3"; 
  $query=mysqli_query($con,"select * from users where nim='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
  <td colspan=5 class=xl6330228>( <?php echo htmlentities($row['fullName']);?> )</td>
  <?php } ?>

 <?php
  $matakuliah="3"; 
  $query=mysqli_query($con,"SELECT * FROM tblkonsultasi where userId='".$_SESSION['id']."' and  matakuliah='$matakuliah'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
  <td colspan=2 class=xl9830228>( <?php echo htmlentities($row['dosen']);?> )</td>
  <?php } ?>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=113 style='width:85pt'></td>
  <td width=148 style='width:111pt'></td>
  <td width=118 style='width:89pt'></td>
  <td width=20 style='width:15pt'></td>
  <td width=18 style='width:14pt'></td>
  <td width=6 style='width:5pt'></td>
  <td width=145 style='width:109pt'></td>
  <td width=145 style='width:109pt'></td>
  <td width=62 style='width:47pt'></td>
 </tr>
 <![endif]>
</table>

</div>


<!----------------------------->
<!--END OF OUTPUT FROM EXCEL PUBLISH AS WEB PAGE WIZARD-->
<!----------------------------->
</body>

</html>
<?php } ?>