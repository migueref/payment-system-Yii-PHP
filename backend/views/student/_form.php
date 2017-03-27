<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'registration_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enrollment_status')->textInput(['maxlength' => true]) ?>

    <?php
      $students= ArrayHelper::map(User::find()->where(['status'=>10])->orderBy('id')->all(),'id','username');
    ?>
    <?= $form->field($model, 'idUser')->dropDownList($students) ?>



    <?php if(!$model->isNewRecord)
            echo $form->field($model, 'status')->checkbox();
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
