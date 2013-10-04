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
<tr>
	<td><?php echo CHtml::dropDownList('Medication[]',$assignment->drop_id,CHtml::listData(OphNuPreoperativechecklist_Checks_PreOpDrops::model()->findAll(array('order'=>'display_order')),'id','name'),array('empty'=>'- Please select -'))?></td>
	<td><?php echo CHtml::dropDownList('Site[]',$assignment->side_id,CHtml::listData(Eye::model()->findAll(array('order'=>'display_order')),'id','name'),array('empty'=>'- Please select -'))?></td>
	<td><?php echo CHtml::textField('Amount[]',$assignment->dose,array('size'=>15))?></td>
	<td><?php echo CHtml::textField('Time[]',$assignment->time,array('size'=>6))?></td>
	<td><?php echo CHtml::dropDownList('Givenby[]',$assignment->given_by_id,CHtml::listData(User::model()->findAllByLabel('Ophthalmic Nurse'),'id','fullName'),array('empty'=>'- Please select -'))?></td>
	<td><a class="removeMedication" href="#">remove</a><input type="hidden" name="AssignmentID[]" value="<?php echo $assignment->id?>" /></td>
</tr>
