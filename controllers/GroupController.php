<?php


namespace app\controllers;


use app\models\Groups;
use app\models\Users;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class GroupController extends Controller
{

    public $enableCsrfValidation = false;


    public function init()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        parent::init();
    }

    public function actionIndex()
    {
        return Users::getTwoLastUsersInAllGroups();
    }

    /**
     * @throws BadRequestHttpException
     */
    public function actionCreate()
    {
        $userName = \Yii::$app->request->post('userName');
        $groupName = \Yii::$app->request->post('groupName');

        $user = new Users();
        return $user->create($userName,$groupName);
    }
}