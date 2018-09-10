<?php
function previousId($minid) {

	$id_actuel=$_GET['id'];

	$id_previous=$id_actuel-1;

	if ($id_actuel== $minid['id_min']) {$id_previous=$id_actuel; }

	return $id_previous;
}

function nextId($maxid){

	$id_actuel=$_GET['id'];

	$id_next=$id_actuel+1;

	if ($id_actuel==$maxid['id_max']) {$id_next=$id_actuel;}

	return $id_next;
}

?>