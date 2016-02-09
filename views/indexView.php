<?php

require_once("../Pizzeria/views/smarty/libs/Smarty.class.php");

// Instanciar la clase de Smarty
$smarty = new Smarty();
$smarty->setTemplateDir("../Pizzeria/config/smarty/templates/");
$smarty->setCompileDir("../Pizzeria/config/smarty/templates/compile/");

$smarty->assign("action", $helper->url("usuarios","crear"));

$smarty->display("../Pizzeria/views/index.tpl");