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

	<?php echo $form->checkBox($element, 'consent_signed')?>
	<?php echo $form->checkBox($element, 'name_band_present')?>
	<?php echo $form->checkBox($element, 'eye_marked')?>
	<?php echo $form->checkBox($element, 'verbal_confirmation')?>
	<?php echo $form->textField($element, 'last_time_npo', array('size' => '10','maxlength' => '100'))?>
	<?php echo $form->textField($element, 'iol', array('size' => '10','maxlength' => '20'))?>
	<?php echo $form->textField($element, 'refractive_outcome', array('size' => '10','maxlength' => '6'))?>
	<?php echo $form->dropDownListNoPost('pre_op_drops', CHtml::listData(Element_OphNuPreoperativechecklist_Checks_PreOpDrops::model()->notDeleted()->findAll(),'id','name'),'',array('empty'=>'- Pre op drops -','class'=>'populate_textarea'))?>
	<?php echo $form->textArea($element, 'pre_op_drops', array('rows' => 2, 'cols' => 80))?>
<!-- 	<?php echo $form->radioBoolean($element, 'proceed')?> -->
	<?php echo $form->hiddenInput($element, 'proceed', $element->proceed)?>

	<img id="notreadySign" class="nice" src="<?php echo $this->assetPath?>/img/notready.gif" style="width:600px;display:block;margin-top:20px;margin-left:200px;">
	<img id="readySign" class="nice" src="<?php echo $this->assetPath?>/img/ready.gif" style="width:600px;display:none;margin-top:20px;margin-left:200px;">
	
</div>
