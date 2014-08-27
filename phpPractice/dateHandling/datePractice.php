<?php


class DateHandler{

	public function __construct($date){
		$this->convertDate($date);
	}


	private function convertDate($date){
		echo date('Ymd',strtotime($date.' +1 day'));
	}
}
new DateHandler('20120101');