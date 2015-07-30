<?php

/**
 * The simple table editor for the table menu. Menu is one of the tables that support
 * the simple table editor.
 *
 * @package prafda2
 * @author Pieter van den Hombergh
 * $Id: defproject2.php 1723 2014-01-03 08:34:59Z hom $
 */
require_once("ste.php");
$pdj_id = 1;
$milestone = 1;
extract($_SESSION);
$dbConn->setSqlAutoLog(true);
$page = new PageContainer("Define project " . $PHP_SELF . " on DB " . $db_name);
$ste = new SimpleTableEditor($dbConn, $page);
$ste->setFormAction($PHP_SELF)
        ->setRelation('project')
        ->setMenuName('project')
        ->setKeyColumns(array('prj_id'))
        ->setNameExpression("rtrim(afko)||'-'||year||': '||rtrim(description)")
        ->setOrderList(array('year desc', 'afko', 'description'))
        ->setListRowTemplate(array('year', 'owner_id','afko', 'description', 'valid_until','owner_id','comment'))
        ->setFormTemplate('templates/project.html')
        ->show();
?>