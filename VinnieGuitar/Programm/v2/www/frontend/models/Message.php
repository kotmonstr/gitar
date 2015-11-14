<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property string $name
 * @property string $message
 * @property integer $created_at
 */
class Message extends \yii\db\ActiveRecord
{
    public $captcha;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'message', 'created_at','captcha','email','tel'], 'required'],
            [['created_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 50],
            [['message'], 'string', 'max' => 255],
            ['captcha', 'captcha'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'message' => 'Сообщение',
            'created_at' => 'Время отправки',
            'captcha'=>'Проверочное слово',
            'tel'=>'Телефон'
        ];
    }

    public function scenarios()

    {
        $scenarios = parent::scenarios();
        $scenarios['update'] = ['name','message','created_at','tel','email'];
        $scenarios['accept'] = ['name','message','created_at'];
        return $scenarios;
    }

}
