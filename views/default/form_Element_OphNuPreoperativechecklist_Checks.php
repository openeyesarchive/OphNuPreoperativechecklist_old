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

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<table class="subtleWhite">
		<tr>
			<th style="width: 38.4em;">CHECKLIST</th>
			<th>Physician</th>
			<th>Nurse</th>
			<th>Comments</th>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('admit_to_hospital_physician')?></td>
			<td><?php echo $form->checkBox($element,'admit_to_hospital_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'admit_to_hospital_nurse',array('nowrapper'=>true))?></td>
			<td>
				Location: <?php echo $form->dropDownList($element,'site_id',Site::model()->getListForCurrentInstitution(),array('nowrapper'=>true,'empty'=>'- Please select -'))?><br/>
				<?php echo $form->checkBox($element,'minor_treatment',array('text-align'=>'right','nowrapper'=>true))?>
			</td>
		</tr>
		<tr><td>2. NAME BAND LEFT WRIST</td></tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('name_band_present_physician')?></td>
			<td><?php echo $form->checkBox($element,'name_band_present_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'name_band_present_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'name_band_present_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('verbal_confirmation_physician')?></td>
			<td><?php echo $form->checkBox($element,'verbal_confirmation_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'verbal_confirmation_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'verbal_confirmation_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('name_of_attendant_physician')?></td>
			<td><?php echo $form->checkBox($element,'name_of_attendant_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'name_of_attendant_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->dropDownList($element,'attendant_id',CHtml::listData(User::model()->findAll(array('order'=>'first_name,last_name')),'id','fullName'),array('nowrapper'=>true,'empty'=>'- Please select -'))?></td>
		</tr>
		<tr><td>3. CONSENT</td></tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('consent_signed_physician')?></td>
			<td><?php echo $form->checkBox($element,'consent_signed_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'consent_signed_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'consent_signed_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('type_of_surgery_physician')?></td>
			<td><?php echo $form->checkBox($element,'type_of_surgery_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'type_of_surgery_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'type_of_surgery_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr><td>4. OPERATIVE EYE(S) MARKED</td></tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('no_signs_of_infection_physician')?></td>
			<td><?php echo $form->checkBox($element,'no_signs_of_infection_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'no_signs_of_infection_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'no_signs_of_infection_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('marked_with_x_physician')?></td>
			<td><?php echo $form->checkBox($element,'marked_with_x_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'marked_with_x_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'marked_with_x_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('allergies_physician')?></td>
			<td><?php echo $form->checkBox($element,'allergies_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'allergies_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'allergies_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('preop_drops_physician')?></td>
			<td><?php echo $form->checkBox($element,'preop_drops_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'preop_drops_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'preop_drops_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('weight_kg_physician')?></td>
			<td><?php echo $form->checkBox($element,'weight_kg_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'weight_kg_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'weight_kg_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr><td>8. LAB WORK & EKG</td></tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('lab_hgb_physician')?></td>
			<td><?php echo $form->checkBox($element,'lab_hgb_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'lab_hgb_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'lab_hgb_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('diagnostics_ordered_physician')?></td>
			<td><?php echo $form->checkBox($element,'diagnostics_ordered_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'diagnostics_ordered_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'diagnostics_ordered_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('reviewed_physician')?></td>
			<td><?php echo $form->checkBox($element,'reviewed_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'reviewed_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'reviewed_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('iol_measurements_physician')?></td>
			<td><?php echo $form->checkBox($element,'iol_measurements_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'iol_measurements_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'iol_measurements_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr><td>10. NPO</td></tr>
		<tr>
			<td style="padding-left: 20px;"><?php echo $element->getAttributeLabel('time_last_ate_time')?>: <?php echo $form->textField($element,'time_last_ate_time',array('size'=>6,'nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'time_last_ate_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'time_last_ate_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'time_last_ate_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('dentures_etc_physician')?></td>
			<td><?php echo $form->checkBox($element,'dentures_etc_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'dentures_etc_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'dentures_etc_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('systemic_diseases_physician')?></td>
			<td><?php echo $form->checkBox($element,'systemic_diseases_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'systemic_diseases_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'systemic_diseases_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('medications_physician')?></td>
			<td><?php echo $form->checkBox($element,'medications_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'medications_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'medications_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
		<tr>
			<td><?php echo $element->getAttributeLabel('urine_passed_physician')?></td>
			<td><?php echo $form->checkBox($element,'urine_passed_physician',array('nowrapper'=>true))?></td>
			<td><?php echo $form->checkBox($element,'urine_passed_nurse',array('nowrapper'=>true))?></td>
			<td><?php echo $form->textField($element,'urine_passed_comments',array('nowrapper'=>true,'class'=>'textInput'))?></td>
		</tr>
	</table>

	<img id="notreadySign" class="nice" src="<?php echo $this->assetPath?>/img/notready.gif" style="width:600px;display:<?php echo $element->isReady() ? 'none' : 'block'?>;margin-top:20px;margin-left:200px;" />
	<img id="readySign" class="nice" src="<?php echo $this->assetPath?>/img/ready.gif" style="width:600px;display:<?php echo $element->isReady() ? 'block' : 'none'?>;margin-top:20px;margin-left:200px;" />
</div>
