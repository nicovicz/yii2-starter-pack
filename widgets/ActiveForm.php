<?php
namespace app\widgets;

use yii\helpers\Html;
use yii\base\InvalidCallException;
use yii\widgets\ActiveForm as BaseActiveForm;

class ActiveForm extends BaseActiveForm
{
    public $options = [
        'class'=>'form-horizontal'
    ];

    public $model;

    public $errorSummaryCssClass ='alert bg-danger';

    public $fieldConfig =[
        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-9 pull-3\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-3'],
    ];
    
    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        $content = ob_get_clean();
        $wrapper = '<div class="panel panel-blur light-text with-scroll animated zoomIn"
        >';

        if ($this->getView()->title){
            $wrapper .= '<div class="panel-heading"><h3><i class="fa fa-sticky-note"></i> '.$this->getView()->title.'</h3>
            </div>';
        }
        $errors='';
        if ($this->model && $this->model instanceof \yii\base\Model){
            $errors = $this->errorSummary($this->model,['encode'=>false]);
        }
        
        $wrapper .='<div class="panel-body">';
        $html = $wrapper.$errors.Html::beginForm($this->action, $this->method, $this->options);
        $html .= $content;

        if ($this->enableClientScript) {
            $this->registerClientScript();
        }

        $html .= '<div>'.$this->getView()->render('@app/widgets/buttons').'</div>'.Html::endForm();
        return $html;
    }
}