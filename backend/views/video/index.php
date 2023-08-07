<?php

use common\models\video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'video_id',
                'content' => function ($model){
                return $this->render('view_item',['model' => $model]);
                }],
            'title',
            [ 'attribute'=> 'status',
                'content' => function($model){
                return $model->getStatusLabels()[$model->status];
                }
            ],
            //'has_thumbnail',
            //'video_name',
            'created_at:datetime',
            'updated_at:datetime',
            //'created_by',
//            [
//                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, video $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'video_id' => $model->video_id]);
//                 }
//            ],
                [
                        'class' => ActionColumn::className(),
                        'buttons'=>[
                                'delete'=>function($url,$model){
                                $url = ['delete','video_id'=>$model->video_id];
                                    return Html::a('Delete',$url,[
                                            'data-method'=>'post',
                                        'data-confirm'=>'Are you sure you want to delete this video?'
                                    ]);
                                }
                        ]

                ]
        ],
    ]); ?>


</div>
