<?php

/**
 * Description of sfWidgetFormGoogleRecaptcha
 *
 * @author northway
 */
class sfWidgetFormGoogleRecaptcha extends sfWidgetForm {

  public function configure($options = array(), $attributes = array()) {
    $this->addOption('public_key');
    $this->addOption('theme', null);
  }

  public function render($name, $value = null, $attributes = array(), $errors = array()) {

    $output = '';
    if ($this->getOption('theme')) {
      $output .= '<script type="text/javascript">';
      $output .= 'var RecaptchaOptions = {theme : "' . $this->getOption('theme') . '",};';
      $output .= '</script>';
    }

    $recapcha = new GoogleReCaptcha();
    $output .= $recapcha->recaptcha_get_html($this->getOption('public_key'));

    return $output;
  }

}
