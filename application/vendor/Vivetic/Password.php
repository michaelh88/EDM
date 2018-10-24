<?php defined('SYSPATH') or die('No direct script access.');

final class Password
{
	public $motdepasse;
	public function __construct()
	{
		$this->motdepasse = $this->genererpassword();
	}
	private function genererpassword()
	{
		define('MIN_CHIFFRE',48);
		define('MAX_CHIFFRE',58);
		define('MIN_MINUS',65);
		define('MAX_MINUS',91);
		define('MIN_MAJUS',97);
		define('MAX_MAJUS',123);

		$tliste=array();
		$idx=0;
		$taille=8;

		for($i=MIN_CHIFFRE;$i<MAX_CHIFFRE;$i++) $tliste[$idx++]=chr($i);
		for($i=MIN_MINUS;$i<MAX_MINUS;$i++) $tliste[$idx++]=chr($i);
		for($i=MIN_MAJUS;$i<MAX_MAJUS;$i++) $tliste[$idx++]=chr($i);
		$passwd="";
		for($i=0;$i<$taille;$i++) {
			$passwd.=$tliste[rand(0,$idx-1)];
		}
		return $passwd;

	}
}

?>
