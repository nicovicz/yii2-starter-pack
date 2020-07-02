<?php
namespace app\widgets;

use yii\base\InvalidCallException;
use yii\bootstrap4\ActiveForm as BaseActiveForm;

class ActiveForm extends BaseActiveForm
{
   

    public $model;

    public $errorSummaryCssClass ='alert bg-danger';

   
    
    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        $content = ob_get_clean();
        $wrapper = Card::$cardBegin;

        if ($this->getView()->title){
            $wrapper .= sprintf(Card::$header,Icon::fa('sticky-note'),Html::encode($this->getView()->title));

           
        }
        $errors='';
        if ($this->model && $this->model instanceof \yii\base\Model){
            $errors = $this->errorSummary($this->model,['encode'=>false]);
        }
        
        $wrapper .= Card::$bodyBegin;
        $html = $wrapper.$errors.Html::beginForm($this->action, $this->method, $this->options);
        $html .= $content;

        if ($this->enableClientScript) {
            $this->registerClientScript();
        }

        $html .= $this->getView()->render('@app/widgets/buttons').Html::endForm()
        .Card::$bodyEnd.Card::$cardEnd;
        return $html;
    }
}