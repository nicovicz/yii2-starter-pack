<?php
class Card extends \yii\base\Widget
{
    public $title = '';
	public $icon = '';
	
	

	public function init()
	{
		parent::init();
		ob_start();
	}

	public static $cardBegin = '<div class="card shadow mb-4">';
	public static $header = '<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h5 class="m-0 font-weight-bold text-primary">%s %s</h5></div>';
	public static $bodyBegin = '<div class="card-body"><div class="table-responsive">';
	public static $bodyEnd = '</div></div>';
	public static $cardEnd = '</div>';


	public function run()
	{
		$start = static::$cardBegin;
		if ($this->title){
			$start .= sprintf(static::$header,Icon::fa($this->icon),Html::encode($this->title));
			
		}
		$start .= static::$bodyBegin;
		$ender = static::$bodyEnd;
		$ender .= static::$cardEnd;
		$content = ob_get_clean();
		return $start.$content.$ender;

		
	}
}