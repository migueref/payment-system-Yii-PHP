<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property integer $id
 * @property integer $idTuition
 * @property string $tuition_number
 * @property double $subtotal
 * @property double $discount
 * @property double $extra_charges
 * @property double $total
 * @property string $type
 * @property string $voucher_number
 * @property string $payment_method
 * @property string $comment
 * @property integer $idUser
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property Bill[] $bills
 * @property User $idUser0
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTuition', 'idUser', 'status'], 'integer'],
            [['subtotal', 'discount', 'extra_charges', 'total'], 'number'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['tuition_number', 'type', 'voucher_number', 'payment_method'], 'string', 'max' => 45],
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
            'idTuition' => 'Id Tuition',
            'tuition_number' => 'Tuition Number',
            'subtotal' => 'Subtotal',
            'discount' => 'Discount',
            'extra_charges' => 'Extra Charges',
            'total' => 'Total',
            'type' => 'Type',
            'voucher_number' => 'Voucher Number',
            'payment_method' => 'Payment Method',
            'comment' => 'Comment',
            'idUser' => 'Id User',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBills()
    {
        return $this->hasMany(Bill::className(), ['idPayment' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
    public function beforeSave($insert){
      if ($this->isNewRecord)
        $this->created_at = new \yii\db\Expression('NOW()');
      $this->updated_at = new \yii\db\Expression('NOW()');
      parent::beforeSave($insert);
      return true;
    }
}
