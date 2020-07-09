<?php
declare(strict_types=1);

/**
 * @copyright Copyright (c) 2018 Michael Weimann <mail@michael-weimann.eu>
 *
 * @author Michael Weimann <mail@michael-weimann.eu>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

return [
	'routes' => [
		['name' => 'settings#enable_ask_user_setting', 'url' => '/settings/askUser/enable', 'verb' => 'POST',],
		['name' => 'settings#disable_ask_user_setting', 'url' => '/settings/askUser/disable', 'verb' => 'POST',],
		['name' => 'settings#enable_user_gravatar', 'url' => '/settings/useGravatar/enable', 'verb' => 'POST',],
		['name' => 'settings#disable_user_gravatar', 'url' => '/settings/useGravatar/disable', 'verb' => 'POST',],
	]
];
