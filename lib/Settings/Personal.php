<?php
declare(strict_types=1);

namespace OCA\Gravatar\Settings;

use OCA\Gravatar\AppInfo\Application;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\IConfig;
use OCP\IUserSession;
use OCP\Settings\ISettings;

/**
 * This class defines the gravatar app security settings.
 */
class Personal implements ISettings {

	const SETTING_USE_GRAVATAR = 'useGravatar';

	/**
	 * @var IConfig
	 */
    private $config;
    
    /**
	 * @var IUserSession
	 */
	private $userSession;

	/**
	 * Personal constructor.
	 *
	 * @param IConfig $config
	 */
	public function __construct(string $appName,
                                IConfig $config,
                                IUserSession $userSession) {
        $this->config = $config;
        $this->userSession = $userSession;
	}

	/**
	 * @return TemplateResponse returns the instance with all parameters set, ready to be rendered
	 * @since 9.1
	 */
	public function getForm() {
        $user = $this->userSession->getUser();
		$params = [
            'askUser' => $this->config->getAppValue(Application::APP_ID, Admin::SETTING_ASK_USER, 'no') === 'yes',
            'useGravatar' => $this->config->getUserValue($user->getUID(), Application::APP_ID, self::SETTING_USE_GRAVATAR, 'no') === 'yes'
		];
		return new TemplateResponse(Application::APP_ID, 'settings/personal', $params);
	}

	/**
	 * @return string the section ID, e.g. 'sharing'
	 */
	public function getSection() {
		return 'security';
	}

	/**
	 * @return int whether the form should be rather on the top or bottom of
	 * the personal section. The forms are arranged in ascending order of the
	 * priority values. It is required to return a value between 0 and 100.
	 */
	public function getPriority() {
		return 100;
	}
}
