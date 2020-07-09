<?php
declare(strict_types=1);

namespace OCA\Gravatar\Settings;

use OCA\Gravatar\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\Settings\ISettings;

/**
 * This class defines the gravatar app security settings.
 */
class Admin implements ISettings {

	const SETTING_ASK_USER = 'ask_user';

	/**
	 * @var IConfig
	 */
	private $config;

	/**
	 * Admin constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(IConfig $config) {
		$this->config = $config;
	}

	/**
	 * @return TemplateResponse returns the instance with all parameters set, ready to be rendered
	 * @since 9.1
	 */
	public function getForm() {
		$params = [
			'askUser' => $this->config->getAppValue(Application::APP_ID, self::SETTING_ASK_USER, 'no') === 'yes',
		];
		return new TemplateResponse(Application::APP_ID, 'settings/admin', $params);
	}

	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection() {
		return 'security';
	}

	/**
	 * @return int whether the form should be rather on the top or bottom of
	 * the admin section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 */
	public function getPriority() {
		return 100;
	}
}
