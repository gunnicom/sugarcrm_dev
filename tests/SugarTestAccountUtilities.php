<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

 
require_once 'modules/Accounts/Account.php';

class SugarTestAccountUtilities
{
    private static $_createdAccounts = array();

    private function __construct() {}

    public static function createAccount($id = '') 
    {
        $time = mt_rand();
    	$name = 'SugarAccount';
    	$email1 = 'account@sugar.com';
    	$account = new Account();
        $account->name = $name . $time;
        $account->email1 = 'account@'. $time. 'sugar.com';
        if(!empty($id))
        {
            $account->new_with_id = true;
            $account->id = $id;
        }
        $account->save();
        $GLOBALS['db']->commit();
        self::$_createdAccounts[] = $account;
        return $account;
    }

    public static function setCreatedAccount($account_ids) {
    	foreach($account_ids as $account_id) {
    		$account = new Account();
    		$account->id = $account_id;
        	self::$_createdAccounts[] = $account;
    	} // foreach
    } // fn
    
    public static function removeAllCreatedAccounts() 
    {
        $account_ids = self::getCreatedAccountIds();
        $GLOBALS['db']->query('DELETE FROM accounts WHERE id IN (\'' . implode("', '", $account_ids) . '\')');
    }
        
    public static function getCreatedAccountIds() 
    {
        $account_ids = array();
        foreach (self::$_createdAccounts as $account) {
            $account_ids[] = $account->id;
        }
        return $account_ids;
    }
}
?>