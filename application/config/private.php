<?php

/**
 * Name:    D-Private
 * Author:  Dante
 *           dimaz.taraz@gmail.com
 *           @taraz14
 *
 * Created:  19.10.2021
 *
 * Development is under progress.
 * Please don't touch anything.
 *
 * Requirements: PHP5.6 or above
 *
 * @package    CodeIgniter-D-Private
 * @author     Dante
 * @link       http://github.com/taraz14
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');
/*
 | -------------------------------------------------------------------------
 | Cookie options.
 | -------------------------------------------------------------------------
 | remember_cookie_name Default: remember_code
 */
$config['remember_cookie_name'] = 'remember_code';

/*
 | -------------------------------------------------------------------------
 | Authentication options.
 | -------------------------------------------------------------------------
 | maximum_login_attempts: 	This maximum is not enforced by the library, but is used by
 | 							is_max_login_attempts_exceeded().
 | 							The controller should check this function and act appropriately.
 | 							If this variable set to 0, there is no maximum.
 | min_password_length:		This minimum is not enforced directly by the library.
 | 							The controller should define a validation rule to enforce it.
 | 							See the Auth controller for an example implementation.
 |
 | The library will fail for empty password or password size above 4096 bytes.
 | This is an arbitrary (long) value to protect against DOS attack.
 */

$config['identity'] = 'email';  /* You can use any unique column in your table as identity column.
                                The values in this column, alongside password, will be used for login purposes
                                IMPORTANT: If you are changing it from the default (email),
                                update the UNIQUE constraint in your DB */

/*
 | -------------------------------------------------------------------------
 | Email options.
 | -------------------------------------------------------------------------
 | email_config:
 | 	  'file' = Use the default CI config or use from a config file
 | 	  array  = Manually set your email config settings
 */
$config['use_ci_email'] = FALSE; // Send Email using the builtin CI email class, if false it will return the code and the identity
$config['email_config'] = [
    'mailtype' => 'html',
];
