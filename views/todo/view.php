<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\category;
/* @var $this yii\web\View */
/* @var $model app\models\todo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Todos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'cat_id',
                'value' => function($data){
                    return $cat = Category::findOne($data)->name;
                },
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
            
            'status',
        ],
    ]) ?>

</div>
