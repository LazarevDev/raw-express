<?php

namespace app\controllers;

use app\models\AuthAssignment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use app\models\Months;
use app\models\Tonnages;
use app\models\RawTypes;
use app\models\History;
use app\models\Prices;
use app\models\User;

class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'tonnage', 'type', 'price'],
                'rules' => [
                    [
                        'actions' => ['tonnage', 'type', 'price'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    public function actionIndex(){
        $userId = Yii::$app->user->id;
        if(array_key_exists("admin", Yii::$app->authManager->getRolesByUser(Yii::$app->user->id)) == true){
            $dataProvider = new ActiveDataProvider([
                'query' => History::find()->with(['user', 'month', 'tonnage', 'rawType']),
            ]);
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => History::find()->where(['user_id' => $userId])->with(['user', 'month', 'tonnage', 'rawType']),
            ]);
        }

        $months = Months::getListForSelect();
        $tonnages = Tonnages::getListForSelect();
        $rawTypes = RawTypes::getListForSelect();

        return $this->render('index', compact('dataProvider', 'months', 'tonnages', 'rawTypes'));
    }

    public function actionIndexDelete($id){
        $model = History::findOne($id);
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionTonnage(){

        $model = new Tonnages;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->tonnagePrice($model->id);
            return $this->redirect(['tonnage']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Tonnages::find(),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        return $this->render('tonnage', compact('dataProvider', 'model'));
    }
    
    public function actionTonnageUpdate($id){
        $model = Tonnages::findOne($id);

        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Tonnages::find(),
            'pagination' => [
                'pageSize' => 6,
            ],
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);


        return $this->render('tonnage', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTonnageDelete($id){
        $model = Tonnages::findOne($id);
        $model->delete();

        Prices::deleteAll(['tonnage_id' => $id]);

        return $this->redirect(['tonnage']);
    }

    // Тип сырья
    
    public function actionType(){

        $model = new RawTypes;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->rawTypePrice($model->id);
            return $this->redirect(['type']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => RawTypes::find(),
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        return $this->render('type', compact('dataProvider', 'model'));
    }
    
    public function actionTypeUpdate($id){
        $model = RawTypes::findOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['type']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => RawTypes::find(),
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        return $this->render('type', compact('dataProvider', 'model'));
    }

    public function actionTypeDelete($id){
        $model = RawTypes::findOne($id);
        $model->delete();

        return $this->redirect(['type']);
    }

    // Прайс
    public function actionPrice(){
        if (Yii::$app->request->post()){
            if(Prices::deleteAll(['month_id' => $_POST['month']])){
                $tonnage_new = array_chunk($_POST['tonnage_id'], ceil(count($_POST['tonnage_id'])));
                $prices_new = array_chunk($_POST['price'], ceil(count($_POST['tonnage_id'])));

                for ($ceil=0; $ceil < ceil(count($_POST['raw_id'])); $ceil++) {
                    for ($i=0; $i < count($prices_new[0]); $i++) {
                        $prices = new Prices;
                        $prices->month_id = $_POST['month'];
                        $prices->raw_type_id = $_POST['raw_id'][$ceil];
                        $prices->tonnage_id = $tonnage_new[0][$i];
                        $prices->price = $prices_new[$ceil][$i];

                        $prices->save();
                    }
                }
            }

            return $this->redirect(['price']);
        }

        $months = Months::find()->all(); 
        $tonnages = Tonnages::find()->all();
        $rawTypes = RawTypes::find()->all();

        return $this->render('price', compact('months', 'tonnages', 'rawTypes'));
    }

    public function actionUsers(){
        $model = new User;

        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        $authAssignment = AuthAssignment::getListForSelect();

        return $this->render('users', compact('dataProvider', 'authAssignment'));
    }

    public function actionUserUpdate($id){
        $model = User::findOne($id);

        $authAssignment = AuthAssignment::getListForSelect();
        $authAssignmentUser = AuthAssignment::getListForSelectUser($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            $authAssignmentUs = AuthAssignment::find()->where(['user_id' => $id])->one();
            $authAssignmentUs->item_name = $model->checkbox;
            
            $authAssignmentUs->save();
            
            return $this->redirect(['users']);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        return $this->render('users', compact('dataProvider', 'authAssignment', 'model', 'authAssignmentUser'));
    }

    public function actionUserDelete($id){
        $model = User::findOne($id);
        $model->delete();

        $modelAssignmentUs = AuthAssignment::find()->where(['user_id' => $id])->one();
        $modelAssignmentUs->delete();

        $modelHistory = History::find()->where(['user_id' => $id])->one();

        if($modelHistory){
            $modelHistory->delete();
        }

        return $this->redirect(['users']);
    }


    
}
