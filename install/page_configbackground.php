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

require_once './include/common.inc.php';
defined('API_INSTALL') || die('API Installation wizard die');

include_once './include/functions.php';
include_once '../class/apilists.php';

$pageHasForm = true;
$pageHasHelp = true;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && @$_GET['var'] && @$_GET['action'] === 'checkfile') {
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $wizard->redirectToPage('+1');
    return 302;
}
ob_start();

?>
     <div class="panel panel-info">
        <div class="panel-heading"><?php echo API_CONFIG_BACKGROUND; ?></div>
        <div class="panel-body">        
   </div>
   <article>
		<section>
			<div class="pushbot">
				You need to with your android mobile phone, get a camera session running and take as many photos of the showers the audio recorder has been used in that records in MP3 but of JPG photos for the use of the background which you need to upload to the following path: <strong><?php echo API_ROOT_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'backgrounds' . DIRECTORY_SEPARATOR ; ?></strong>
			</div>
		</section>
	</article>

<?php
$content = ob_get_contents();
ob_end_clean();

include './include/install_tpl.php';
