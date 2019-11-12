
<?php
	
	
	class dbconnect
	{
		public $conn;
		
		function __construct()
		{
					$this->conn = new PDO("mysql:host=localhost;dbname=sthcab",'root','');

		}
	}
	
?>