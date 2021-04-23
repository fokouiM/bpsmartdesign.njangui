<?php

	namespace bpsmartdesignMedecinApp\Table;
	use \Core\Table\Table;

	class ReunionTable extends Table{

		public function activeReunion() {

			return $this->query('

					SELECT *
					FROM '.$this->table.'
					WHERE statut = 1
				');
		}

	}
?>