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
		$medications = array();

		if (!empty($_POST) && !empty($_POST['Medication'])) {
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
		} else {
			if ($element->id) {
				foreach (OphNuPreoperativechecklist_Checks_PreOpDrops_Assignment::model()->findAll('element_id=?',array($element->id)) as $assignment) {
					$assignment->time = substr($assignment->time,0,5);
					$medications[] = $assignment;
				}
			}
		}

		return $medications;
	}

	public function getFirmUsers()
	{
		$criteria = new CDbCriteria;
		$criteria->addCondition('firm.id is not null');
		$criteria->order = 'first_name asc, last_name asc';

		return User::model()->with('firm')->findAll($criteria);
	}
}
