
<?php

/** @var yii\web\View $this */
/** @var \yii\data\ActiveDataProvider $dataProvider */


$this->title = 'My Yii Application';
?>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider'=>$dataProvider,
    'itemOptions'=> [
        'tag'=>false
    ],
    'itemView'=>'_video_item','layout'=>'<div class="d-flex">{items}</div>{pager}',

])?>
