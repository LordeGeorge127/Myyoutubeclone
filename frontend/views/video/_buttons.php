<?php
/**
 * @var $model \common\models\Video
 */
?>
<a href="<?php echo \yii\helpers\Url::to(['/video/like','video_id'=>$model->video_id]) ?>"
   class="btn btn-sm <?php echo $model->isLikedBy(Yii::$app->user->id)   ? 'btn-outline-primary' : 'btn-outline-secondary'?>"
   data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-up"><?php echo $model->getLikes()->count() ?></i>
</a>
<a href="<?php echo \yii\helpers\Url::to(['/video/dislike','video_id'=>$model->video_id]) ?>"
   class="btn btn-sm <?php echo $model->isDisLikedBy(Yii::$app->user->id)   ? 'btn-outline-primary' : 'btn-outline-secondary'?>"
   data-method="post" data-pjax="1">
    <i class="fas fa-thumbs-down"><?php echo $model->getDislikes()->count() ?></i>
</a>

