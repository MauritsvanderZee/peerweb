<?php
requireCap(CAP_TUTOR);
require_once('tutorhelper.php');
require_once('navigation2.php');
require_once 'navigation2.php';
require_once 'presencetable.php'; 
// get group tables for a project
$prj_id=0;
$prjm_id = 0;
$milestone=1;
$afko='PRJ00';
$description='';
extract($_SESSION);

//pagehead2("Presence list to $afko $year $description");//,$scripts);
$page = new PageContainer();
ob_start();
tutorHelper($dbConn,$isTutor);
$page->addBodyComponent(new Component(ob_get_clean()));
$page->setTitle('Overview of presence during activities');
$page_opening="Presence overview for $roepnaam $tussenvoegsel $achternaam ($snummer)";
$nav=new Navigation($tutor_navtable, basename(__FILE__), $page_opening);
$page->addBodyComponent($nav);
$pp=array();

$pp['presence_table'] = personalPresenceList($dbConn,$snummer);

$page->addHtmlFragment('../templates/peerpresenceoverview.html',$pp);


//$page->addBodyComponent(new Component($text));
$page->addBodyComponent(new Component('<!-- db_name='.$db_name.'-->'));
$page->show();
