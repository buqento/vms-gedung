<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "karyawan".
 *
 * @property int $id
 * @property int $tenant_id
 * @property string $nama
 * @property string $email
 * @property string $telepon
 * @property string $jabatan
 */
class Karyawan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'karyawan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'telepon', 'jabatan'], 'required'],
            [['tenant_id'], 'integer'],
            [['nama', 'email', 'jabatan'], 'string', 'max' => 50],
            [['telepon'], 'string', 'max' => 16],
            ['email', 'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tenant_id' => 'Tenant ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'jabatan' => 'Jabatan',
        ];
    }
}
