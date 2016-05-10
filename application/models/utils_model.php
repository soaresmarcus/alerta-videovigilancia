<?php

/**
* 
*/
class Utils_Model extends CI_Model
{
	
	public function get_database()
	{
		return $this->db->database;
	}

	public function select_estoque()
	{
		$this->db->select('*');
		$this->db->limit(2000);
		$return = $this->db->get('ECSTDETALHEINSUMO');
		/*
		ECXAMOVCXABCO - baixa no caixa
		EISCTIPOINSSERV - grupos de materiais
		EESTITEMMOVIMENTO - materiais
		EADCITEMPEDIDO - materiais
		EADCITEMSOL - materiais
		ECSTINSUMO - materiais
		 - materiais
		*/

		return $return->result();

	}

	public function show_tables()
	{
		return $this->db->list_tables();
	}

	public function check_tables()
	{
		$tables = $this->show_tables();
		$arr = array();
		foreach ($tables as $t) {
			$count = $this->db->count_all($t);
			if ($count > 0) {
				$arr[$t] = $count;
			}
		}

		return $arr;
	}
}