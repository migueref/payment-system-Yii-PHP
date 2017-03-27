<?php

use yii\db\Migration;

class m170326_090406_tuition_payments extends Migration
{
    public function safeUp(){
      $tableOptions = null;
      if ($this->db->driverName === 'mysql') {
          // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
          $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
      }
      //student table
      $this->createTable('{{%student}}',[
        'id'=>$this->primaryKey(),
        'registration_number'=>$this->string(45),
        'enrollment_status'=>$this->string(45),
        'idUser'=>$this->integer(),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      //payment table
      $this->createTable('{{%payment}}',[
        'id'=>$this->primaryKey(),
        'idTuition'=>$this->integer(),
        'tuition_number'=>$this->string(45),
        'subtotal'=>$this->float(),
        'discount'=>$this->float(),
        'extra_charges'=>$this->float(),
        'total'=>$this->float(),
        'type'=>$this->string(45),
        'voucher_number'=>$this->string(45),
        'payment_method'=>$this->string(45),
        'comment'=>$this->text(),
        'idUser'=>$this->integer(),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      //bill table
      $this->createTable('{{%bill}}',[
        'id'=>$this->primaryKey(),
        'idPayment'=>$this->integer(),
        'reference'=>$this->string(100),
        'comment'=>$this->text(),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      //course table
      $this->createTable('{{%course}}',[
        'id'=>$this->primaryKey(),
        'shortname'=>$this->string(50),
        'fullname'=>$this->string(100),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      // tuition table
      $this->createTable('{{%tuition}}',[
        'id'=>$this->primaryKey(),
        'idCourse'=>$this->integer(),
        'total'=>$this->float(),
        'tuition_status'=>$this->string(45),
        'month'=>$this->string(45),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      // Student course table
      $this->createTable('{{%student_course}}',[
        'id'=>$this->primaryKey(),
        'idStudent'=>$this->integer(),
        'idCourse'=>$this->integer(),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);

      //Discount table
      $this->createTable('{{%discount}}',[
        'id'=>$this->primaryKey(),
        'idStudentCourse'=>$this->integer(),
        'total'=>$this->float(),
        'created_at' => $this->date(),
        'updated_at' => $this->date(),
        'status' => $this->smallInteger()->notNull()->defaultValue(1),
      ],$tableOptions);
      //Foreign Keys
      $this->addForeignKey('fk_st_user','student','idUser','user','id');
      $this->addForeignKey('fk_bi_payment','bill','idPayment','payment','id');
      $this->addForeignKey('fk_pa_user','payment','idUser','user','id');
      $this->addForeignKey('fk_st_student','student_course','idStudent','student','id');
      $this->addForeignKey('fk_st_course','student_course','idCourse','course','id');
      $this->addForeignKey('fk_tu_course','tuition','idCourse','course','id');
      $this->addForeignKey('fk_di_stcourse','discount','idStudentCourse','student_course','id');

    }

    public function safeDown(){
      $this->dropTable('{{%user}}');

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
