<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\video $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

  <div class="row">
      <div class="col-sm-8">
          <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'description')->textInput() ?>

          <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
      </div>

      <div class="col-sm-4">
          <div class="embed-responsive embed-responsive-16by9">
              <video class="embed-responsive-item"
                     src="<?php echo $model->getVideoLink()?>"
                      controls></video>
          </div>
          <div class="mb-3">
              <div class="text-muted">Videolink </div>
              <a href="<?php echo $model->getVideoLink()?>">openLink</a>

          </div>
          <div class="mb-3">
              <div class="text-muted">VideoName</div>
              <?php echo $model->video_name ?>
          </div>
          <?= $form->field($model, 'status')->dropdownList($model->getStatusLabels()) ?>
      </div>
  </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
