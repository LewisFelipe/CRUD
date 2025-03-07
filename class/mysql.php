<?php
	class mysql
	{
		function __construct()
		{
			$this->db_host = constant("_DB_HOST");
			$this->db_user = constant("_DB_USER");
			$this->db_pass = constant("_DB_PASS");
			$this->db_name = constant("_DB_NAME");

			$this->link_id = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

			if(!$this->link_id)
			{
				die("!\$this->link_id");
			}
		}

		function query($query)
		{
			$result = mysqli_query($this->link_id, $query);
			if(!$result) {
				die("!\$result");
			}
			$this->result = $result;
			return $this->result;
		}

		function close() { mysqli_close($this->link_id); }
	}
?>
