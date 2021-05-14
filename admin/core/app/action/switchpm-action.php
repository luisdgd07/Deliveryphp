<?php
if(isset($_SESSION["admin_id"]) ){
	$pm = PaymethodData::getById($_GET["id"]);
	//print_r($pm);
	if(!$pm->activo){
		$pm->activo = 1;
		$pm->update_active();
	}else{
		$pm->activo = 0;
		$pm->update_active();

	}
	Core::redir("./?view=payment_settings");
}
?>