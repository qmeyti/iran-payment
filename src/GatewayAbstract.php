<?php

namespace Dena\IranPayment;

use Dena\IranPayment\Exceptions\InvalidDataException;

use Dena\IranPayment\Models\IranPaymentTransaction;

use Carbon\Carbon;

abstract class GatewayAbstract
{

	const T_INIT	= 0;
	const T_SUCCEED	= 1;
	const T_FAILED	= 2;

	protected $transaction_id	= null;
	protected $transaction		= null;
	protected $card_number		= null;

	protected $user_id;
	protected $gateway;
	protected $reference_id;
	protected $amount;
	protected $tracking_code;
	protected $payment_url;

	public function __construct($gateway)
	{
		$this->gateway = $gateway;
	}

	public function gateway()
	{
		return $this->gateway;
	}

	public function cardNumber()
	{
		return $this->card_number;
	}

	public function trackingCode()
	{
		return $this->tracking_code;
	}

	public function paymentUrl()
	{
		return $this->payment_url;
	}

	public function transactionId()
	{
		return $this->transaction_id;
	}

	public function referenceId()
	{
		return $this->reference_id;
	}

	public function userId()
	{
		return $this->user_id;
	}

	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
		return $this;
	}

	public function verify($transaction)
	{
		$this->transaction		= $transaction;
		$this->transaction_id	= intval($transaction->id);
		$this->amount			= intval($transaction->amount);
		$this->reference_id		= $transaction->reference_id;
	}

	protected function newTransaction()
	{
		if (empty($this->user_id)) {
			throw new InvalidDataException(InvalidDataException::INVALID_USER_ID);
		}
		if (empty($this->amount) || $this->amount < 0) {
			throw new InvalidDataException(InvalidDataException::INVALID_AMOUNT);
		}
		$transaction	= new IranPaymentTransaction([
			'amount'	=> $this->amount,
			'status'	=> self::T_INIT,
		]);
		$transaction->gateway = $this->gateway;
		$transaction->user_id = $this->user_id;
		$transaction->save();
		$this->transaction_id = $transaction->id;
		return $this->transaction_id;
	}

	protected function transactionSucceed()
	{
		return IranPaymentTransaction::find($this->transaction_id)
			->update([
				'status'		=> self::T_SUCCEED,
				'payment_date'	=> Carbon::now(),
				'tracking_code'	=> $this->tracking_code,
				'card_number'	=> $this->card_number
			]);
	}

	protected function transactionFailed()
	{
		return IranPaymentTransaction::find($this->transaction_id)
			->update([
				'status'	=> self::T_FAILED,
			]);
	}

	protected function transactionSetReferenceId()
	{
		IranPaymentTransaction::find($this->transaction_id)
			->update([
				'reference_id'	=> $this->reference_id,
			]);
	}

	protected function buildQuery($url, array $query = [])
	{
		$query = http_build_query($query);

		$question_mark = strpos($url, '?');
		if (!$question_mark) {
			return $url.'?'.$query;
		} else {
			return $url."&".$query;
		}
	}

	public function redirect()
	{
		return redirect($this->payment_url);
	}

}