<?php

class m131205_133806_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophnupreoperative_checks_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`event_id` int(10) unsigned NOT NULL,
	`consent_signed` tinyint(1) unsigned NOT NULL,
	`name_band_present` tinyint(1) unsigned NOT NULL,
	`eye_marked` tinyint(1) unsigned NOT NULL,
	`verbal_confirmation` tinyint(1) unsigned NOT NULL,
	`last_time_npo` varchar(100) COLLATE utf8_bin DEFAULT '',
	`iol` varchar(20) COLLATE utf8_bin DEFAULT '',
	`refractive_outcome` decimal(4,2) NOT NULL,
	`pre_op_drops` text COLLATE utf8_bin NOT NULL,
	`proceed` tinyint(1) unsigned NOT NULL DEFAULT '0',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophnupreoperative_checks_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophnupreoperative_checks_cui_fk` (`created_user_id`),
	KEY `acv_et_ophnupreoperative_checks_ev_fk` (`event_id`),
	CONSTRAINT `acv_et_ophnupreoperative_checks_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnupreoperative_checks_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnupreoperative_checks_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophnupreoperative_checks_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophnupreoperative_checks_version');

		$this->createIndex('et_ophnupreoperative_checks_aid_fk','et_ophnupreoperative_checks_version','id');
		$this->addForeignKey('et_ophnupreoperative_checks_aid_fk','et_ophnupreoperative_checks_version','id','et_ophnupreoperative_checks','id');

		$this->addColumn('et_ophnupreoperative_checks_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophnupreoperative_checks_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophnupreoperative_checks_version','version_id');
		$this->alterColumn('et_ophnupreoperative_checks_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->execute("
CREATE TABLE `et_ophnupreoperative_checks_pre_op_drops_version` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(128) COLLATE utf8_bin NOT NULL,
	`display_order` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
	PRIMARY KEY (`id`),
	KEY `acv_et_ophnupreoperative_checks_pre_op_drops_lmui_fk` (`last_modified_user_id`),
	KEY `acv_et_ophnupreoperative_checks_pre_op_drops_cui_fk` (`created_user_id`),
	CONSTRAINT `acv_et_ophnupreoperative_checks_pre_op_drops_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_et_ophnupreoperative_checks_pre_op_drops_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophnupreoperative_checks_pre_op_drops_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophnupreoperative_checks_pre_op_drops_version');

		$this->createIndex('et_ophnupreoperative_checks_pre_op_drops_aid_fk','et_ophnupreoperative_checks_pre_op_drops_version','id');
		$this->addForeignKey('et_ophnupreoperative_checks_pre_op_drops_aid_fk','et_ophnupreoperative_checks_pre_op_drops_version','id','et_ophnupreoperative_checks_pre_op_drops','id');

		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophnupreoperative_checks_pre_op_drops_version','version_id');
		$this->alterColumn('et_ophnupreoperative_checks_pre_op_drops_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');

		$this->addColumn('et_ophnupreoperative_checks','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_checks','deleted');
		$this->dropColumn('et_ophnupreoperative_checks_pre_op_drops','deleted');

		$this->dropTable('et_ophnupreoperative_checks_version');
		$this->dropTable('et_ophnupreoperative_checks_pre_op_drops_version');
	}
}
