<?php

namespace api\modules\v1\controllers;

use Yii;

class UserController extends \api\components\ActiveController
{
     public $modelClass = 'api\modules\v1\models\User';

     public function actions()
    {
        $actions = parent::actions();
        // disable the "delete" and "create" actions
        unset($actions['delete'], $actions['create'],$actions['update']);
        return $actions;
    }
}
