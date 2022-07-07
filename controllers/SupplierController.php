<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\Supplier;
use common\components\BackendController;
use backend\actions\DeleteAction;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;

/**
 * 供应商
 */
class SupplierController extends Controller
{

    /**
     *  查询
     */
    public function actionIndex()
    {
        $model = new Supplier();
        $dataProvider = $model->search(Yii::$app->request->post());
        
        return $this->render('index', [
            'searchModel' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 导出操作
     */
    public function actionExport()
    {
        $ids = Yii::$app->request->get('ids');
        $arrId = empty($ids) ? [] : explode(',', $ids);
        $title = ['编号', '姓名', '代码', '状态'];
        $fileName = '供应商列表-' . date('Ymd');

        $model = new Supplier();
        $dataArr = $model->find()->andFilterWhere(['in', 'id', $arrId])->asArray()->all();

        $this->exportCvs($fileName, $title, $dataArr);
    }

    //生成csv
    public function exportCvs($file = '', $title = [], $data = [])
    {
        ob_end_clean();  //清除内存
        ob_start();

        $expire = 180;
        header("Pragma: public");
        header("Cache-control: max-age=" . $expire);
        header("Expires: " . date("D, d M Y H:i:s", time() + $expire) . "GMT");
        header("Last-Modified: " . date("D, d M Y H:i:s", time()) . "GMT");
        header('Content-Encoding: none');
        header("Content-Transfer-Encoding: binary");
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=" . $file . '.csv');

        $fp = fopen('php://output', 'w');
        fwrite($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));
        fputcsv($fp, $title);
        $index = 0;

        foreach ($data as $item) {
            if ($index == 1000) { //每次写入1000条数据清除内存
                $index = 0;
                ob_flush();//清除内存
                flush();
            }
            $index++;
            fputcsv($fp, $item);
        }
        ob_flush();
        flush();
        ob_end_clean();
        exit();
    }
}