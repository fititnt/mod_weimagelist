<?php

/*
 * @package         mod_weimagelist
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt -  http://fititnt.org
 * @copyright       Copyright (C) 2011 Webdesign Assessoria em Tecnilogia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

class WeImageList {
	
	/**
	 * Envoriment variables
	 * 
	 * @var object 
	 */
	protected $env;

	/**
	 * Initialize values
	 */
	public function __construct($initialize = TRUE) {
		if($initialize){
			$this->env = new stdClass;
		}
	}

	/**
	 * Method to debug one class from inside
	 * 
	 * @see github.com/fititnt/php-snippet/tree/master/dump
	 * 
	 * @param array $option Whoe function must work
	 * 						$option['method'] = 'default':
	 * 							Return simple print_r() inside <pre>
	 * 						$option['method'] = 'console':
	 * 							Return values on javascript console of browsers
	 * 						$option['die'] = 1:
	 * 							If excecution must stop after excecution
	 * 
	 * @return Object $this Suport for method chaining
	 */
	public function debug($option = array()) {
		if (!isset($option['method'])) {
			$option['method'] = 'default';
		}
		switch ($option['method']) {
			case 'console':
				$html = array();
				$date = date("Y-m-d h:i:s");
				$html[] = '<script>';
				$html[] = 'console.groupCollapsed("' . __CLASS__ . ':' . $date . '");';
				//@todo: add separed group (fititnt, 2012-02-15 02:03)
				$html[] = 'console.groupCollapsed("$this");';
				$html[] = 'console.dir(eval(' . json_encode($this) . '));'; //evail is evil... And?
				$html[] = 'console.groupEnd()';
				$html[] = 'console.groupEnd()';
				$html[] = '</script>';
				echo implode(PHP_EOL, $html);
				break;
			case 'default':
			default:
				echo '<pre>';
				print_r($this);
				echo '</pre>';
				break;
		}
		if (isset($option['die'])) {
			die;
		}
		return $this;
	}

	/**
	 * Delete (set to NULL) generic variable
	 * 
	 * @param String $name: name of var do delete
	 * @return Object $this Suport for method chaining
	 */
	public function del($name) {
		$this->$name = NULL;
		return $this;
	}

	/**
	 * Return generic variable
	 * 
	 * @param String $name: name of var to return
	 * @return Mixed this->$name: value of var
	 */
	public function get($name) {
		return $this->$name;
	}
	
	/**
	 * Get one Param
	 * 
	 * @see loadParameters()
	 * @see setParams()
	 * @see JRegistry
	 * 
	 * @param String $name 
	 * @return Mixed this->$name: value of var
	 */
	public function getParam($name){
		return $this->env->params->get($name);
	}

	/**
	 * Set one generic variable the desired value
	 * 
	 * @param String $name: name of var to set value
	 * @param Mixed $value: value to set to desired variable
	 * @return Object $this Suport for method chaining
	 */
	public function set($name, $value) {
		$this->$name = $value;
		return $this;
	}
	
	/**
	 * Manualy set Params in to this class instead of use loadParameters()
	 * 
	 * @see loadParameters()
	 * @param object $params 
	 * @return Object $this Suport for method chaining
	 */
	public function setParams($params){
		$this->env->params = $params;
		return $this;
	}
	
	/**
	 * @todo implement this function
	 * 
	 * @param type $name 
	 */
	public function method($name){
		
	}
	
	/**
	 * Set Type of envoriment
	 * 
	 * @param string $name 
	 */
	public function type($name){
		$this->env->type = $name;
		return $this;
	}
	
	/**
	 * Set name of envoriment
	 * 
	 * @param string $name 
	 */
	public function name($name){
		$this->env->name = $name;
		return $this;
	}
	
	/**
	 * Try load params based on $this->env->type and $this->env->name
	 * 
	 * @see setParams()
	 * 
	 * @param boolean $reload If must force reload $params if already defined
	 * @return object $this->env->params
	 */
	protected function loadParameters($reload = false){
		if($reload || empty($this->env->params)){
			//@todo make ir portable for another types of extensions. In this
			//case, is not really necessary, but for reusability, it could be
			//(fititnt, 2012-03-08 12:04)
			if($this->env->type == 'module'){
				
			} else {
				//See last todo.
				die('Load params of type ' . $this->env->type . 'not implemented'
					. ' in ' .__METHOD__);
			}
		}
		return $this->env->params;
	}

}