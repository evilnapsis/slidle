<?php
// init.php
// archivo iniciarlizador del modulo
// librerias requeridas
// * Database
// * Session

include "core/modules/".Module::$module."/model/UserData.php";
include "core/modules/".Module::$module."/model/PostData.php";
include "core/modules/".Module::$module."/model/ThemeData.php";
include "core/modules/".Module::$module."/model/LoveData.php";
include "core/modules/".Module::$module."/model/InvitationData.php";
include "core/modules/".Module::$module."/Slidle.php";

session_start();
ob_start();

Module::loadLayout("index");

?>