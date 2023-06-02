<?php
namespace App\Http\Service;


class ValidateNumber {
	 public $receipentNumbers="";
	 public $priceList=[];
     public function input($number, $priceList) {
		$this->receipentNumbers=$number;
		$this->priceList=$priceList;
		
        return $this->processCost();
    }
    public function cleanNumber() {
		//replace leading 0 and remove other character
		$nos= explode(",", $this->receipentNumbers);
		
		foreach($nos as $number){
			// Replace leading zero with 234
			$number = preg_replace('/^0/', '234', $number);
			//remove any  other character
			$number = preg_replace('/\D/', '', $number);
			$no[]=$number;
		}
	  return $no;
    }
	
	public function processCost(){
		//this the receipent number
		$allNumber=$this->cleanNumber();
		//$this->priceList
		$Totalcost=0;
		$notFound=[];
		$count=0;
		$errCount=0;
		foreach($allNumber as $key=>$value){
			 //extract the first 6 digit as prefix
            $firstSixDigits = substr($value, 0, 6);
			//echo $firstSixDigits;
			//echo "<br>";
			//get the cost price for this line prefix
			if (array_key_exists($firstSixDigits, $this->priceList)) {
					$Totalcost=$Totalcost+$this->priceList[$firstSixDigits];
					$count++;
			} else {
				
				$notFound[]=$value;
				$errCount++;
			}
			
		}
		if($count > 0){
			$count--;
		}
		return ['cost'=>$Totalcost,'number_delivered'=> $count, 'not_found'=>$notFound,'errCount'=>$errCount,
			'recepient'=>$allNumber
		];
	}
	
}
?>