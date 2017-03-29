<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortname')->textInput(['maxlength' => true])->hint('Ingrese clave del curso')->label('Clave del curso') ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true])->hint('Ingrese nombre del curso')->label('Nombre del curso') ?>



    <?php if(!$model->isNewRecord)
            echo $form->field($model, 'status')->checkbox();
     ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Crear') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
