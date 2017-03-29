<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'label' => 'Matrícula',
              'attribute' => 'registration_number',
              'value'=> 'registration_number'
            ],
            [
              'label' => 'Estado',
              'attribute' => 'enrollment_status',
              'value'=> 'enrollment_status'
            ],
            [
              'label' => 'Usuario',
              'attribute' => 'idUser',
              'value'=> 'idUser'
            ],
            [
              'label' => 'Fecha de creación ',
              'attribute' => 'created_at',
              'value'=> 'created_at'
            ],
            [
              'label' => 'Última actualización',
              'attribute' => 'updated_at',
              'value'=> 'updated_at'
            ],
            // 'updated_at',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
