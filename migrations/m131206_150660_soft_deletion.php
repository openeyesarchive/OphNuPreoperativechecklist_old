<?php

class m131206_150660_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophnupreoperative_checks','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophnupreoperative_checks_pre_op_drops_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophnupreoperative_checks','deleted');
		$this->dropColumn('et_ophnupreoperative_checks_version','deleted');
		$this->dropColumn('et_ophnupreoperative_checks_pre_op_drops','deleted');
		$this->dropColumn('et_ophnupreoperative_checks_pre_op_drops_version','deleted');
	}
}
