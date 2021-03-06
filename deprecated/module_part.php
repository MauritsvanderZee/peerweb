<?php
requireCap(CAP_SYSTEM);
/**
 * The simple table editor for the tutor
 * @author Pieter van den Hombergh
 * $Id: module_part.php 1724 2014-01-03 09:06:02Z hom $
 */
require_once("ste.php");
$title = "Module Part Editor On DB $db_name ";

$page = new PageContainer("Module part on DB $db_name ");
$ste = new SimpleTableEditor($dbConn, $page);
$ste->setTitle($title)
        ->setFormAction($PHP_SELF)
        ->setRelation('module_part')
        ->setMenuName('module_part')
        ->setKeyColumns(array('module_part_id'))
        ->setNameExpression("rtrim(progress_code)||':'||rtrim(part_description)")
        ->setListRowTemplate(array('progress_code', 'part_description', 'credits'))
        ->setOrderList(array('progress_code'))
        ->setFormTemplate('templates/module_part.html')
        ->show();

