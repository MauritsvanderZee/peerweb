<?php
requireCap(CAP_SYSTEM);

/**
 * The simple table editor for the tutor
 * @author Pieter van den Hombergh
 * $Id: peer_settings.php 1723 2014-01-03 08:34:59Z hom $
 */
require_once("ste.php");
$navTitle = "Peerweb settings" . basename(__FILE__) . " on DB " . $db_name;
$page = new PageContainer();
$page->setTitle($navTitle);
$ste = new SimpleTableEditor($dbConn, $page);
$ste->setFormAction(basename(__FILE__))->setRelation('peer_settings')->setMenuName('peer_settings')
        ->setKeyColumns(array('key'))
        ->setNameExpression("rtrim(key)")
        ->setListRowTemplate(array('key', 'value', 'comment'))
        ->setOrderList(array('key'))
        ->setFormTemplate('../templates/peer_settings.html')
        ->show();
