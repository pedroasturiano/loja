<?php
class admins extends model {

	public function isLogged() {
		
		if(isset($_SESSION['admlogin']) && !empty($_SESSION['$_SESSION'])){
			return true;
		} else {
			return false;
		}
	}
}
?>