<?php

namespace app\models;

use yii\db\Query;
use yii\db\ActiveRecord;

use app\models\CalcForm;
use app\models\RawTypes;
use app\models\Tonnages;
use app\models\Months;

class Prices extends ActiveRecord
{

    // public $month_id;
    // public $raw_type_id;
    // public $tonnage_id;

    public function allMonths(){
        return Months::getListForSelect();
    }

    public function monthSelect($id){
        $return = Months::find()
            ->select(['name'])
            ->where(['id' => $id])
            ->one();
        
        if($return){
            return $return->name;
        }
    }

    public function allTonnages()
    {
        return Tonnages::getListForSelect();
    }

     public function tonnageSelect($id){
        $return = Tonnages::find()
            ->select(['value'])
            ->where(['id' => $id])
            ->one();
        
        if($return){
            return $return->value;
        }
    }


    public function allRaws()
    {
        return RawTypes::getListForSelect();
    }

    public function rawSelect($id){
        $return = RawTypes::find()
            ->select(['name'])
            ->where(['id' => $id])
            ->one();
        
        if($return){
            return $return->name;
        }
    }


    public function rules()
    {
        return [
            [['month_id', 'tonnage_id', 'raw_type_id'], 'required'],
            [['month_id', 'tonnage_id', 'raw_type_id', 'price'], 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'month_id' => 'месяц',
            'tonnage_id' => 'тоннаж',
            'raw_type_id' => 'сырьё',
        ];
    }


    public function dataFsorTable()
    {
        return (new Query())
            ->select(['price', 'raw_types.name', 'tonnages.value'])
            ->from('prices')
            ->innerJoin('tonnages', 'tonnages.id = prices.tonnage_id')
            ->innerJoin('raw_types', 'raw_types.id = prices.raw_type_id')
            // ->where(['month_id' => $this->month_id])
            ->adnWhere(['month_id' => $this->raw_types_id])
            ->orderBy(['tonnages.value' => SORT_ASC])
            ->all();
    }

    public function priceTable()
    {
        return (new Query())
            ->select(['price', 'months.name', 'tonnages.value'])
            ->from('months')
            ->innerJoin('prices', 'months.id = prices.month_id')
            ->innerJoin('tonnages', 'tonnages.id = prices.tonnage_id')
            ->innerJoin('raw_types', 'raw_types.id = prices.raw_type_id')
            ->where(['month_id' => $this->month_id])
            ->andWhere(['raw_type_id' => $this->raw_type_id])
            ->orderBy(['tonnages.value' => SORT_ASC, 'months.id' => SORT_ASC])
            ->all();
    }


}
