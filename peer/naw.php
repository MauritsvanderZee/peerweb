<?php
requireCap(CAP_SYSTEM);
require_once('peerutils.php');
require_once('navigation2.php');
require_once('component.php');
$scount=100;
$sql="select count(*) as scount from student_email";
$resultSet=$dbConn->Execute($sql);
if (!$resultSet->EOF) $scount=$resultSet->fields['scount'];

$offset=0;
extract($_SESSION);

if (isSet($_REQUEST['offset'])) {
    $offset=validate($_REQUEST['offset'],'integer',0);
}

if (isSet($_REQUEST['plus20'])) {
	if ($offset < 4000) {
	    $offset +=20;
	}
	$_SESSION['offset']=$offset;
}
if (isSet($_REQUEST['min20'])) {
	if ($offset >20) {
	    $offset -=20;
	} else $offset=0;
	$_SESSION['offset']=$offset;
}
if (isSet($_REQUEST['start'])) {
    $offset=0;
    $_SESSION['offset']=$offset;
}
if (isSet($_REQUEST['end'])) {
    $offset= round($scount /20)*20;
    $_SESSION['offset']=$offset;
}
if (isSet($_POST['bsubmit'])) {
    $snummers=$_POST['snummer'];
    $sql ="begin work;\n";
    for ($i=0; $i < count($snummers); $i++ ) {
	$roepnaam     = trim($_POST['roepnaam'][$i]);
	$voorletters  = trim($_POST['voorletters'][$i]);
	$tussenvoegsel  = (isSet($_POST['tussenvoegsel'][$i]))?('\''.trim($_POST['tussenvoegsel'][$i]).'\''):'null';
	$achternaam   = trim($_POST['achternaam'][$i]);
	$straat       = trim($_POST['straat'][$i]);
	$plaats       = trim($_POST['plaats'][$i]);
	$huisnr       = trim($_POST['huisnr'][$i]);
	$sql .="update student_email ".
	    "set roepnaam='$roepnaam', ".
	    "voorletters='$voorletters', ".
	    "tussenvoegsel=$tussenvoegsel, ".
	    "achternaam='$achternaam', ".
	    "straat='$straat', ".
	    "plaats='$plaats', ".
	    "huisnr='$huisnr' ".
	    "where snummer=$snummers[$i];\n";
    }
    $sql .="commit\n";
    $dbConn->Execute($sql);
 }
$page = new PageContainer();
$page->setTitle('Peer assessment for tutors');
$page->addHeadComponent( new Component("<style type='text/css'>
 p {text-align: justify;}
 p:first-letter {font-size:180%; font-family: script;font-weight:bold; color:#800;}
 
 </style>"));
$page_opening="Peer naw data";
$nav=new Navigation($tutor_navtable, basename(__FILE__), $page_opening);
$sql="select snummer,rtrim(roepnaam) as roepnaam,\n".
    "rtrim(voorletters) as voorletters,\n".
    "rtrim(tussenvoegsel) as tussenvoegsel,\n".
    "rtrim(achternaam) as achternaam,\n".
    "rtrim(plaats) as plaats,\n".
    "rtrim(straat) as straat,\n".
    "rtrim(huisnr) as huisnr,rtrim(email1) as email1 from student_email order by achternaam,roepnaam,snummer limit 20 offset $offset";
$resultSet= $dbConn->Execute($sql);
$self=basename(__FILE__);
ob_start();
if ( $resultSet === false ) {
    echo( "<br>Cannot get sequence next value with ".$dbConn->ErrorMsg()."<br>");
 } else {
    $rowcounter=$offset;
    $offset2=$offset+19;
    echo "<form name='naw' method='post' action='$self'>\n".
	"<fieldset><legend>Naw data $offset to $offset2 of $scount</legend>";
    echo "<table border='1' style='border-collapse:collapse' summary='student data'>\n".
	"<tr><th>#</th><th>snummer</th><th>Roepnaam</th><th>voorletters</th><th>tussenvoegsel</th>".
	"<th>achternaam</th><th>email</th></tr>";
    while (!$resultSet->EOF) {
	extract($resultSet->fields);
	echo "<tr>\n".
	    "<th style='text-align:right;color:#888'>$rowcounter</th>".
	    "<th><input type='hidden' name='snummer[]' value='$snummer'/>$snummer</th>\n".
	    "\t<td><input type='text' size='20' name='roepnaam[]' value='$roepnaam'/></td>\n".
	    "\t<td><input type='text' size='10' name='voorletters[]' value='$voorletters'/></td>\n".
	    "\t<td><input type='text' size='10' name='tussenvoegsel[]' value='$tussenvoegsel'/></td>\n".
	    "\t<td><input type='text' size='20' name='achternaam[]' value='$achternaam'/></td>\n".
	    "<td>$email1</td>".
	    "</tr>\n";
	$rowcounter++;
	$resultSet->moveNext();
    }
    echo "</table>\n";
    echo "<table summary='button list'><tr>\n".
	"<td><button type='submit' name='start'>|&lt;</button></td>\n".
	"<td><button type='submit' name='min20'>&lt;&lt;</button></td>\n".
	"<td><input type='text' name='offset' value='$offset' size='5' style='halign:right' onChange='submit()'/></td>\n".
	"<td><button type='submit' name='plus20'>&gt;&gt;</button></td>\n".
	"<td><button type='submit' name='end'>&gt;|</button></td>\n".
	"<td><button type='submit' name='bsubmit'>Submit</button></td>\n".
	"<td><button type='reset' name='reset'>reset</button></td>\n".
	"</tr>\n</table>\n";
    echo "</fieldset>\n</form>\n";
 }
$page->addBodyComponent( new Component(ob_get_clean()) );
ob_clean(); 
$page->show();
