<?php
class DBConn
{
public $host;
public $user;
public $pass;
public $perintah;
public $database;
public $koneksi;

	function __construct()
	{
		$this->host="124.81.89.42";
		$this->user="raider";
		$this->pass="asismart2015";
		$this->koneksi=mysql_connect($this->host,$this->user,$this->pass);
		if(!$this->koneksi)
		{
			echo "Koneksi gagal";
			exit();
		}

		$this->database="smart_platform";
		$q=mysql_select_db($this->database,$this->koneksi);
		if(!$q)
		{
			echo "Database tidak ditemukan";
		}
	}

	public function GetCandidate($idCL)
	{
		$this->perintah = mysql_query("select * from otm_cnd_attribute where id_client = '".$idCL."' ");
		while($r=mysql_fetch_array($this->perintah))
		{
			$arr[] = $r;
		}

		echo '{"candidate":'. json_encode($arr).'}';
	}

	public function loGin($user,$pass)
	{
		$pass = md5($pass);
		$this->perintah = mysql_query("select name, username, id_client from otm_client_user where username = '".$user."' AND password_enc = '".$pass."' ");
		while($r=mysql_fetch_array($this->perintah))
		{
			$arr[] = $r;
		}

		echo '{"user":'. json_encode($arr).'}';
	}

}

?>