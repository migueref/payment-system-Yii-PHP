<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Student_course */

$this->title = Yii::t('app', 'Create Student Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
