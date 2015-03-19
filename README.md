## sfReCaptchaPlugin For Symfony 1.4

This plugin is based on Stefan Staynov original blog post: http://sstaynov.com/2014/06/07/recaptcha-plugin-for-symfony-1-4-x/

"Prior to using this plugin you need to create a Google Recaptcha account."

###  Git

Git submodule add:

	$ git submodule add https://github.com/northway/sfReCaptchaPlugin.git plugins/sfReCaptchaPlugin

Git submodule update:

	$ git submodule update --remote

### Install

You need to add this line to ProjectConfiguration.class.php:

    $this->enablePlugins('sfReCaptchaPlugin');

Then a Symfony cache clear:

		$ php symfony cc

### Usage

You can use the widget and validator like this in a form class:

		$this->widgetSchema['secret'] = new sfWidgetFormGoogleRecaptcha(
				array('public_key' => 'MY_PUBLIC_KEY', 'theme' => 'clean'));

		$this->validatorSchema['secret'] = new sfValidatorGoogleRecaptcha(
				array('private_key' => 'MY_PRIVATE_KEY'),
				array('invalid' => 'The verification code is incorrect.')
		);

### Proxy (if necessary):

app.yml (default port is 80, username and password is optional):

    all:
      recaptcha:
        proxy_host: SERVER ADDRESS
        proxy_port: SERVER PORT
        proxy_username: USERNAME
        proxy_password: PASSWORD

validator config:

    $this->validatorSchema['secret'] = new sfValidatorGoogleRecaptcha(
        array('private_key' => 'MY_PRIVATE_KEY', 'proxy' => true),
        array('invalid' => 'The verification code is incorrect.')
    );

If you run into some error, check symfony logs and http headers.

If you think you can improve this plugin or found some error, feel free to fork and create a pull request.
