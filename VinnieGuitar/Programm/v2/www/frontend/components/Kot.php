<?php
namespace frontend\components;
use yii\base\Component;

class Kot extends Component{
    public $name ='Vasya';

    public function getHello(){
        return 'Hello'.$this->name.'!';
    }
    public function getTime(){
        return date("d-m-Y H:i:s",time());
    }
}