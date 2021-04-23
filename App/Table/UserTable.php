<?php

	namespace bpsmartdesignMedecinApp\Table;
	use \Core\Table\Table;

	class UserTable extends Table{

		public function findeInReunion($id) {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE id_reunion = ?
				', [$id]);
		}

	}
?>