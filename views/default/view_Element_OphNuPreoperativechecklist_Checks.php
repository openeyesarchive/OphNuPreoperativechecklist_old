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

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('consent_signed'))?></td>
			<td width="45%"><span class="big"><?php echo $element->consent_signed ? '✔' : '✘'?></span></td>
			<td width="40%"><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo $element->consent_signed ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td><?php echo CHtml::encode($element->getAttributeLabel('name_band_present'))?></td>
			<td><span class="big"><?php echo $element->name_band_present ? '✔' : '✘'?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo $element->name_band_present ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td><?php echo CHtml::encode($element->getAttributeLabel('eye_marked'))?></td>
			<td><span class="big"><?php echo $element->eye_marked ? '✔' : '✘'?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo $element->eye_marked ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('verbal_confirmation'))?></td>
			<td><span class="big"><?php echo $element->verbal_confirmation ? '✔' : '✘'?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo $element->verbal_confirmation ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('last_time_npo'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->last_time_npo)?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo strlen($element->last_time_npo) > 0 ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('iol'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->iol)?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo strlen($element->iol) > 0 ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('refractive_outcome'))?></td>
			<td><span class="big"><?php echo $element->refractive_outcome?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo strlen($element->refractive_outcome) > 0 ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr>
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('pre_op_drops'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->pre_op_drops)?></span></td>
			<td><span><img src="<?php echo $this->assetPath?>/img/arrow.gif" style="display:<?php echo strlen($element->pre_op_drops) > 0 ? 'none' : 'inline'?>;width:50px;margin-top:-2px;position:absolute;"></span></td>
		</tr>
		<tr style="display:none;">
			<td width="15%"><?php echo CHtml::encode($element->getAttributeLabel('proceed'))?>:</td>
			<td><span class="big" id="proceed"><?php echo $element->proceed ? 'Yes' : 'No'?></span></td>
			<td></td>
		</tr>
	</tbody>
</table>

<img id="notreadySign" class="nice" src="<?php echo $this->assetPath?>/img/notready.gif" style="width:600px;display:block;margin-top:20px;margin-left:200px;">
<img id="readySign" class="nice" src="<?php echo $this->assetPath?>/img/ready.gif" style="width:600px;display:none;margin-top:20px;margin-left:200px;">

