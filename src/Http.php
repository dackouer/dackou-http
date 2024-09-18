<?php
	namespace Dackou;

	class Http{
		private $curl = null;
		private $url = '';
		private $array = true;
		private $result = null;

		/**
		 * [__construct description]
		 * @param string $url [description]
		 */
		public function __construct($url = ''){
			$this->curl = new \Curl\Curl();
			$url = trim($url);
			if(!empty($url)){
				$this->url = $url;
			}
		}

		/**
		 * [setBaseUrl description]
		 * @param [type] $url [description]
		 */
		public function setBaseUrl($url){
			$this->url = $url;
			return $this;
		}

		/**
		 * [setBasicAuthentication description]
		 * @param [type] $key [description]
		 * @param [type] $val [description]
		 */
		public function setBasicAuthentication($key,$val){
			$this->curl->setBasicAuthentication($key,$val);

			return $this;
		}

		/**
		 * [setOpt description]
		 * @param [type] $key [description]
		 * @param [type] $val [description]
		 */
		public function setOpt($key,$val){
			$this->curl->setOpt($key,$val);

			return $this;
		}

		/**
		 * [setUserAgent description]
		 * @param string $val [description]
		 */
		public function setUserAgent($val = ''){
			$this->curl->setUserAgent($val);

			return $this;
		}

		/**
		 * [setHeader description]
		 * @param [type] $data [description]
		 */
		public function setHeader($data){
			if($data && is_array($data)){
				foreach($data as $key => $val){
					$this->curl->setHeader($key,$val);
				}
			}
			return $this;
		}

		/**
		 * [setCookie description]
		 * @param [type] $key [description]
		 * @param [type] $val [description]
		 */
		public function setCookie($key,$val){
			$this->curl->setCookie($key,$val);

			return $this;
		}
		
		/**
		 * [get description]
		 * @param  string $uri  [description]
		 * @param  array  $data [description]
		 * @return [type]       [description]
		 */
		public function get($uri = '',$data = []){
			$uri = trim($uri);
			$this->url .= $uri;
			$this->curl->get($this->url,$data);
			$this->curl->close();
			if($this->array){
				return $this->toArray();
			}
			return $this->curl->response;
		}

		/**
		 * [post description]
		 * @param  string $uri  [description]
		 * @param  array  $data [description]
		 * @return [type]       [description]
		 */
		public function post($uri = '',$data = []){
			$uri = trim($uri);
			if($uri){
				$this->url .= $uri;
			}
			$this->curl->post($this->url,$data);
			$this->curl->close();
			if($this->array){
				return $this->toArray();
			}
			return $this->curl->response;
		}

		/**
		 * [close description]
		 * @return [type] [description]
		 */
		public function close(){
			$this->curl->close();

			return $this;
		}

		/**
		 * [toArray description]
		 * @return [type] [description]
		 */
		public function toArray(){
			return json_decode($this->curl->response,true);;
			// if($this->curl->error){
			// 	return ['code' => $this->curl->error_code ? $this->curl->error_code : 1,'msg' => $this->curl->error_message];
			// }else{
			// 	$response = json_decode($this->curl->response,true);
			// 	if(is_array($response) && isset($response['code'])){
			// 		return $response;
			// 	}
			// 	return ['code' => 0,'msg' => 'success','data' => $response];
			// }
		}
	}
?>