<?php
namespace WorldDirect\Powermailext\Domain\Validator;

use In2code\Powermail\Domain\Model\Field;
use In2code\Powermail\Domain\Model\Mail;

class InputValidator extends \In2code\Powermail\Domain\Validator\InputValidator {
		
	/**
	 * @var array
	 */
	protected $validationFieldTypes = array(
		'input',
		'textarea',
		'date'
	);	
	
	/**
	 * Validation of given Params
	 *
	 * @param \In2code\Powermail\Domain\Model\Mail $mail
	 * @return bool
	 */
	public function isValid($mail) {		
		// stop validation if it's turned off
		if (!$this->isServerValidationEnabled()) {
			return TRUE;
		}

		// iterate through all fields of current form
		// every page
		foreach ($mail->getForm()->getPages() as $page) {
			// every field
			foreach ($page->getFields() as $field) {
				// check if field should be validated, if a validation condition is attached to it
				if($this->fieldShouldBeValidated($field, $mail)) {
					$answer = $this->getAnswerFromField($field, $mail);
					$this->isValidFieldInMandatoryValidation($field, $answer);
					$this->isValidFieldInStringValidation($field, $answer);
				}
			}
		}

		return $this->isValidState();
	}
	
	/**
	 * fieldShouldBeValidated
	 *
	 * @param \WorldDirect\Powermailext\Domain\Model\Field $field
	 * @param \In2code\Powermail\Domain\Model\Mail $mail
	 *
	 * @return bool
	 */
	public function fieldShouldBeValidated($field, $mail) {
		if ($field->getDependency() && $field->getDependencyAction() % 3 == 0) {
			$theAnswer = $this->getAnswerFromField($field->getDependencyField(), $mail);
			if (is_array($theAnswer)) {
				$theAnswer = join('', $theAnswer);
			}
			switch ($field->getDependencyOperator()) {
				// not empty
				case 1:
					if (!empty($theAnswer)) {
						return TRUE;
					}
					break;
				// equal
				case 2:
					if ($theAnswer == $field->getDependencyValue()) {
						return TRUE;
					}
					break;
				// greater than
				case 3:
					if ($theAnswer > $field->getDependencyValue()) {
						return TRUE;
					}
					break;
				// less than (integer)
				case 4:
					if ($theAnswer < $field->getDependencyValue()) {
						return TRUE;
					}
					break;
				// contains
				case 5:
					$tArr = explode(',', $field->getDependencyValue());
					foreach ($tArr as $val) {
						if (strpos($theAnswer, $val) !== FALSE) {
							return TRUE;
						}
					}
					break;
				default:
					break;
			}
			return FALSE;
		} else {
			return TRUE;
		}
	}
}