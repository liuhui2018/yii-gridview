<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\components\BaseConfig;
use models\Supplier;
use yii\widgets\Pjax;

$this->title = '查询模版';

?>

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="mail-tools tooltip-demo m-t-md" style="padding-bottom: 10px;">
                    <?= $this->render('_search', ['model' => $searchModel]) ?>
                </div>
                <?php Pjax::begin(['id' => 'article-pjax', 'enablePushState' => false, 'options' => ['class' => 'pjax-reload']]); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'id' => 'grid',
                    'summary' => '第{begin}-{end}条, 共{totalCount}条数据.',
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn', 
                        ],
                        'id',
                        [
                            'attribute' => '名称',
                            'enableSorting' => false,
                            'value' => function ($model) {
                                // var_dump($model);die;
                                return $model->name;
                            },
                        ],
                        [
                            'attribute' => '代码',
                            'enableSorting' => false,
                            'value' => function ($model) {
                                return $model->code;
                            },
                        ],
                        [
                            'attribute' => '状态',
                            'enableSorting' => false,
                            'value' => function ($model) {
                                return $model->t_status;
                            },
                        ],
                    ],
                    'layout' => "{items}\n{summary}\n{pager}"
                ]); ?>
                <?php Pjax::end(); ?>
                <div class="text-center" id="msg"></div>
            </div>
        </div>
    </div>
</div>
<?php
?>

<?php
    $testurl = Url::toRoute(['supplier/export']);

    $this->registerJs(<<<EOT
        $("#export-cvs").on('click', function(){
            //layer.load();
            var ids = $("#grid").yiiGridView("getSelectedRows");
            if (ids == '') {
                layer.msg('请选中需要导出的数据！');
                return;
            }
            window.open("$testurl"+"&ids="+ids, "_blank");
        });

        $("input[name='selection_all']").change(function() {
            var inputs = "input[name='selection[]']";
            var grid = $('#grid');
            var all = grid.find(inputs).length == grid.find(inputs + ":checked").length;
            if (all) {
                $('#msg').html("当前页面所有数据都已被选中。" + "<a id='clearSelection'>清空</a>");
            } else {
                $('#msg').html("");
            }
        });

        $("body").on('click', '#clearSelection', function() {
            var grid = $('#grid');
            grid.find("input[name='selection[]']").prop('checked', false).change();
            grid.find("input[name='selection_all']").prop('checked', false).change();
        });

EOT
);
 ?>
