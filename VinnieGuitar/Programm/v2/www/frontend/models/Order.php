<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $tel
 * @property string $message
 * @property integer $created_at
 * @property integer $item_id
 *
 * @property Items $item
 */
class Order extends \yii\db\ActiveRecord
{
    public $captcha;

    public function beforeValidate() {
        if (parent::beforeValidate()) {
            // устанавливаем точное время для сообщения
            if ($this->isNewRecord) {
                $this->created_at = time();
            }
            return true;
        } else {
            return false;
        }
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email','item_id'], 'required',],
            [['message'], 'string'],
            [['created_at'], 'integer'],
            [['name', 'email', 'tel'], 'string', 'max' => 255],
            ['captcha', 'captcha'],
            ['email', 'email']
        ];
    }

    public function scenarios()

    {
        $scenarios = parent::scenarios();
        $scenarios['submit'] = [

            'name','email','tel','message','item_id'
        ];
        return $scenarios;

    }


/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'tel' => 'Контактный телефон',
            'message' => 'Сопроводительное письмо',
            'created_at' => 'дата',
            'item_id' => 'Товар ',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'item_id']);
    }
}
