<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTuition')->textInput()->hint('Please enter your name')->label('idMatrícula') ?>

    <?= $form->field($model, 'tuition_number')->textInput(['maxlength' => true])->hint('Número de matrícula')->label('Matrícula') ?>

    <?= $form->field($model, 'subtotal')->textInput()->hint('Ingrese total sin descuentos o recargos')->label('Subtotal') ?>

    <?= $form->field($model, 'discount')->textInput()->label('Descuento') ?>

    <?= $form->field($model, 'extra_charges')->textInput()->label('Cargos extra') ?>

    <?= $form->field($model, 'total')->textInput()->label('Total') ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true])->label('Tipo') ?>

    <?= $form->field($model, 'voucher_number')->textInput(['maxlength' => true])->label('Número de comprobante') ?>

    <?= $form->field($model, 'payment_method')->textInput(['maxlength' => true])->label('Método de pago') ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'idUser')->textInput()->label('Usuario') ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
