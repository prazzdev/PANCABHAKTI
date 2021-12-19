<?php
ini_set('display_errors', 0);
ob_start();
session_start();

if(version_compare(phpversion(), '7', '<=')) {
  die('<b>Warning:</b> Your PHP version '.phpversion().' is deprecated. Please use PHP version or up!');
}

$MySQL_Host = 'localhost';
$MySQL_User = 'root';
$MySQL_Pass = 'm0r9AFtx';
$MySQL_Name = 'panca_bhakti';

$cp = new mysqli($MySQL_Host, $MySQL_User, $MySQL_Pass, $MySQL_Name);
if($cp->connect_errno) {
  die('<b>Error:</b> Connection to database is failed!');
}

$cp->query('SET CHARSET UTF8');
$cp->Query('SET NAMES UTF8');
?>