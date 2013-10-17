<?
$lang = $hub->GetParam('lang');
$_SESSION['lang_admin'] = $lang;

$hub->BackLevel(2);
header('LOCATION:' . $hub->GetUrl());

?>