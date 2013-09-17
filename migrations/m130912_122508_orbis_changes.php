<?php

class m130912_122508_orbis_changes extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_checks','admit_to_hospital_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','admit_to_hospital_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','site_id','int(10) unsigned NULL');
		$this->createIndex('et_ophnupreoperative_checks_site_id_fk','et_ophnupreoperative_checks','site_id');
		$this->addForeignKey('et_ophnupreoperative_checks_site_id_fk','et_ophnupreoperative_checks','site_id','site','id');
		$this->addColumn('et_ophnupreoperative_checks','minor_treatment','tinyint(1) unsigned NOT NULL');

		$this->renameColumn('et_ophnupreoperative_checks','name_band_present','name_band_present_physician');
		$this->addColumn('et_ophnupreoperative_checks','name_band_present_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','name_band_present_comments','text COLLATE utf8_bin NOT NULL');

		$this->renameColumn('et_ophnupreoperative_checks','verbal_confirmation','verbal_confirmation_physician');
		$this->addColumn('et_ophnupreoperative_checks','verbal_confirmation_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','verbal_confirmation_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','attendant_id','int(10) unsigned NULL');
		$this->createIndex('et_ophnupreoperative_checks_attendant_id_fk','et_ophnupreoperative_checks','attendant_id');
		$this->addForeignKey('et_ophnupreoperative_checks_attendant_id_fk','et_ophnupreoperative_checks','attendant_id','user','id');
		$this->addColumn('et_ophnupreoperative_checks','name_of_attendant_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','name_of_attendant_nurse','tinyint(1) unsigned NOT NULL');

		$this->renameColumn('et_ophnupreoperative_checks','consent_signed','consent_signed_physician');
		$this->addColumn('et_ophnupreoperative_checks','consent_signed_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','consent_signed_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','type_of_surgery_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','type_of_surgery_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','type_of_surgery_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','no_signs_of_infection_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','no_signs_of_infection_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','no_signs_of_infection_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','marked_with_x_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','marked_with_x_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','marked_with_x_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','allergies_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','allergies_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','allergies_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','preop_drops_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','preop_drops_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','preop_drops_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','weight_kg_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','weight_kg_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','weight_kg_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','lab_hgb_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','lab_hgb_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','lab_hgb_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','diagnostics_ordered_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','diagnostics_ordered_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','diagnostics_ordered_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','reviewed_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','reviewed_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','reviewed_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','iol_measurements_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','iol_measurements_nurse','tinyint(1) unsigned NOT NULL');
		$this->renameColumn('et_ophnupreoperative_checks','iol','iol_measurements_comments');

		$this->addColumn('et_ophnupreoperative_checks','time_last_ate_time','time NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','time_last_ate_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','time_last_ate_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','time_last_ate_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','dentures_etc_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','dentures_etc_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','dentures_etc_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','systemic_diseases_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','systemic_diseases_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','systemic_diseases_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','medications_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','medications_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','medications_comments','text COLLATE utf8_bin NOT NULL');

		$this->addColumn('et_ophnupreoperative_checks','urine_passed_physician','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','urine_passed_nurse','tinyint(1) unsigned NOT NULL');
		$this->addColumn('et_ophnupreoperative_checks','urine_passed_comments','text COLLATE utf8_bin NOT NULL');

		$this->dropForeignKey('et_ophnupreoperative_checks_pre_op_drops_lmui_fk','et_ophnupreoperative_checks_pre_op_drops');
		$this->dropIndex('et_ophnupreoperative_checks_pre_op_drops_lmui_fk','et_ophnupreoperative_checks_pre_op_drops');
		$this->dropForeignKey('et_ophnupreoperative_checks_pre_op_drops_cui_fk','et_ophnupreoperative_checks_pre_op_drops');
		$this->dropIndex('et_ophnupreoperative_checks_pre_op_drops_cui_fk','et_ophnupreoperative_checks_pre_op_drops');

		$this->renameTable('et_ophnupreoperative_checks_pre_op_drops','ophnupreoperative_checks_pre_op_drops');

		$this->createIndex('ophnupreoperative_checks_pre_op_drops_lmui_fk','ophnupreoperative_checks_pre_op_drops','last_modified_user_id');
		$this->addForeignKey('ophnupreoperative_checks_pre_op_drops_lmui_fk','ophnupreoperative_checks_pre_op_drops','last_modified_user_id','user','id');
		$this->createIndex('ophnupreoperative_checks_pre_op_drops_cui_fk','ophnupreoperative_checks_pre_op_drops','created_user_id');
		$this->addForeignKey('ophnupreoperative_checks_pre_op_drops_cui_fk','ophnupreoperative_checks_pre_op_drops','created_user_id','user','id');

		$this->createTable('ophnupreoperative_checks_pre_op_drops_assignment', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'element_id' => 'int(10) unsigned NOT NULL',
				'drop_id' => 'int(10) unsigned NOT NULL',
				'side_id' => 'int(10) unsigned NOT NULL',
				'dose' => 'varchar(64) COLLATE utf8_bin NOT NULL',
				'time' => 'time NOT NULL',
				'given_by_id' => 'int(10) unsigned NOT NULL',
				'display_order' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_lmui_fk` (`last_modified_user_id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_cui_fk` (`created_user_id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_ele_fk` (`element_id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_dro_fk` (`drop_id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_sid_fk` (`side_id`)',
				'KEY `ophnupreoperative_checks_pre_op_drops_assgn_giv_fk` (`given_by_id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_ele_fk` FOREIGN KEY (`element_id`) REFERENCES `et_ophnupreoperative_checks` (`id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_dro_fk` FOREIGN KEY (`drop_id`) REFERENCES `ophnupreoperative_checks_pre_op_drops` (`id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_sid_fk` FOREIGN KEY (`side_id`) REFERENCES `eye` (`id`)',
				'CONSTRAINT `ophnupreoperative_checks_pre_op_drops_assgn_giv_fk` FOREIGN KEY (`given_by_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin');

		$this->dropColumn('et_ophnupreoperative_checks','proceed');
	}

	public function down()
	{
		$this->addColumn('et_ophnupreoperative_checks','proceed',"tinyint(1) unsigned NOT NULL DEFAULT '0'");

		$this->dropTable('ophnupreoperative_checks_pre_op_drops_assignment');

		$this->dropForeignKey('ophnupreoperative_checks_pre_op_drops_cui_fk','ophnupreoperative_checks_pre_op_drops');
		$this->dropIndex('ophnupreoperative_checks_pre_op_drops_cui_fk','ophnupreoperative_checks_pre_op_drops');
		$this->dropForeignKey('ophnupreoperative_checks_pre_op_drops_lmui_fk','ophnupreoperative_checks_pre_op_drops');
		$this->dropIndex('ophnupreoperative_checks_pre_op_drops_lmui_fk','ophnupreoperative_checks_pre_op_drops');

		$this->renameTable('ophnupreoperative_checks_pre_op_drops','et_ophnupreoperative_checks_pre_op_drops');

		$this->createIndex('et_ophnupreoperative_checks_pre_op_drops_cui_fk','et_ophnupreoperative_checks_pre_op_drops','created_user_id');
		$this->addForeignKey('et_ophnupreoperative_checks_pre_op_drops_cui_fk','et_ophnupreoperative_checks_pre_op_drops','created_user_id','user','id');
		$this->createIndex('et_ophnupreoperative_checks_pre_op_drops_lmui_fk','et_ophnupreoperative_checks_pre_op_drops','last_modified_user_id');
		$this->addForeignKey('et_ophnupreoperative_checks_pre_op_drops_lmui_fk','et_ophnupreoperative_checks_pre_op_drops','last_modified_user_id','user','id');

		$this->dropColumn('et_ophnupreoperative_checks','urine_passed_comments');
		$this->dropColumn('et_ophnupreoperative_checks','urine_passed_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','urine_passed_physician');
		$this->dropColumn('et_ophnupreoperative_checks','medications_comments');
		$this->dropColumn('et_ophnupreoperative_checks','medications_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','medications_physician');
		$this->dropColumn('et_ophnupreoperative_checks','systemic_diseases_comments');
		$this->dropColumn('et_ophnupreoperative_checks','systemic_diseases_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','systemic_diseases_physician');
		$this->dropColumn('et_ophnupreoperative_checks','dentures_etc_comments');
		$this->dropColumn('et_ophnupreoperative_checks','dentures_etc_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','dentures_etc_physician');
		$this->dropColumn('et_ophnupreoperative_checks','time_last_ate_comments');
		$this->dropColumn('et_ophnupreoperative_checks','time_last_ate_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','time_last_ate_physician');
		$this->dropColumn('et_ophnupreoperative_checks','time_last_ate_time');
		$this->renameColumn('et_ophnupreoperative_checks','iol_measurements_comments','iol');
		$this->dropColumn('et_ophnupreoperative_checks','iol_measurements_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','iol_measurements_physician');
		$this->dropColumn('et_ophnupreoperative_checks','reviewed_comments');
		$this->dropColumn('et_ophnupreoperative_checks','reviewed_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','reviewed_physician');
		$this->dropColumn('et_ophnupreoperative_checks','diagnostics_ordered_comments');
		$this->dropColumn('et_ophnupreoperative_checks','diagnostics_ordered_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','diagnostics_ordered_physician');
		$this->dropColumn('et_ophnupreoperative_checks','lab_hgb_comments');
		$this->dropColumn('et_ophnupreoperative_checks','lab_hgb_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','lab_hgb_physician');
		$this->dropColumn('et_ophnupreoperative_checks','weight_kg_comments');
		$this->dropColumn('et_ophnupreoperative_checks','weight_kg_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','weight_kg_physician');
		$this->dropColumn('et_ophnupreoperative_checks','preop_drops_comments');
		$this->dropColumn('et_ophnupreoperative_checks','preop_drops_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','preop_drops_physician');
		$this->dropColumn('et_ophnupreoperative_checks','allergies_comments');
		$this->dropColumn('et_ophnupreoperative_checks','allergies_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','allergies_physician');
		$this->dropColumn('et_ophnupreoperative_checks','marked_with_x_comments');
		$this->dropColumn('et_ophnupreoperative_checks','marked_with_x_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','marked_with_x_physician');
		$this->dropColumn('et_ophnupreoperative_checks','no_signs_of_infection_comments');
		$this->dropColumn('et_ophnupreoperative_checks','no_signs_of_infection_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','no_signs_of_infection_physician');
		$this->dropColumn('et_ophnupreoperative_checks','type_of_surgery_comments');
		$this->dropColumn('et_ophnupreoperative_checks','type_of_surgery_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','type_of_surgery_physician');
		$this->dropColumn('et_ophnupreoperative_checks','consent_signed_comments');
		$this->dropColumn('et_ophnupreoperative_checks','consent_signed_nurse');
		$this->renameColumn('et_ophnupreoperative_checks','consent_signed_physician','consent_signed');
		$this->dropColumn('et_ophnupreoperative_checks','name_of_attendant_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','name_of_attendant_physician');
		$this->dropForeignKey('et_ophnupreoperative_checks_attendant_id_fk','et_ophnupreoperative_checks');
		$this->dropIndex('et_ophnupreoperative_checks_attendant_id_fk','et_ophnupreoperative_checks');
		$this->dropColumn('et_ophnupreoperative_checks','attendant_id');
		$this->dropColumn('et_ophnupreoperative_checks','verbal_confirmation_comments');
		$this->dropColumn('et_ophnupreoperative_checks','verbal_confirmation_nurse');
		$this->renameColumn('et_ophnupreoperative_checks','verbal_confirmation_physician','verbal_confirmation');
		$this->dropColumn('et_ophnupreoperative_checks','name_band_present_comments');
		$this->dropColumn('et_ophnupreoperative_checks','name_band_present_nurse');
		$this->renameColumn('et_ophnupreoperative_checks','name_band_present_physician','name_band_present');
		$this->dropColumn('et_ophnupreoperative_checks','minor_treatment');
		$this->dropForeignKey('et_ophnupreoperative_checks_site_id_fk','et_ophnupreoperative_checks');
		$this->dropIndex('et_ophnupreoperative_checks_site_id_fk','et_ophnupreoperative_checks');
		$this->dropColumn('et_ophnupreoperative_checks','site_id');
		$this->dropColumn('et_ophnupreoperative_checks','admit_to_hospital_nurse');
		$this->dropColumn('et_ophnupreoperative_checks','admit_to_hospital_physician');
	}
}
