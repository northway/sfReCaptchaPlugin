<?php

/**
 * Description of sfValidatorGoogleRecaptcha
 *
 * @author northway
 */
class sfValidatorGoogleRecaptcha extends sfValidatorBase {

  public function configure($options = array(), $messages = array()) {
    $this->addOption('private_key');
  }

  public function doClean($value) {

    $recaptcha = new GoogleReCaptcha();
    $response = $recaptcha->recaptcha_check_answer(
            $this->getOption('private_key'), $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]
    );

    if (!$response->is_valid) {
      throw new sfValidatorError($this, 'invalid');
    }
    
    return $value;
  }

  public function isEmpty($value) {
    return false;
  }

}
