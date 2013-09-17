<?php

class DefaultController extends BaseEventTypeController {
	public function actionCreate()
	{
		parent::actionCreate();
	}

	public function actionUpdate($id)
	{
		parent::actionUpdate($id);
	}

	public function actionView($id)
	{
		parent::actionView($id);
	}

	public function actionPrint($id)
	{
		parent::actionPrint($id);
	}

	public function actionAddMedication()
	{
		$assignment = new OphNuPreoperativechecklist_Checks_PreOpDrops_Assignment;

		$this->renderPartial('_medication_edit',array('assignment'=>$assignment));
	}

	public function getMedications($element)
	{
		if (!empty($_POST) && !empty($_POST['Medication'])) {
			$medications = array();

			foreach ($_POST['Medication'] as $i => $medication_id) {
				$a = new OphNuPreoperativechecklist_Checks_PreOpDrops_Assignment;
				$a->element_id = $this->id;
				$a->drop_id = $medication_id;
				$a->side_id = @$_POST['Site'][$i];
				$a->dose = @$_POST['Amount'][$i];
				$a->time = @$_POST['Time'][$i];
				$a->given_by_id = @$_POST['Givenby'][$i];

				$medications[] = $a;
			}

			return $medications;
		}

		return OphNuPreoperativechecklist_Checks_PreOpDrops_Assignment::model()->findAll('element_id=?',array($this->id));
	}
}
