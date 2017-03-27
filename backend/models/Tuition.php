<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tuition".
 *
 * @property integer $id
 * @property integer $idCourse
 * @property double $total
 * @property string $tuition_status
 * @property string $month
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Course $idCourse0
 */
class Tuition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tuition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCourse', 'status'], 'integer'],
            [['total'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['tuition_status', 'month'], 'string', 'max' => 45],
            [['idCourse'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['idCourse' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCourse' => 'Id Course',
            'total' => 'Total',
            'tuition_status' => 'Tuition Status',
            'month' => 'Month',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCourse0()
    {
        return $this->hasOne(Course::className(), ['id' => 'idCourse']);
    }
}
