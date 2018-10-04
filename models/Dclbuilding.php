<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dcl_building".
 *
 * @property int $id
 * @property string $name
 */
class DclBuilding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dcl_building';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
            ->where(['tenant_id' => $tenant_id])
            ->indexBy('id')
            ->column();
    }
}
