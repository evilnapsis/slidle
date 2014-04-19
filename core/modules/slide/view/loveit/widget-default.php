<?php
if(Session::getUID()!=""){
	$l = new LoveData();
	$l->slide_id = $_GET["postid"];
	$l->user_id = Session::getUID();
	$l->add();
}else{
	echo "no user";
}

?>