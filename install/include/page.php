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

$pages = array(
    'langselect'      => array(
        'name'  => LANGUAGE_SELECTION,
        'title' => LANGUAGE_SELECTION_TITLE,
        'icon'  => 'fa fa-fw fa-language'
    ),
    'start'           => array(
        'name'  => INTRODUCTION,
        'title' => INTRODUCTION_TITLE,
        'icon'  => 'fa fa-fw fa-exclamation-circle'
    ),
    'modcheck'        => array(
        'name'  => CONFIGURATION_CHECK,
        'title' => CONFIGURATION_CHECK_TITLE,
        'icon'  => 'fa fa-fw fa-server'
    ),
    'pathsettings'    => array(
        'name'  => PATHS_SETTINGS,
        'title' => PATHS_SETTINGS_TITLE,
        'icon'  => 'fa fa-fw fa-folder-open'
    ),
    'configsave'      => array(
        'name'  => CONFIG_SAVE,
        'title' => CONFIG_SAVE_TITLE,
        'icon'  => 'fa fa-fw fa-download'
    ),
    'configaudio'    => array(
        'name'  => PATHS_AUDIO,
        'title' => PATHS_AUDIO_TITLE,
        'icon'  => 'fa fa-fw fa-folder-open'
    ),
    'configbackground'    => array(
        'name'  => PATHS_BACKGROUND,
        'title' => PATHS_BACKGROUND_TITLE,
        'icon'  => 'fa fa-fw fa-folder-open'
    ),
    'end'             => array(
        'name'  => WELCOME,
        'title' => WELCOME_TITLE,
        'icon'  => 'fa fa-fw fa-thumbs-o-up'
    )
);
