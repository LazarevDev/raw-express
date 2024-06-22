<?php

namespace app\models;

use app\models\Months;
use app\models\RawTypes; 
use app\models\Prices; 
use yii\db\ActiveRecord;
 
/**
 * ContactForm is the model behind the contact form.
 */
class Tonnages extends ActiveRecord 
{
    public static function tableName()
    {
        return 'tonnages';
    }

    public function rules()
    {
        return [
            [['value'], 'integer'],
        ];
    }

    
    public function attributeLabels(): array
    {
        return [
            'value' => 'Кол-во тонн',
        ];
    }

    static function getListForSelect(){
        $model = self::find()->all();

        foreach($model as $value){
            $array[$value->id] = $value->value;
        }

        return $array;
    }

    static function tonnagePrice($id){
        $rawTypes = RawTypes::find()->orderBy('id ASC')->all();
        $months = Months::find()->orderBy('id ASC')->all();
        
        foreach($months as $month){
            foreach($rawTypes as $rawType){
                $prices = new Prices;
                $prices->month_id = $month->id;
                $prices->raw_type_id = $rawType->id;
                $prices->tonnage_id = $id;
                $prices->price = 0;
                $prices->save();
            }
        }
    }
}
