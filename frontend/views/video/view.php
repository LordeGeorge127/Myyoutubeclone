<?php
/** @var $model \common\models\Video */

?>
<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9 " >
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink()?>"
                   src="<?php echo $model->getVideoLink()?>"
                   controls
            ></video>
        </div>
        <h6 class="mt-2"><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-content-center">
            <div> <?php echo $model->getViews()->count() ?> views .
                <?php echo Yii::$app->formatter->asDate($model->created_at) ?></div>
            <div>
              <div>
                  <?php \yii\widgets\Pjax::begin() ?>
                  <?php echo $this->render('_buttons',
                  ['model'=>$model]
                  ) ?>
              </div>
                <?php \yii\widgets\Pjax::end()?>
            </div>
        </div>
    </div>
</div>
