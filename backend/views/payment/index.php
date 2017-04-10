<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Payments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

    <h1>Registro de pago</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar pago'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'label' => 'Colegiatura',
              'attribute' => 'idTuition',
              'value'=> 'idTuition'
            ],
            [
              'label' => 'Matrícula',
              'attribute' => 'tuition_number',
              'value'=> 'tuition_number'
            ],
            'subtotal',
            [
              'label' => 'Descuento',
              'attribute' => 'discount',
              'value'=> 'discount'
            ],
            [
              'label' => 'Extra',
              'attribute' => 'extra_charges',
              'value'=> 'extra_charges'
            ],
            'total',
            // 'type',
            // 'voucher_number',
            // 'payment_method',
            // 'comment:ntext',
            // 'idUser',
            // 'created_at',
            [
              'label' => 'Última actualización',
              'attribute' => 'updated_at',
              'value'=> 'updated_at'
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
