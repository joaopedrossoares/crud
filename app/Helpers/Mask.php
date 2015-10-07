<?php

namespace App\Helpers;
/**
* 
*/
class Mask
{
	public function format($value, $mask)
	{
		return $this->mask($value, $mask);
	}


	private function mask($val, $mask)
	{
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++)
		{
			if($mask[$i] == '#')
			{
				if(isset($val[$k])){
					$maskared .= $val[$k++];
				}
			}
			else
			{
				if(isset($mask[$i])){
					$maskared .= $mask[$i];
				}
			}
		}
		return $maskared;
	}
}