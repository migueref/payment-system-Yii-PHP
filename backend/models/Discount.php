<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "discount".
 *
 * @property integer $id
 * @property integer $idStudentCourse
 * @property double $total
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property StudentCourse $idStudentCourse0
 */
class Discount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discount';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idStudentCourse', 'status'], 'integer'],
            [['total'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['idStudentCourse'], 'exist', 'skipOnError' => true, 'targetClass' => StudentCourse::className(), 'targetAttribute' => ['idStudentCourse' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idStudentCourse' => 'Id Student Course',
            'total' => 'Total',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStudentCourse0()
    {
        return $this->hasOne(StudentCourse::className(), ['id' => 'idStudentCourse']);
    }
}
