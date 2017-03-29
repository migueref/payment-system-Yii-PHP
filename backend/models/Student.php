<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property string $registration_number
 * @property string $enrollment_status
 * @property integer $idUser
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property User $idUser0
 * @property StudentCourse[] $studentCourses
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUser', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['registration_number', 'enrollment_status'], 'string', 'max' => 45],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registration_number' => 'Registration Number',
            'enrollment_status' => 'Enrollment Status',
            'idUser' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourses()
    {
        return $this->hasMany(StudentCourse::className(), ['idStudent' => 'id']);
    }
    public function beforeSave($insert){
      if ($this->isNewRecord)
        $this->created_at = new \yii\db\Expression('NOW()');
      $this->updated_at = new \yii\db\Expression('NOW()');
      parent::beforeSave($insert);
      return true;
    }
}
