<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm AS BAF;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = BAF::begin([
        'action' => ['index'],
        'method' => 'post',
        'options' => ['class' => 'form-inline'],
    ]); ?>

    <?= $form->field($model, 'sid')->label('编号')->textInput(['maxlength' => 3, 'style' => 'width:100px']) ?>
    <?= $form->field($model, 'eid')->label('-')->textInput(['maxlength' => 3, 'style' => 'width:100px']) ?>

    <?= $form->field($model, 'name')->label('名称') ?>

    <?= $form->field($model, 'code')->label('代码') ?>

    <?= $form->field($model, 'tstatus')->label('状态')->dropDownList(['ok'=>"OK", 'hold'=>"HOLD"], ['prompt' => 'ALL']) ?>

    
    <div class="form-group"  style="padding-bottom:10px;">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::button('<i class="fa fa-download"></i> ' . '导出', ['id' => 'export-cvs','class' => 'btn btn-primary']) ?>
    </div>

    <?php BAF::end(); ?>

</div>
