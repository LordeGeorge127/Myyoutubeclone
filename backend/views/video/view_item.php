<?php
/** @var $model \common\models\Video */
?>

<div class="media">
        <div class="embed-responsive embed-responsive-16by9 " >
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink()?>"
                   src="<?php echo $model->getVideoLink()?>"
            ></video>
        </div>
    <div class="media-body">
        <a href="<?php echo \yii\helpers\Url::to(['/video/update','video_id'=>$model->video_id])?>">
        <h6 class="mt-0" style=""><?php echo $model->title ?> </h6>
        </a>
        <hr>
            <?php echo \yii\helpers\StringHelper::truncateWords($model->description,10)?>

    </div>
</div>