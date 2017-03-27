<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "student_course".
 *
 * @property integer $id
 * @property integer $idStudent
 * @property integer $idCourse
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Discount[] $discounts
 * @property Course $idCourse0
 * @property Student $idStudent0
 */
class Student_course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudent', 'idCourse', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['idCourse'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['idCourse' => 'id']],
            [['idStudent'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['idStudent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idStudent' => 'Id Student',
            'idCourse' => 'Id Course',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscounts()
    {
        return $this->hasMany(Discount::className(), ['idStudentCourse' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCourse0()
    {
        return $this->hasOne(Course::className(), ['id' => 'idCourse']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudent0()
    {
        return $this->hasOne(Student::className(), ['id' => 'idStudent']);
    }
}
