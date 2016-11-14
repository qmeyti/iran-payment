<?php

namespace Dena\IranPayment\Exceptions;

use Exception;

class InvalidDataException extends Exception
{

	const UNKNOWN			= 0;
	const INVALID_USER_ID	= 1;
	const INVALID_AMOUNT	= 2;

	public static $errors = [
		0	=> 'Unknown Error:',
		1	=> 'User not found:',
		2	=> 'Amount is invalid:',
	];

	public function __construct($error_id = 0)
	{
		$this->error_id = intval($error_id);

		parent::__construct(@self::$errors[$this->error_id].' #'.$this->error_id, $this->error_id);
	}
}