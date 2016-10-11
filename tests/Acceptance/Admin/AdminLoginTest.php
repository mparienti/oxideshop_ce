<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2016
 * @version   OXID eShop CE
 */

namespace OxidEsales\Eshop\Tests\Acceptance\Admin;

use OxidEsales\Eshop\Tests\Acceptance\AdminTestCase;


class AdminLoginTest extends AdminTestCase
{
    const ADMIN_USERNAME = 'admin@myoxideshop.com';
    const ADMIN_PASSWORD = 'admin0303';
    const ADMIN_LANGUAGE = 'English';

    /**
     * Log in admin user, success case.
     */
    public function testAdminLogsInSuccess()
    {
        $this->openNewWindow(shopURL . 'admin');

        $this->type('usr', self::ADMIN_USERNAME);
        $this->type('pwd', self::ADMIN_PASSWORD);
        $this->select('lng', self::ADMIN_LANGUAGE);
        $this->select('prf', 'Standard');
        $this->clickAndWait('//input[@type="submit"]');

        $this->frame("navigation");
        $this->assertTextPresent('MASTER SETTINGS');
    }

    /**
     * Log in admin user, wrong credentials error case.
     */
    public function testAdminLogsInError()
    {
        $this->openNewWindow(shopURL . 'admin');

        $this->type('usr', 'noadminuser');
        $this->type('pwd', 'invalid');
        $this->select('lng', self::ADMIN_LANGUAGE);
        $this->select('prf', 'Standard');
        $this->clickAndWait('//input[@type="submit"]');

        $this->assertTextPresent('Error! Incorrect username and/or password!');
    }

}
