<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class AuthAssignment extends ActiveRecord
{
    public static function tableName()
    {
        return 'auth_assignment'; 
    }

    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
        ];
    }

    static function getListForSelect(){
        $model = self::find()->all();

        foreach($model as $value){
            $array[$value->user_id] = $value->item_name;
        }

        return $array;
    }

    static function getListForSelectUser($id){
        $model = self::find()->where(['user_id' => $id])->one();

        return $model;
    }
}