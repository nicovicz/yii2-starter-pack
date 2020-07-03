<?php
use yii\base\InvalidCallException;

class ActiveForm extends yii\bootstrap4\ActiveForm
{
   
    const NORMAL_TYPE=1;
    const CRUD_TYPE=2;
    public $type = self::NORMAL_TYPE;
    public $model;
    public $errorSummaryCssClass ='alert alert-danger';

   
    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        $content = ob_get_clean();

        if ($this->enableClientScript) {
            $this->registerClientScript();
        }

        $errors='';
        if ($this->model && $this->model instanceof \yii\base\Model){
            $errors = $this->errorSummary($this->model,['encode'=>false]);
        }

        if ($this->type === static::NORMAL_TYPE){
            $html = $errors.Html::beginForm($this->action, $this->method, $this->options);
            $html .= $content;
            $html .= Html::endForm();
            return $html;
        }
       

        $wrapper = Card::$cardBegin;
        if ($this->getView()->title){
            $wrapper .= sprintf(Card::$header,Icon::fa('sticky-note'),Html::encode($this->getView()->title));
        }
        
        
        $wrapper .= Card::$bodyBegin;
        $html = $wrapper.$errors.Html::beginForm($this->action, $this->method, $this->options);
        $html .= $content;

    
        $html .= $this->getView()->render('@widgetsButtons/crud-button').Html::endForm()
        .Card::$bodyEnd.Card::$cardEnd;
        return $html;
    }
}