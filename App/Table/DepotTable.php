<?php

	namespace bpsmartdesignMedecinApp\Table;
	use \Core\Table\Table;

	class DepotTable extends Table{

		public function depotMembre($id, $id_reunion) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_membre = ?
					AND id_reunion = ?
				', [$id , $id_reunion]);
		}

		public function deposit_stamp($id, $day) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
					AND date <= ?
				', [$id , $day]);
		}

	}
?>