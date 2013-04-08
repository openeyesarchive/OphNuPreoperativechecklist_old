<?php 
class m130327_153753_event_type_OphNuPreoperativechecklist extends CDbMigration
{
	public function up() {

		// --- EVENT TYPE ENTRIES ---

		// create an event_type entry for this event type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperativechecklist'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Nursing'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphNuPreoperativechecklist', 'name' => 'Preoperative Checklist','event_group_id' => $group['id']));
		}
		// select the event_type id for this event type name
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperativechecklist'))->queryRow();

		// --- ELEMENT TYPE ENTRIES ---

		// create an element_type entry for this element type name if one doesn't already exist
		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Checks',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Checks','class_name' => 'Element_OphNuPreoperativechecklist_Checks', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}
		// select the element_type_id for this element type name
		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Checks'))->queryRow();

		// element lookup table et_ophnupreoperative_checks_pre_op_drops
		$this->createTable('et_ophnupreoperative_checks_pre_op_drops', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'name' => 'varchar(128) COLLATE utf8_bin NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_checks_pre_op_drops_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_checks_pre_op_drops_cui_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophnupreoperative_checks_pre_op_drops_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_checks_pre_op_drops_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->insert('et_ophnupreoperative_checks_pre_op_drops',array('name'=>'G. Tropicamide 1% stat','display_order'=>1));
		$this->insert('et_ophnupreoperative_checks_pre_op_drops',array('name'=>'G. Cyclopentolate 1% stat','display_order'=>2));
		$this->insert('et_ophnupreoperative_checks_pre_op_drops',array('name'=>'G. Phenylepherine 2.5% stat','display_order'=>3));



		// create the table for this element type: et_modulename_elementtypename
		$this->createTable('et_ophnupreoperative_checks', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'consent_signed' => 'tinyint(1) unsigned NOT NULL', // Consent signed
				'name_band_present' => 'tinyint(1) unsigned NOT NULL', // Name band present
				'eye_marked' => 'tinyint(1) unsigned NOT NULL', // Eye marked
				'verbal_confirmation' => 'tinyint(1) unsigned NOT NULL', // Verbal confirmation
				'last_time_npo' => 'varchar(100) DEFAULT \'\'', // Last time NPO
				'iol' => 'varchar(20) DEFAULT \'\'', // IOL
				'refractive_outcome' => 'decimal (4, 2) NOT NULL', // Refractive outcome
				'pre_op_drops' => 'text NOT NULL', // Pre op drops
				'proceed' => 'tinyint(1) unsigned NOT NULL DEFAULT 0', // Proceed
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophnupreoperative_checks_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophnupreoperative_checks_cui_fk` (`created_user_id`)',
				'KEY `et_ophnupreoperative_checks_ev_fk` (`event_id`)',
				'CONSTRAINT `et_ophnupreoperative_checks_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_checks_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophnupreoperative_checks_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

	}

	public function down() {
		// --- drop any element related tables ---
		// --- drop element tables ---
		$this->dropTable('et_ophnupreoperative_checks');


		$this->dropTable('et_ophnupreoperative_checks_pre_op_drops');


		// --- delete event entries ---
		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphNuPreoperativechecklist'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		// --- delete entries from element_type ---
		$this->delete('element_type', 'event_type_id='.$event_type['id']);

		// --- delete entries from event_type ---
		$this->delete('event_type', 'id='.$event_type['id']);

		// echo "m000000_000001_event_type_OphNuPreoperativechecklist does not support migration down.\n";
		// return false;
		echo "If you are removing this module you may also need to remove references to it in your configuration files\n";
		return true;
	}
}
?>