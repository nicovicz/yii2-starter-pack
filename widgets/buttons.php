<?php
use app\widgets\Html;
?>
<div class="col-lg-12">

    <hr/>
 <div class="pull-right clearfix">
 <?=$this->render('@app/widgets/save-button');?>
 <?=Html::resetButtonIcon('Batal','redo-alt','btn btn-primary');?>
 <?=$this->render('@app/widgets/back-button');?>
</div>

</div>
