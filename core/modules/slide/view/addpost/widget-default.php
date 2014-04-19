<?php
if(isset($_POST)){
$p = new PostData();
$p->title = $_POST['title'];
$p->content = $_POST['content'];
$public =0;
if($_POST['is_public']){ $public=1; }

$p->is_public = $public;
$p->user_id = Session::getUID();


/* $handle = new Upload($_FILES['image']);
		$imfound = false;
    	if ($handle->uploaded) {
    		$url="storage/user/".Session::getUID()."/slidle/image/";
        	$handle->Process($url);
          	$p->image = $handle->file_dst_name;
		}
*/
$p->theme_id = $_POST['theme_id'];

$id = $p->add();




setcookie("added",$p->title);

print "<script>window.location='index.php?view=post&id=$id[1]';</script>";
}
?>