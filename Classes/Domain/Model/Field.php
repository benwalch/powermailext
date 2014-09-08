<?php
namespace WorldDirect\Powermailext\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Ben Walch <ben.walch@world-direct.at>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * Field Model
 *
 * @package powermail
 * @subpackage powermailext
 */
class Field extends \In2Code\Powermail\Domain\Model\Field {
	
	/**
	 * maxlength
	 *
	 * @var integer
	 */
	protected $maxlength;
	
	/**
	 * disabled
	 *
	 * @var boolean
	 */
	protected $disabled;
	
	/**
	 * readonly
	 *
	 * @var boolean
	 */
	protected $readonly;
	
	
	/**
	 * validationCondition
	 *
	 * @var integer
	 */
	protected $validationCondition;

	/**
	 * validationConditionField
	 *
	 * @var \In2code\Powermail\Domain\Model\Field
	 */
	protected $validationConditionField = NULL;
	
	/**
	 * validationConditionOperator
	 *
	 * @var integer
	 */
	protected $validationConditionOperator;

	/**
	 * validationConditionValue
	 *
	 * @var string
	 */
	protected $validationConditionValue;
	
	/**
	 * @param integer $maxlength
	 * @return void
	 */
	public function setMaxlength($maxlength) {
		$this->maxlength = $maxlength;
	}

	/**
	 * @return integer
	 */
	public function getMaxlength() {
		return $this->maxlength;
	}
	
	/**
	 * @param boolean $disabled
	 * @return void
	 */
	public function setDisabled($disabled) {
		$this->disabled = $disabled;
	}

	/**
	 * @return boolean
	 */
	public function getDisabled() {
		return $this->disabled;
	}
	
	/**
	 * @param boolean $readonly
	 * @return void
	 */
	public function setReadonly($readonly) {
		$this->readonly = $readonly;
	}

	/**
	 * @return boolean
	 */
	public function getReadonly() {
		return $this->readonly;
	}

	/**
	 * @param string $validationCondition
	 * @return void
	 */
	public function setValidationCondition($validationCondition) {
		$this->validationCondition = $validationCondition;
	}

	/**
	 * @return integer
	 */
	public function getValidationCondition() {
		return $this->validationCondition;
	}
	
	/**
	 * @param \In2code\Powermail\Domain\Model\Field $validationConditionField
	 * @return void
	 */
	public function setValidationConditionField($validationConditionField) {
		$this->validationConditionField = $validationConditionField;
	}

	/**
	 * @return \In2code\Powermail\Domain\Model\Field
	 */
	public function getValidationConditionField() {
		return $this->validationConditionField;
	}
	
	/**
	 * @param integer $validationConditionOperator
	 * @return void
	 */
	public function setValidationOperator($validationConditionOperator) {
		$this->validationConditionOperator = $validationConditionOperator;
	}

	/**
	 * @return integer
	 */
	public function getValidationConditionOperator() {
		return $this->validationConditionOperator;
	}
	
	/**
	 * @param string $validationConditionValue
	 * @return void
	 */
	public function setValidationConditionValue($validationConditionValue) {
		$this->validationConditionValue = $validationConditionValue;
	}

	/**
	 * @return string
	 */
	public function getValidationConditionValue() {
		return $this->validationConditionValue;
	}

}