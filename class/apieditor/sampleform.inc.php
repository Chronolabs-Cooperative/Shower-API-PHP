<?php
/**
 * Email Account Propogation REST Services API
 *
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @copyright       Chronolabs Cooperative http://syd.au.snails.email
 * @license         ACADEMIC APL 2 (https://sourceforge.net/u/chronolabscoop/wiki/Academic%20Public%20License%2C%20version%202.0/)
 * @license         GNU GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * @package         emails-api
 * @since           1.1.11
 * @author          Dr. Simon Antony Roberts <simon@snails.email>
 * @version         1.1.11
 * @description		A REST API for the creation and management of emails/forwarders and domain name parks for email
 * @link            http://internetfounder.wordpress.com
 * @link            https://github.com/Chronolabs-Cooperative/Emails-API-PHP
 * @link            https://sourceforge.net/p/chronolabs-cooperative
 * @link            https://facebook.com/ChronolabsCoop
 * @link            https://twitter.com/ChronolabsCoop
 * 
 */
defined('API_ROOT_PATH') || exit('Restricted access');

/**
 * Edit form with selected editor
 */
$sample_form = new APIThemeForm('', 'sample_form', 'action.php');
$sample_form->setExtra('enctype="multipart/form-data"');
// Not required but for user-friendly concern
$editor = !empty($_REQUEST['editor']) ? $_REQUEST['editor'] : '';
if (!empty($editor)) {
    setcookie('editor', $editor); // save to cookie
} else {
    // Or use user pre-selected editor through profile
    if (is_object($apiUser)) {
        $editor = @ $apiUser->getVar('editor'); // Need set through user profile
    }
    // Add the editor selection box
    // If dohtml is disabled, set $noHtml = true
    $sample_form->addElement(new APIFormSelectEditor($sample_form, 'editor', $editor, $noHtml = false));
    // options for the editor
    // required configs
    $options['editor'] = $editor;
    $options['name']   = 'required_element';
    $options['value']  = empty($_REQUEST['message']) ? '' : $_REQUEST['message'];
    // optional configs
    $options['rows']   = 25; // default value = 5
    $options['cols']   = 60; // default value = 50
    $options['width']  = '100%'; // default value = 100%
    $options['height'] = '400px'; // default value = 400px

    // "textarea": if the selected editor with name of $editor can not be created, the editor "textarea" will be used
    // if no $onFailure is set, then the first available editor will be used
    // If dohtml is disabled, set $noHtml to true
    $sample_form->addElement(new APIFormEditor(_MD_MESSAGEC, $options['name'], $options, $nohtml = false, $onfailure = 'textarea'), true);
    $sample_form->addElement(new APIFormText('SOME REQUIRED ELEMENTS', 'required_element2', 50, 255, $required_element2), true);
    $sample_form->addElement(new APIFormButton('', 'save', _SUBMIT, 'submit'));
    $sample_form->display();
}
