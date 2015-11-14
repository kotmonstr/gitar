<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property string $id
 * @property string $facebook
 * @property string $vkontakte
 * @property string $twitter
 * @property string $google
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['facebook', 'vkontakte', 'twitter', 'google', 'odnoklasniky', 'mailru', 'yandeks'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'facebook' => Yii::t('app', 'Facebook'),
            'vkontakte' => Yii::t('app', 'Vkontakte'),
            'twitter' => Yii::t('app', 'Twitter'),
            'google' => Yii::t('app', 'Google+'),
            'odnoklasniky' => Yii::t('app', 'Одноклассники'),
            'mailru' => Yii::t('app', 'Mail.ru'),
            'yandeks' => Yii::t('app', 'Yandex'),
        ];
    }
}
