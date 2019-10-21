<?php

namespace David\JneCities;

class Base
{
	const PAGE_URL = 'https://www.jne.co.id/id/tracking/tarif';
	const API_URL = 'https://www.jne.co.id/ajax/origin?query=';
	const HOST = 'www.jne.co.id';
	const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36';

	protected $cookiepath;

	public function __construct()
	{
		$this->cookiepath = dirname(__FILE__) . "/cookies/cookie.txt";
	}

	/**
	 * Success Response
	 *
	 * @param      array  $result  The result
	 *
	 * @return     json
	 */
	public function successResponse($result)
	{
		$datas = [
			'code' => 200,
			'msg' => 'success',
			'results' => $result
		];

		return json_encode($datas);
	}

	/**
	 * Error Response
	 *
	 * @param      string  $msg    The message
	 *
	 * @return     json
	 */
	public function errorResponse($msg)
	{
		$datas = [
			'code' => 201,
			'msg' => $msg
		];

		return json_encode($datas);
	}

	/**
	 * Creates a session.
	 */
	public function createSession()
	{
		try {
			if (!file_exists($this->cookiepath)) {
		        $curl = curl_init();
		        curl_setopt($curl, CURLOPT_URL, self::PAGE_URL);
		        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		        curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookiepath);
		        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		        curl_setopt($curl, CURLOPT_ENCODING , "gzip");
		        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		        curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
		        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		            'host: '.self::HOST,
		            'Accept: */*',
		            'Connection: keep-alive'
		        ));
			}
		} catch (Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
	}

	/**
	 * Call API
	 *
	 * @param      string  $value  The value
	 *
	 * @return     json
	 */
	public function callApi($value)
	{
		try {
			if (strlen($value) < 3)
				return $this->errorResponse('min length is 3');

			$this->createSession();

	        $curl = curl_init();
	        curl_setopt($curl, CURLOPT_URL, self::API_URL . $value);
	        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
	        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
	        curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookiepath);
	        curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookiepath);
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl, CURLOPT_ENCODING , "gzip");
	        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
	        curl_setopt($curl, CURLOPT_USERAGENT, self::USER_AGENT);
	        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			    "Host: ".self::HOST,
			    "Referer: ".self::PAGE_URL,
			    "Accept: text/plain, */*; q=0.01",
			    "Accept-Language: en-US,en;q=0.5",
			    "Connection: keep-alive",
			    "X-Requested-With: XMLHttpRequest"
	        ));

	        $result = curl_exec($curl);

	        return $this->successResponse(json_decode($result, true));
		} catch (Exception $e) {
			return $this->errorResponse($e->getMessage());
		}
	}
}