<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

/**
 * This is the model class for table "et_ophnupreoperative_checks".
 *
 * The followings are the available columns in table:
 * @property string $id
 * @property integer $event_id
 * @property integer $consent_signed
 * @property integer $name_band_present
 * @property integer $eye_marked
 * @property integer $verbal_confirmation
 * @property string $last_time_npo
 * @property string $iol
 * @property string $pre_op_drops
 * @property integer $proceed
 *
 * The followings are the available model relations:
 *
 * @property ElementType $element_type
 * @property EventType $eventType
 * @property Event $event
 * @property User $user
 * @property User $usermodified
 */

class Element_OphNuPreoperativechecklist_Checks extends BaseEventTypeElement
{
	public $service;

	/**
	 * Returns the static model of the specified AR class.
	 * @return the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'et_ophnupreoperative_checks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id, consent_signed_physician, name_band_present_physician, eye_marked, verbal_confirmation_physician, last_time_npo, iol_measurements_comments, refractive_outcome, pre_op_drops, admit_to_hospital_physician, admit_to_hospital_nurse, site_id, minor_treatment, name_band_present_nurse, name_band_present_comments, verbal_confirmation_nurse, verbal_confirmation_comments, attendant_id, name_of_attendant_physician, name_of_attendant_nurse, consent_signed_nurse, consent_signed_comments, type_of_surgery_physician, type_of_surgery_nurse, type_of_surgery_comments, no_signs_of_infection_physician, no_signs_of_infection_nurse, no_signs_of_infection_comments, marked_with_x_physician, marked_with_x_nurse, marked_with_x_comments, allergies_physician, allergies_nurse, allergies_comments, preop_drops_physician, preop_drops_nurse, preop_drops_comments, weight_kg_physician, weight_kg_nurse, weight_kg_comments, lab_hgb_physician, lab_hgb_nurse, lab_hgb_comments, diagnostics_ordered_physician, diagnostics_ordered_nurse, diagnostics_ordered_comments, reviewed_physician, reviewed_nurse, reviewed_comments, iol_measurements_physician, iol_measurements_nurse, time_last_ate_time, time_last_ate_physician, time_last_ate_nurse, time_last_ate_comments, dentures_etc_physician, dentures_etc_nurse, dentures_etc_comments, systemic_diseases_physician, systemic_diseases_nurse, systemic_diseases_comments, medications_physician, medications_nurse, medications_comments, urine_passed_physician, urine_passed_nurse, urine_passed_comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'element_type' => array(self::HAS_ONE, 'ElementType', 'id','on' => "element_type.class_name='".get_class($this)."'"),
			'eventType' => array(self::BELONGS_TO, 'EventType', 'event_type_id'),
			'event' => array(self::BELONGS_TO, 'Event', 'event_id'),
			'user' => array(self::BELONGS_TO, 'User', 'created_user_id'),
			'usermodified' => array(self::BELONGS_TO, 'User', 'last_modified_user_id'),
			'site' => array(self::BELONGS_TO, 'Site', 'site_id'),
			'attendant' => array(self::BELONGS_TO, 'User', 'attendant_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_id' => 'Event',
			'admit_to_hospital_physician' => '1. Admit to FEH or Local Hospital',
			'minor_treatment' => 'Minor treatment: physician complete #1-6',
			'name_band_present_physician' => 'a. Present',
			'verbal_confirmation_physician' => 'b. Verbal confirmation',
			'name_of_attendant_physician' => 'c. Name of attendant',
			'consent_signed_physician' => 'a. Signed & witnessed',
			'type_of_surgery_physician' => 'b. Type of surgery',
			'no_signs_of_infection_physician' => 'a. No signs of eye infection/discharge',
			'marked_with_x_physician' => 'b. By "X" and by surgeon',
			'allergies_physician' => '5. ALLERGIES',
			'preop_drops_physician' => '6. PRE-OP DROPS ORDERED AND ADMINISTERED',
			'weight_kg_physician' => '7. WEIGHT in kg',
			'lab_hgb_physician' => 'a. HGB, UA, Other',
			'diagnostics_ordered_physician' => 'b. Additional diagnostics ordered',
			'reviewed_physician' => 'c. Reviewed',
			'iol_measurements_physician' => '9. IOL MEASUREMENTS',
			'time_last_ate_time' => 'a. Time last ate/drank',
			'dentures_etc_physician' => '11. DENTURES, HEARING AID, JEWELRY, PROSTHESIS, CONTACT LENSES',
			'systemic_diseases_physician' => '12. SYSTEMIC DISEASES LISTED',
			'medications_physician' => '13. LIST OF MEDICATIONS TAKEN TODAY',
			'urine_passed_physician' => '14. URINE PASSED',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('event_id', $this->event_id, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function isReady()
	{
		return $this->admit_to_hospital_physician &&
			$this->admit_to_hospital_nurse &&
			$this->name_band_present_physician &&
			$this->name_band_present_nurse &&
			$this->verbal_confirmation_physician &&
			$this->verbal_confirmation_nurse &&
			$this->name_of_attendant_physician &&
			$this->name_of_attendant_nurse &&
			$this->consent_signed_physician &&
			$this->consent_signed_nurse &&
			$this->type_of_surgery_physician &&
			$this->type_of_surgery_nurse &&
			$this->no_signs_of_infection_physician &&
			$this->no_signs_of_infection_nurse &&
			$this->marked_with_x_physician &&
			$this->marked_with_x_nurse &&
			$this->allergies_physician &&
			$this->allergies_nurse &&
			$this->preop_drops_physician &&
			$this->preop_drops_nurse &&
			$this->weight_kg_physician &&
			$this->weight_kg_nurse &&
			$this->lab_hgb_physician &&
			$this->lab_hgb_nurse &&
			$this->diagnostics_ordered_physician &&
			$this->diagnostics_ordered_nurse &&
			$this->reviewed_physician &&
			$this->reviewed_nurse &&
			$this->iol_measurements_physician &&
			$this->iol_measurements_nurse &&
			$this->time_last_ate_physician &&
			$this->time_last_ate_nurse &&
			$this->dentures_etc_physician &&
			$this->dentures_etc_nurse &&
			$this->systemic_diseases_physician &&
			$this->systemic_diseases_nurse &&
			$this->medications_physician &&
			$this->medications_nurse &&
			$this->urine_passed_physician &&
			$this->urine_passed_nurse;
	}
}
?>
