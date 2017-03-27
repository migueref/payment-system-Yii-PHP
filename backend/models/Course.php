<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $shortname
 * @property string $fullname
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property StudentCourse[] $studentCourses
 * @property Tuition[] $tuitions
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['shortname'], 'string', 'max' => 50],
            [['fullname'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortname' => 'Shortname',
            'fullname' => 'Fullname',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCourses()
    {
        return $this->hasMany(StudentCourse::className(), ['idCourse' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTuitions()
    {
        return $this->hasMany(Tuition::className(), ['idCourse' => 'id']);
    }
    public function beforeSave($insert){
      if ($this->isNewRecord)
        $this->created_at = new \yii\db\Expression('NOW()');
      $this->updated_at = new \yii\db\Expression('NOW()');
      parent::beforeSave($insert);
      return true;
    }
}
