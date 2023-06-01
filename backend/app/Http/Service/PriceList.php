<?php
namespace App\Http\Service;
use Illuminate\Support\Facades\File;
Class PriceList{
	public $fileContent;
	public function __construct(){
		//read file
		$filePath = public_path('priceList.txt');
        if (File::exists($filePath)) {
             $this->fileContent= file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
        } else {
           return -1;
        }
	}
	public function extractNumberAndCharges(){
		//return array of all numbers and their charges e.g [080123=> 2.2 , 0404950=>5.6]
		foreach($this->fileContent as $Key=> $numberPrice){
			$numbers = explode("=", $numberPrice);
			if (count($numbers) === 2) {
				$formattedNo[$numbers[0]] = $numbers[1];
			} else {
				//throw new Exception('Invalid file format');
			}
			//$firstSixDigits = substr($number, 0, 6);
		}
		return $formattedNo;
	}
	
	
}
?>