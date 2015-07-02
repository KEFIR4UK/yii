<?php

class m150630_090650_create_news_category_table extends CDbMigration
{
	public function up()
	{
      $this->createTable('news_category',array(
		'id' 	   => 'pk',
		'ordering' => 'int NOT NULL',
		'title'	   => 'varchar(255)'

		));

		$this->createTable('user',array(
			'id' 	     => 'pk',
			'status'     => 'tinyint(2)',
			'first_name' => 'varchar(255)',
			'last_name'  => 'varchar(255)',
			'email'      =>'varchar(255)',
			'password'   => 'varchar(255)'

		));

		$this->createTable('news',array(
			'id' 			   => 'pk',
			'category_id'      => 'int NULL ',
			'title'	   		   => 'varchar(255)',
			'status'           => 'tinyint',
			'description'      => 'text',
			'pub_date'         => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'

		));
		$this->addForeignKey('FK_news_category','news','category_id','news_category','id');



	}

	public function down()
	{
		$this->dropTable('news_category');
		$this->dropTable('news');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
