<?php

namespace frontend\controllers;

use common\models\Video;
use common\models\VideoLike;
use common\models\VideoView;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use function Symfony\Component\String\b;

class VideoController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['like','dislike'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles' => ['@']
                    ]
                ]
            ],
            'verb'=>[
                'class'=>VerbFilter::class,
                'actions'=> [
                    'like'=>['post'],
                    'dislike'=>['post'],
                ]

            ]
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query'=>Video::find()->published()
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);
    }
    public function actionView($video_id)
    {
        $this->layout = 'auth';
        $video =$this->findVideo($video_id);
        $videoView = new VideoView();
        $videoView->video_id = $video_id;
       $videoView->user_id = \Yii::$app->user->id;
//        var_dump( $videoView->user->id);
        $videoView->created_at = time();
        $videoView->save();
        return $this->render('view',['model'=>$video]);
    }
    public function actionLike($video_id)
    {
        $video = $this->findVideo($video_id);
        $userId = \Yii::$app->user->id;
        $videoLikeDislike = VideoLike::find()->
            userIdVideoId($userId,$video_id)
            ->one();
        if(!$videoLikeDislike)
        {
            $this->saveLikeDislike($video_id,$userId,VideoLike::LIKE_TYPE);
        }else if($videoLikeDislike->type == VideoLike::LIKE_TYPE)
        {
            $videoLikeDislike->delete();
        }
        else{
            $videoLikeDislike->delete();
            $this->saveLikeDislike($video_id,$userId,VideoLike::LIKE_TYPE);

        }
       return $this->renderAjax('_buttons',[
           'model'=>$video
       ]);

    }
    public function actionDislike($video_id)
    {
        $video = $this->findVideo($video_id);
        $userId = \Yii::$app->user->id;
        $videoLikeDislike = VideoLike::find()->
        userIdVideoId($userId,$video_id)
            ->one();
        if(!$videoLikeDislike)
        {
            $this->saveLikeDislike($video_id,$userId,VideoLike::DISLIKE_TYPE);
        }else if($videoLikeDislike->type == VideoLike::DISLIKE_TYPE)
        {
            $videoLikeDislike->delete();
        }
        else{
            $videoLikeDislike->delete();
            $this->saveLikeDislike($video_id,$userId,VideoLike::DISLIKE_TYPE);

        }
        return $this->renderAjax('_buttons',[
            'model'=>$video
        ]);

    }
    protected function findVideo($video_id)
    {
        $video = Video::findOne($video_id);
        if (!$video)
        {
            throw new NotFoundHttpException("Video does not exist");
        }
        return $video;
    }
    protected  function saveLikeDislike($video_id,$userId,$type)
    {
        $videoLikeDislike = new VideoLike();
        $videoLikeDislike->video_id = $video_id;
        $videoLikeDislike->user_id = $userId;
        $videoLikeDislike->type = $type;
        $videoLikeDislike->created_at = time();
        $videoLikeDislike->save();
    }
}