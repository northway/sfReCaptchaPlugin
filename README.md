## sfReCaptchaPlugin For Symfony 1.4

This plugin is based on Stefan Staynov original blog post: http://sstaynov.com/2014/06/07/recaptcha-plugin-for-symfony-1-4-x/

"Prior to using this plugin you need to create a Google Recaptcha account."

###  Git

Git submodule add:

	$ git submodule add https://github.com/northway/sfReCaptchaPlugin.git plugins/sfReCaptchaPlugin

Git submodule update:

	$ git submodule update --remote

### Install

ProjectConfiguration.class.php:

    $this->enablePlugins('sfReCaptchaPlugin');

Symfony cache clear:

		$ php symfony cc

### Usage

In a form class:

		$this->widgetSchema['secret'] = new sfWidgetFormGoogleRecaptcha(array(
        'public_key' => 'MY_PUBLIC_KEY',
        'theme' => 'clean'));

		$this->validatorSchema['secret'] = new sfValidatorGoogleRecaptcha(
				array('private_key' => 'MY_PRIVATE_KEY'),
				array('invalid' => 'The verification code is incorrect.')
		);

