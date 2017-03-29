<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property integer $id
 * @property integer $idPayment
 * @property string $reference
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Payment $idPayment0
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPayment', 'status'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['reference'], 'string', 'max' => 100],
            [['idPayment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['idPayment' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPayment' => 'Id Payment',
            'reference' => 'Reference',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPayment0()
    {
        return $this->hasOne(Payment::className(), ['id' => 'idPayment']);
    }
    public function beforeSave($insert){
      if ($this->isNewRecord)
        $this->created_at = new \yii\db\Expression('NOW()');
      $this->updated_at = new \yii\db\Expression('NOW()');
      parent::beforeSave($insert);
      return true;
    }
}
