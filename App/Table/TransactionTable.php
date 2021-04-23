<?php

	namespace bpsmartdesignMedecinApp\Table;
	use \Core\Table\Table;

	class TransactionTable extends Table{

		public function searchTransaction($id_r, $id_m, $id_e, $day, $m) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
					AND id_membre = ?
					AND id_emprunt = ?
					AND date = ?
					AND montant = ?
				', [$id_r , $id_m, $id_e, $day, $m]);
		}

		public function activeTransaction($id_r, $id_m, $day) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
					AND id_emprunt = ?
					AND date = ?
				', [$id_r , $id_m, $day]);
		}

	}
?>