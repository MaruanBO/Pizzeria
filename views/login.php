<?php

require_once("smarty/libs/Smarty.class.php");

// Instanciar la clase de Smarty
$smarty = new Smarty();
$smarty->setTemplateDir("smarty/templates/");
$smarty->setCompileDir("smarty/templates/compile/");

$smarty->assign("captcha", true);

$smarty->display("login.tpl");