<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.10.2015
 * Time: 6:51
 */

require_once 'TableBuilder.php';
require_once 'Report.php';
require_once 'DailyRequest.php';
require_once 'DailyOrders.php';
require_once 'MonthlyOrders.php';

$dailyOrders = new DailyOrders();
$dailyOrders->setFormat('txt');
$dailyOrders->setTitle(get_class($dailyOrders));
$dailyOrders->build();

$monthlyOrders = new MonthlyOrders();
$monthlyOrders->setFormat('xml');
$monthlyOrders->setTitle(get_class($monthlyOrders));
$monthlyOrders->build();

$dailyRequests = new DailyRequest();
$dailyRequests->setTitle(get_class($dailyRequests));
$dailyRequests->setFormat('html');
$dailyRequests->build();

$dailyRequests->setFormat('xml');
$dailyRequests->build();