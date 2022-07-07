<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class Supplier extends ActiveRecord
{

    public $sid;
    public $eid;
    public $tstatus;

    public static function tableName()
    {
        return '{{%supplier}}';
    }

    public function rules()
    {
        return [
        [['sid', 'eid', 'name', 'code'], 'trim'],
        [['sid', 'eid'], 'integer'],
        [['name', 'code', 'tstatus'], 'string'],
        ];
    }

    /**
     * 查询
     */
    public function search($params)
    {
        $query = $this->find();

        $this->load($params);

        $pageSize = 10;
        $pageCurrent = 0;
        $field = 'id';
        $sort = SORT_ASC;
        $getParams = Yii::$app->request->getQueryParams();
        $pageCurrent = 0;
        if (isset($getParams['page'])) {
            $pageCurrent = $getParams['page'] - 1;
        }

        if (isset($getParams['pageSize'])) {
            $pageSize = $getParams['pageSize'];
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
                'page' => $pageCurrent,
            ],
            'sort' =>[
                'defaultOrder' =>[
                    $field => $sort,
                ],
            ]
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            't_status' => $this->tstatus,
        ]);

        $startId = 1;
        $endId = 9999;
        if (!empty($this->sid)) {
            $startId = $this->sid;
        }

        if (!empty($this->eid)) {
            $endId = $this->eid;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['between', 'id', $startId, $endId]);
        return $dataProvider;
    }

}