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
?>

<h4 class="elementTypeName"><?php echo $element->elementType->name?></h4>

<table class="subtleWhite">
	<tr>
		<th style="width: 38.4em;">CHECKLIST</th>
		<th>Physician</th>
		<th>Nurse</th>
		<th>Comments</th>		 </tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('admit_to_hospital_physician')?></td>
		<td><?php echo $element->admit_to_hospital_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->admit_to_hospital_nurse ? '✔' : '✘'?></td>
		<td>
			<?php echo $element->site ? 'Location: '.$element->site->name : 'No location specified'?><br/>
			<?php echo $element->minor_treatment ? '✔' : '✘'?> <?php echo $element->getAttributeLabel('minor_treatment')?>
		</td>
	</tr>
	<tr><td>2. NAME BAND LEFT WRIST</td></tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('name_band_present_physician')?></td>
		<td><?php echo $element->name_band_present_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->name_band_present_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->name_band_present_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('verbal_confirmation_physician')?></td>
		<td><?php echo $element->verbal_confirmation_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->verbal_confirmation_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->verbal_confirmation_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('name_of_attendant_physician')?></td>
		<td><?php echo $element->name_of_attendant_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->name_of_attendant_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->attendant ? $element->attendant->fullName : 'None specified'?></td>
	</tr>
	<tr><td>3. CONSENT</td></tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('consent_signed_physician')?></td>
		<td><?php echo $element->consent_signed_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->consent_signed_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->consent_signed_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('type_of_surgery_physician')?></td>
		<td><?php echo $element->type_of_surgery_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->type_of_surgery_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->type_of_surgery_comments?></td>
	</tr>
	<tr><td>4. OPERATIVE EYE(S) MARKED</td></tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('no_signs_of_infection_physician')?></td>
		<td><?php echo $element->no_signs_of_infection_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->no_signs_of_infection_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->no_signs_of_infection_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('marked_with_x_physician')?></td>
		<td><?php echo $element->marked_with_x_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->marked_with_x_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->marked_with_x_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('allergies_physician')?></td>
		<td><?php echo $element->allergies_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->allergies_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->allergies_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('preop_drops_physician')?></td>
		<td><?php echo $element->preop_drops_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->preop_drops_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->preop_drops_comments?></td>
	</tr>
	<tr>
		<td colspan="4">
			<table class="medications">
				<thead>
					<tr>
						<th>Medication</th>
						<th>Site</th>
						<th>Amount</th>
						<th>Time</th>
						<th>Given by</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach (OphNuPreoperativechecklist_Checks_PreOpDrops_Assignment::model()->findAll('element_id=?',array($element->id)) as $assignment) {
						echo $this->renderPartial('_medication_view',array('assignment'=>$assignment));
					}?>
				</tbody>
			</table>
			<a class="addMedication" href="#">Add item</a>
		</td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('weight_kg_physician')?></td>
		<td><?php echo $element->weight_kg_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->weight_kg_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->weight_kg_comments?></td>
	</tr>
	<tr><td>8. LAB WORK & EKG</td></tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('lab_hgb_physician')?></td>
		<td><?php echo $element->lab_hgb_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->lab_hgb_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->lab_hgb_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('diagnostics_ordered_physician')?></td>
		<td><?php echo $element->diagnostics_ordered_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->diagnostics_ordered_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->diagnostics_ordered_comments?></td>
	</tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('reviewed_physician')?></td>
		<td><?php echo $element->reviewed_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->reviewed_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->reviewed_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('iol_measurements_physician')?></td>
		<td><?php echo $element->iol_measurements_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->iol_measurements_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->iol_measurements_comments?></td>
	</tr>
	<tr><td>10. NPO</td></tr>
	<tr>
		<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('time_last_ate_time')?>: <?php echo $element->time_last_ate_time?></td>
		<td><?php echo $element->time_last_ate_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->time_last_ate_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->time_last_ate_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('dentures_etc_physician')?></td>
		<td><?php echo $element->dentures_etc_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->dentures_etc_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->dentures_etc_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('systemic_diseases_physician')?></td>
		<td><?php echo $element->systemic_diseases_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->systemic_diseases_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->systemic_diseases_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('medications_physician')?></td>
		<td><?php echo $element->medications_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->medications_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->medications_comments?></td>
	</tr>
	<tr>
		<td><?php echo $element->getAttributeLabel('urine_passed_physician')?></td>
		<td><?php echo $element->urine_passed_physician ? '✔' : '✘'?></td>
		<td><?php echo $element->urine_passed_nurse ? '✔' : '✘'?></td>
		<td><?php echo $element->urine_passed_comments?></td>
	</tr>
</table>

<?php if ($element->isReady()) {?>
	<img id="readySign" class="nice" src="<?php echo $this->assetPath?>/img/ready.gif" style="width:600px;display:block;margin-top:20px;margin-left:200px;">
<?php }else{?>
	<img id="notreadySign" class="nice" src="<?php echo $this->assetPath?>/img/notready.gif" style="width:600px;display:block;margin-top:20px;margin-left:200px;">
<?php }?>
