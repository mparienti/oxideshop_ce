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
namespace Integration\Models;

use oxDb;

/**
 * Testing the Discount model class.
 */
class DiscountTest extends \OxidTestCase
{

    /**
     * Test, that the method 'getMaximalSort' works as expected, if we have an empty table.
     */
    public function testGetMaximalSortWithEmptyTable()
    {
        $this->truncateDiscountTable();

        $discount = oxNew('oxDiscount');

        $this->assertSame(0, $discount->getMaximalSort());

        $this->restoreDiscountTable();
    }

    /**
     * Test, that the method 'getMaximalSort' works as expected.
     */
    public function testGetMaximalSort()
    {
        $discount = oxNew('oxDiscount');

        $this->assertSame(300, $discount->getMaximalSort());
    }

    /**
     * Clear the table oxdiscount - remove all rows.
     */
    protected function truncateDiscountTable()
    {
        $database = oxDb::getDb();

        $database->execute('TRUNCATE oxdiscount;');
    }

    /**
     * Restore the table oxdiscount - fill it with the values, which where in it before.
     */
    protected function restoreDiscountTable()
    {
        $databaseRestorer = $this->_getDbRestore();

        $databaseRestorer->restoreTable('oxdiscount');
    }

}
