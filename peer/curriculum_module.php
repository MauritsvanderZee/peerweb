<?php
requireCap(CAP_SYSTEM);
/**
 * The simple table editor for the table menu. Menu is one of the tables that support
 * the simple table editor.
 *
 * @package peerweb
 * @author Pieter van den Hombergh
 * $Id: curriculum_module.php 1723 2014-01-03 08:34:59Z hom $
 */

require_once("ste.php");
$page = new PageContainer("Course (curriculum) module ".basename(__FILE__)." on DB ".$db_name);
$ste = new SimpleTableEditor($dbConn,$page);
$ste->setFormAction(basename(__FILE__));
$ste->setRelation('curriculum_module');
$ste->setMenuName('curriculum_module');
$ste->setKeyColumns(array('curriculum_module_id'));
$ste->setNameExpression("rtrim(common_name,' ')||', '||rtrim(first_academic_year,' ')");
$ste->setOrderList(array('curriculum_module_code'));
$ste->setFormTemplate('../templates/curriculum_module.html');
$ste->show();
?>





