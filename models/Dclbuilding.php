<?php

namespace app\models;

use Yii;

class DclBuilding extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'dcl_building';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function getBuildings()
    {
        $tenant_id = Yii::$app->user->identity->tenant_id;
        return self::find()
            ->select(['name', 'id'])
            // ->where(['tenant_id' => $tenant_id])
            ->indexBy('id')
            ->column();
    }
}
