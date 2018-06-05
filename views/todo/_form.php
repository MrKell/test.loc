<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\todo */
/* @var $form yii\widgets\ActiveForm */

    $cat = \app\models\Category::find()->all();
    $cat_data = ArrayHelper::map($cat, 'id', 'name');
?>

<div class="todo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_id')->widget(Select2::classname(), [
        'data' => $cat_data,
        'options' => ['placeholder' => 'Выберите категорию...'],
        'language' => 'ru',
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_complete')->widget(DateTimePicker::classname(),[
        'name' => 'date_complete',
        'options' => ['placeholder' => 'Выберите дату выполнения ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-MM-dd hh:mm',
            'startDate' => date("Y-m-d H:i:s"),
            'todayHighlight' => true
        ]
    ]); 

    ?>
    

    <?= $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => ['запланировано' => 'запланировано', 'выполняется' => 'выполняется', 'выполнено' => 'выполнено'],
        'options' => ['placeholder' => 'Выберите статус...'],
        'language' => 'ru',
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
