<?php

	namespace bpsmartdesignMedecinApp\Table;
	use \Core\Table\Table;

	class MembreTable extends Table{

		public function currentMembre($id) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
				', [$id]);
		}

		public function currentActiveMembre($id) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
					AND statut = 1
				', [$id]);
		}

	}
?>