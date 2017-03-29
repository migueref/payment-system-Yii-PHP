<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cursos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear curso'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'label' => 'Clave del curso',
              'attribute' => 'shortname',
              'value'=> 'shortname'
            ],
            [
              'label' => 'Nombre',
              'attribute' => 'fullname',
              'value'=> 'fullname'
            ],
            [
              'label' => 'Creado',
              'attribute' => 'created_at',
              'value'=> 'created_at'
            ],
            [
              'label' => 'Última modificación',
              'attribute' => 'updated_at',
              'value'=> 'updated_at'
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
