<?php


namespace app\models;
 
use app\models\Tonnages;
use app\models\Months;
use yii\db\ActiveRecord;
 
/**
 * ContactForm is the model behind the contact form.
 */
class RawTypes extends ActiveRecord 
{
    public static function tableName()
    {
        return 'raw_types';
    }

    public function rules()
    {
        return [
            [['name'], 'string'],
            [['id'], 'integer'],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'name' => 'Название',
        ];
    }

    
    static function getListForSelect(){
        $model = self::find()->all();

        foreach($model as $value){
            $array[$value->id] = $value->name;
        }

        return $array;
    }

    static function rawTypePrice($id){
        $tonnages = Tonnages::find()->orderBy('id ASC')->all();
        $months = Months::find()->orderBy('id ASC')->all();
        
        foreach($months as $month){
            foreach($tonnages as $tonnage){
                $prices = new Prices;
                $prices->month_id = $month->id;
                $prices->tonnage_id = $tonnage->id;
                $prices->raw_type_id = $id;
                $prices->price = 0;
                $prices->save();
            }
        }
    }

}
