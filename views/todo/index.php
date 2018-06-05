<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Todo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'cat_id',
                'value' => 'category.name',
            ],
            'name',
            
            [
                'attribute' => 'id',
                'label'=> 'Изображение',
                'format' => 'html',
                'value' => function($data){
                    $image = $data->getImage();
                    return Html::img(Yii::$app->request->BaseUrl.'/upload/store/' . $image->filePath,
                        ['height' => '50px','width' => 'auto']);
                }

            ],
            'details:ntext',
            'date_complete',
            [
                'attribute' => 'date_complete',
                'label' => 'Осталось',
                'value' => function($data){
                    $now = new DateTime(date("Y-m-d H:i:s"));
                    $date = new DateTime($data->date_complete);
                    $int = $now->diff($date);
                   
                   return $int->format('%R%h часов');
                    // if($now < $date){
                    //     return date("Y-m-d H:i:s").$data->date_complete;
                    // }else{
                    //     return 2;
                    // }
                    
                },
            ],
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
