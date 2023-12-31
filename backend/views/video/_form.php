<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\video $model */
/** @var yii\bootstrap4\ActiveForm $form */
\backend\assets\TagsInputAsset::register($this);
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

  <div class="row">
      <div class="col-sm-8">
          <?php echo $form->errorSummary($model) ?>

          <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'description')->textarea(['rows'=> 6]) ?>

         <div class="form-group">
             <label><?php echo $model->getAttributeLabel('thumbnail')?></label>
             <div class="custom-file">
                 <input type="file" class="custom-file-input"
                        id="thumbnail" name="thumbnail">
                 <label for="thumbnail" class="custom-file-label">Choose file</label>
             </div>
         </div>

          <?= $form->field($model, 'tags',
          ['inputOptions'=>['data-role'=>'tagsinput']]
          )->textInput(['maxlength' => true]) ?>
      </div>

      <div class="col-sm-4">
          <div class="embed-responsive embed-responsive-16by9">
              <video class="embed-responsive-item"
                     poster="<?php echo $model->getThumbnailLink()?>"
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
