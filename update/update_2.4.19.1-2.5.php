<?php
/******************************************************************************
* my little forum                                                             *
* update file to update from version 2.4.19.1 to version 2.5.*                *
*                                                                             *
* Update instructions:                                                        *
* - Load up this file into the directory "update"                             *
* - log in as administrator                                                   *
* - go to the Admin --> Update                                                *
* - click on the update file and follow the further instructions.             *
******************************************************************************/

if(!defined('IN_INDEX')) exit;
if(empty($_SESSION[$settings['session_prefix'].'user_type'])) exit;
if($_SESSION[$settings['session_prefix'].'user_type']!=2) exit;

// update data:
$update['version'] = array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1', '2.4.99.2', '2.4.99.3', '20220508.1', '20220509.1', '20220517.1', '20220529.1');
$update['download_url'] = 'https://github.com/ilosuna/mylittleforum/releases/latest';
$update['message'] = '';

/**
 * comparision of version numbers
 *
 * @param array
 * @return bool
 */
function compare_versions($versions) {
	if (!is_array($versions)) return false;
	if (!array_key_exists('old', $versions)) return false;
	if (!array_key_exists('new', $versions)) return false;
	$test['old'] = explode('.', $versions['old']);
	$test['new'] = explode('.', $versions['new']);
	$cntOld = count($test['old']);
	$cntNew = count($test['new']);
	if ($cntOld < $cntNew) {
		$c = $cntNew - $cntOld;
		for ($i = 0; $i < $c; $i++) {
			$test['old'][] = '0';
		}
	}
	if ($cntNew < $cntOld) {
		$c = $cntOld - $cntNew;
		for ($i = 0; $i < $c; $i++) {
			$test['new'][] = '0';
		}
	}
	$c = count($test['old']);
	for ($i = 0; $i < $c; $i++) {
		if ($test['new'][$i] > $test['old'][$i]) return true;
	}
	return false;
}

// changed files at the *end of the list* (folders followed by a slash like this: folder/):
// Note: Do *NOT* add 'break;' to a single case!!!
switch($settings['version']) {
	case '2.4.19.1':
	case '2.4.20':
	case '2.4.21':
	case '2.4.22':
	case '2.4.23':
	case '2.4.24':
		$update['items'][] = 'includes/admin.inc.php';                               // #364, #367, #390, #410, #427, #456
		$update['items'][] = 'themes/default/subtemplates/admin.inc.tpl';            // #364, #390
		$update['items'][] = 'themes/default/images/image.png';                      // #364
		$update['items'][] = 'lang/';                                                // #364, #390, #427
		$update['items'][] = 'includes/functions.inc.php';                           // #377, #390, #410
		$update['items'][] = 'includes/js_defaults.inc.php';                         // #377, #390
		$update['items'][] = 'themes/default/main.tpl';                              // #377
		$update['items'][] = 'themes/default/subtemplates/posting.inc.tpl';          // #377, #390
		$update['items'][] = 'includes/insert_flash.inc.php (remove)';               // #390
		$update['items'][] = 'index.php';                                            // #390
		$update['items'][] = 'js/posting.js';                                        // #390, #450
		$update['items'][] = 'js/posting.min.js';                                    // #390, #450
		$update['items'][] = 'themes/default/insert_flash.inc.tpl (remove)';         // #390
		$update['items'][] = 'themes/default/js_config.ini';                         // #390
		$update['items'][] = 'themes/default/style.css';                             // #390
		$update['items'][] = 'themes/default/style.min.css';                         // #390
		$update['items'][] = 'includes/posting.inc.php';                             // #410
		$update['items'][] = 'includes/';                                            // #427
		$update['items'][] = 'modules/b8/';                                          // #427
		$update['items'][] = 'themes/default/';                                      // #427
		$update['items'][] = 'includes/upload_image.inc.php';                        // #451, #454
	case '2.4.99.0':
		$update['items'][] = 'themes/default/style.min.css';                         // #461, #477
		$update['items'][] = 'includes/upload_image.inc.php';                        // #462
		$update['items'][] = 'modules/b8/';                                          // #463
		$update['items'][] = 'js/admin.js';                                          // #466
		$update['items'][] = 'js/admin.min.js';                                      // #466
		$update['items'][] = 'includes/functions.inc.php';                           // #467, #478
		$update['items'][] = 'includes/posting.inc.php';                             // #469, #471
		$update['items'][] = 'themes/default/subtemplates/entry.inc.tpl';            // #469, #470
		$update['items'][] = 'themes/default/subtemplates/index.inc.tpl';            // #469, #471
		$update['items'][] = 'themes/default/subtemplates/index_table.inc.tpl';      // #469, #471
		$update['items'][] = 'themes/default/subtemplates/thread.inc.tpl';           // #469, #470
		$update['items'][] = 'themes/default/subtemplates/thread_linear.inc.tpl';    // #469, #470
		$update['items'][] = 'includes/user.inc.php';                                // #470
		$update['items'][] = 'lang/';                                                // #470, #471
		$update['items'][] = 'themes/default/main.tpl';                              // #470
		$update['items'][] = 'themes/default/subtemplates/admin.inc.tpl';            // #470
		$update['items'][] = 'themes/default/subtemplates/posting.inc.tpl';          // #471
		$update['items'][] = 'includes/index.inc.php';                               // #472
		$update['items'][] = 'js/posting.js';                                        // #475
		$update['items'][] = 'js/posting.min.js';                                    // #475
		$update['items'][] = 'includes/rss.inc.php';                                 // #476
		$update['items'][] = 'themes/default/style.css';                             // #477
		$update['items'][] = 'includes/admin.inc.php';                               // #478
		$update['items'][] = 'includes/user.inc.php';                                // #478
	case '2.4.99.1':
		$update['items'][] = 'lang/';                                                // #489, #501
		$update['items'][] = 'themes/default/subtemplates/admin.inc.tpl';            // #489
		$update['items'][] = 'themes/default/subtemplates/contact.inc.tpl';          // #489, #501, #505
		$update['items'][] = 'themes/default/subtemplates/posting.inc.tpl';          // #494
		$update['items'][] = 'themes/default/main.tpl';                              // #503, #504
		$update['items'][] = 'includes/admin.inc.php';                               // #489
		$update['items'][] = 'includes/contact.inc.php';                             // #489, #501, #505
		$update['items'][] = 'includes/posting.inc.php';                             // #491, #494, #505
		$update['items'][] = 'includes/user.inc.php';                                // #505
		$update['items'][] = 'includes/entry.inc.php';                               // #505
		$update['items'][] = 'includes/thread.inc.php';                              // #505
		$update['items'][] = 'includes/functions.inc.php';                           // #498, #499
		$update['items'][] = 'includes/mailer.inc.php';                              // #498
		$update['items'][] = 'modules/phpmailer/';                                   // #498
		$update['items'][] = 'config/php_mailer.php';                                // #498
		$update['items'][] = 'config/b8_config.php';                                 // #493
		$update['items'][] = 'index.php';                                            // #498
	case '2.4.99.2':
		$update['items'][] = 'index.php';                                            // without pull request
		$update['items'][] = 'includes/admin.inc.php';                               // without pull request
		$update['items'][] = 'includes/entry.inc.php';                               // #509
	case '2.4.99.3':
		$update['items'][] = 'config/b8_config.php';
		$update['items'][] = 'includes/';
		$update['items'][] = 'js/';
		$update['items'][] = 'lang/';
		$update['items'][] = 'modules/';
		$update['items'][] = 'themes/default/';
		$update['items'][] = 'index.php';
	case '20220508.1':
		$update['items'][] = 'themes/default/main.tpl';
		$update['items'][] = 'themes/default/style.css';
		$update['items'][] = 'themes/default/style.min.css';
		$update['items'][] = 'lang/croatian.lang';
		$update['items'][] = 'lang/english.lang';
		$update['items'][] = 'lang/italian.lang';
		$update['items'][] = 'lang/spanish.lang';
		$update['items'][] = 'lang/tamil.lang';
		$update['items'][] = 'lang/turkish.lang';
	case '20220509.1':
		$update['items'][] = 'includes/functions.inc.php';
		$update['items'][] = 'themes/default/main.tpl';
		$update['items'][] = 'themes/default/style.css';
		$update['items'][] = 'themes/default/style.min.css';
	case '20220517.1':
		$update['items'][] = 'includes/entry.inc.php';
		$update['items'][] = 'includes/index.inc.php';
		$update['items'][] = 'includes/functions.inc.php';
		$update['items'][] = 'lang/';
		$update['items'][] = 'themes/default/images/keep_eye_on.png';
		$update['items'][] = 'themes/default/style.css';
		$update['items'][] = 'themes/default/style.min.css';
		$update['items'][] = 'themes/default/subtemplates/admin.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/entry.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/index.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/index_table.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/user.inc.tpl';
		$update['items'][] = 'themes/default/images/bg_gradient_x.png (remove)';
		$update['items'][] = 'themes/default/images/bg_gradient_y.png (remove)';
	case '20220529.1':
		$update['items'][] = 'includes/functions.inc.php';
		$update['items'][] = 'includes/search.inc.php';
		$update['items'][] = 'includes/admin.inc.php';
		$update['items'][] = 'includes/upload_image.inc.php';
		$update['items'][] = 'includes/posting.inc.php';
		$update['items'][] = 'themes/default/style.css';
		$update['items'][] = 'themes/default/style.min.css';
		$update['items'][] = 'themes/default/subtemplates/entry.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/posting.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/thread.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/thread_linear.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/posting_flag_ham.inc.tpl';
		$update['items'][] = 'themes/default/subtemplates/posting_report_spam.inc.tpl';
	case 'YYYYMMDD.I' /** VERSION NUMBER TO BE DEFINED **/
		$update['items'][] = 'themes/default/main.tpl';
		// !!!Do *NOT* add 'break;' to a single case!!!
		// This is the only break to avoid the use of the default-case!
		break;
	default:
		$update['items'][] = 'includes/';
		$update['items'][] = 'js/';
		$update['items'][] = 'lang/';
		$update['items'][] = 'modules/';
		$update['items'][] = 'templates (not required anymore)/';
		$update['items'][] = 'templates_c (clear)/';
		$update['items'][] = 'themes/';
		$update['items'][] = 'config/time_zones';
		$update['items'][] = 'index.php';
		break;
}

// Remove duplicate entries in array
$update['items'] = array_unique($update['items']);
// Look for unique folders
$folders = array_unique(preg_grep("/\w+\/$/i", $update['items']));
if (!empty($folders)) {
	// Remove folders from list to keep the order (files, folders)
	$update['items'] = array_diff($update['items'], $folders);
	
	// Remove sub-folders from folder list
	$tmp = $folders;
	foreach ($folders as $folder) {
	    $removeFolders = preg_grep("/^".preg_quote($folder, "/").".+/i", $folders);
		if (empty($removeFolders))
			continue;
		$tmp = array_diff($tmp, $removeFolders);
	}
	$folders = $tmp;
	sort($folders);
	
	// Remove single files from list if and only if the complete folder is in list
	foreach ($folders as $folder) {
		$removeFiles = preg_grep("/^".preg_quote($folder, "/").".+/i", $update['items']);
		if (empty($removeFiles))
			continue;
		$update['items'] = array_diff($update['items'], $removeFiles);
	}
	sort($update['items']);
	
	// Add folders at the end of the files list to keep the order (files, folders)
	$update['items'] = array_merge($update['items'], $folders);
}

// check version:
if (!file_exists('config/VERSION')) {
	$update['errors'][] = 'Error in line '.__LINE__.': Missing the file config/VERSION. Load it up from your script package (config/VERSION) before proceeding.';
}
if (empty($update['errors'])) {
	$newVersion = file_get_contents('config/VERSION');
	if (empty($newVersion)) die('Error in line '.__LINE__.': No value for the script version in the file config/VERSION.');
	else $newVersion = trim($newVersion);
	if (compare_versions(array('old' => $settings['version'], 'new' => $newVersion)) !== true) {
		$update['errors'][] = 'Error in line '.__LINE__.': The version you want to install (see string in config/VERSION) must be greater than the current installed version. Current version: '. htmlspecialchars($settings['version']) .', version you want to install: '.  htmlspecialchars($newVersion) .'. Please check also if you uploaded the actual file version of config/VERSION. Search therefore for the file date and compare it with the date from the installation package.';
	}
	if (!in_array($settings['version'], $update['version'])) {
		$update['errors'][] = 'Error in line '.__LINE__.': This update file doesn\'t work with the current version.';
	}
}
// disable the forum until database update is done
if (empty($update['errors'])) {
	if(!@mysqli_query($connid, "UPDATE ".$db_settings['settings_table']." SET  value = '0' WHERE name =  'forum_enabled'")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
}
// changes for version 2.5
if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24'))) {
	$table_prefix = preg_replace('/settings$/u', '', $db_settings['settings_table']);
	// add new database table
	if (file_exists("./config/db_settings.php") && is_writable("./config/db_settings.php")) {
		$db_settings['b8_wordlist_table'] = $table_prefix . 'b8_wordlist';
		$db_settings['b8_rating_table'] = $table_prefix . 'b8_rating';
		$db_settings['akismet_rating_table'] = $table_prefix . 'akismet_rating';
		$db_settings['uploads_table'] = $table_prefix . 'uploads';
		$db_settings_file = @fopen("./config/db_settings.php", "w") or $update['errors'][] = str_replace("[CHMOD]", $chmod, $lang['error_overwrite_config_file']);
		if (empty($update['errors'])) {
			flock($db_settings_file, 2);
			fwrite($db_settings_file, "<?php\r\n");
			fwrite($db_settings_file, "\$db_settings['host']                 = '". addslashes($db_settings['host']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['user']                 = '". addslashes($db_settings['user']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['password']             = '". addslashes($db_settings['password']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['database']             = '". addslashes($db_settings['database']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['settings_table']       = '". addslashes($db_settings['settings_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['forum_table']          = '". addslashes($db_settings['forum_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['category_table']       = '". addslashes($db_settings['category_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['userdata_table']       = '". addslashes($db_settings['userdata_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['smilies_table']        = '". addslashes($db_settings['smilies_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['pages_table']          = '". addslashes($db_settings['pages_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['banlists_table']       = '". addslashes($db_settings['banlists_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['useronline_table']     = '". addslashes($db_settings['useronline_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['login_control_table']  = '". addslashes($db_settings['login_control_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['entry_cache_table']    = '". addslashes($db_settings['entry_cache_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['userdata_cache_table'] = '". addslashes($db_settings['userdata_cache_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['bookmark_table']       = '". addslashes($db_settings['bookmark_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['bookmark_tags_table']  = '". addslashes($db_settings['bookmark_tags_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['entry_tags_table']     = '". addslashes($db_settings['entry_tags_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['tags_table']           = '". addslashes($db_settings['tags_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['read_status_table']    = '". addslashes($db_settings['read_status_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['temp_infos_table']     = '". addslashes($db_settings['temp_infos_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['subscriptions_table']  = '". addslashes($db_settings['subscriptions_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['b8_wordlist_table']    = '". addslashes($db_settings['b8_wordlist_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['b8_rating_table']      = '". addslashes($db_settings['b8_rating_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['akismet_rating_table'] = '". addslashes($db_settings['akismet_rating_table']) ."';\r\n");
			fwrite($db_settings_file, "\$db_settings['uploads_table']        = '". addslashes($db_settings['uploads_table']) ."';\r\n");
			fwrite($db_settings_file, "?>\r\n");
			flock($db_settings_file, 3);
			fclose($db_settings_file);
			
			// drop possibly existing new tables from previous tests with a pre release
			if (!@mysqli_query($connid, "DROP TABLE IF EXISTS `" . $db_settings['akismet_rating_table'] . "`")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			if (!@mysqli_query($connid, "DROP TABLE IF EXISTS `" . $db_settings['b8_rating_table'] . "`")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			if (!@mysqli_query($connid, "DROP TABLE IF EXISTS `" . $db_settings['b8_wordlist_table'] . "`")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			if (!@mysqli_query($connid, "DROP TABLE IF EXISTS `" . $db_settings['uploads_table'] . "`")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			
			// new tables
			if (!@mysqli_multi_query($connid, "CREATE TABLE IF NOT EXISTS `" . $db_settings['akismet_rating_table'] . "` (`eid` int(11) NOT NULL, `spam` tinyint(1) NOT NULL DEFAULT '0', `spam_check_status` tinyint(1) NOT NULL DEFAULT '0', PRIMARY KEY (`eid`)) CHARSET=utf8 COLLATE=utf8_general_ci;")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			
			if (!@mysqli_multi_query($connid, "CREATE TABLE IF NOT EXISTS `" . $db_settings['b8_rating_table'] . "` (`eid` int(11) NOT NULL, `spam` tinyint(1) NOT NULL DEFAULT '0', `training_type` tinyint(1) NOT NULL DEFAULT '0', PRIMARY KEY (`eid`)) CHARSET=utf8 COLLATE=utf8_general_ci;")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			
			if (!@mysqli_multi_query($connid, "CREATE TABLE IF NOT EXISTS `" . $db_settings['b8_wordlist_table'] . "` (`token` varchar(128) character set utf8mb4 collate utf8mb4_bin NOT NULL, `count_ham` int unsigned default NULL, `count_spam` int unsigned default NULL, PRIMARY KEY (`token`)) CHARSET=utf8mb4 COLLATE=utf8mb4_bin;")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			
			if (!@mysqli_query($connid, "CREATE TABLE IF NOT EXISTS `" . $db_settings['uploads_table'] . "` (`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, `uploader` int(10) UNSIGNED NULL, `filename` varchar(64) NULL, `tstamp` datetime NULL, PRIMARY KEY (id)) CHARSET=utf8mb4 COLLATE=utf8mb4_bin;")) $update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			
			// changed tables
			if(!@mysqli_query($connid, "INSERT INTO `" . $db_settings['settings_table'] . "` (`name`, `value`) VALUES ('uploads_per_page', '20'), ('bbcode_latex', '0'), ('bbcode_latex_uri', 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS_CHTML.js'), ('b8_entry_check', '1'), ('b8_auto_training', '1'), ('b8_spam_probability_threshold', '80');")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "DELETE FROM `" . $db_settings['settings_table'] . "` WHERE name = 'bbcode_tex';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "DELETE FROM `" . $db_settings['settings_table'] . "` WHERE name = 'bbcode_flash';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "DELETE FROM `" . $db_settings['settings_table'] . "` WHERE name = 'flash_default_width';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "DELETE FROM `" . $db_settings['settings_table'] . "` WHERE name = 'flash_default_height';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "INSERT INTO `" . $db_settings['b8_wordlist_table'] . "` (`token`, `count_ham`, `count_spam`) VALUES ('b8*dbversion', '3', NULL), ('b8*texts', '0', '0');")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "INSERT INTO `" . $db_settings['akismet_rating_table'] . "` (`eid`, `spam`, `spam_check_status`) SELECT `id`, `spam`, `spam_check_status` FROM `" . $db_settings['forum_table'] ."`;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "INSERT INTO `" . $db_settings['b8_rating_table'] . "` (`eid`, `spam`, `training_type`) SELECT `id`, `spam`, 0 FROM `" . $db_settings['forum_table'] ."`;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "UPDATE `" . $db_settings['settings_table'] . "` SET `name`='spam_check_registered' WHERE `name`='akismet_check_registered';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['forum_table'] . "` DROP `spam`, DROP `spam_check_status`;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
		}
	}
	else {
		$update['errors'][] = 'Error, file "./config/db_settings.php" not found in line '.__LINE__.'!';
	}
}

if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0'))) {
	// changed tables
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['b8_wordlist_table'] . "` CHANGE `token` `token` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '';")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['banlists_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['bookmark_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['category_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['forum_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['entry_cache_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['pages_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['tags_table'] . "` CHANGE `tag` `tag` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['tags_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CHANGE `user_name` `user_name` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL, CHANGE `user_email` `user_email` VARCHAR(255);")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CHANGE `user_email` `user_email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_cache_table'] . "` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	$uaa = ($settings['user_area_public'] == 0) ? 2 : 1;
	if(!@mysqli_query($connid, "INSERT INTO `" . $db_settings['settings_table'] . "` (`name`, `value`) VALUES ('user_area_access', ". intval($uaa) .");")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if(!@mysqli_query($connid, "DELETE FROM `" . $db_settings['settings_table'] . "` WHERE name = 'user_area_public';")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
}

if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1'))) {
	$resEmailMultiUse = mysqli_query($connid, "SELECT `user_id`, `user_name`, `user_email` FROM `" . $db_settings['userdata_table'] . "` WHERE `user_email` IN(SELECT `user_email` FROM `" . $db_settings['userdata_table'] . "` GROUP BY `user_email` HAVING COUNT(`user_email`) > 1) ORDER BY `user_email` ASC, `user_name` ASC");
	if ($resEmailMultiUse === false) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if (empty($update['errors'])) {
		if (mysqli_num_rows($resEmailMultiUse) > 0) {
			# list the doubled user names
			$update['errors'][]  = '<h3><strong>Attention</strong>: Found non-unique e-mail-addresses of user accounts!</h3>';
			$update['errors'][] .= '<p>Please make the e-mail-addresses unique and inform the users in question about the changes. <em>Tip:</em> Open the links to the user edit forms in a new browser tab. After editing all listed users start the update process again.</p>';
			$update['errors'][] .= '<table>';
			$update['errors'][] .= '<tr><th>E-mail-address</th><th>Username</th></tr>';
			while ($row = mysqli_fetch_assoc($resCountNames)) {
				$update['errors'][] .= '<tr><td>'. htmlspecialchars($row['user_email']) .'</td><td><a href="?mode=admin&amp;edit_user='. intval($row['user_id']) .'">'. htmlspecialchars($row['user_name']) .'</a></td></tr>'."\n";
			}
			$update['errors'][] .= '<table>';
			mysqli_free_result($result);
		} else {
			// changed tables
			if (!@mysqli_query($connid, "INSERT INTO `" . $db_settings['settings_table'] . "` (`name`, `value`) VALUES ('b8_mail_check', '0'), ('php_mailer', '0');")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['b8_wordlist_table'] . "` CHANGE `token` `token` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '';")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['tags_table'] . "` CHANGE `tag` `tag` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if(!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CHANGE `user_name` `user_name` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['banlists_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['category_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['forum_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['smilies_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['pages_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['useronline_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['login_control_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['entry_cache_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_cache_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['b8_rating_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['akismet_rating_table'] . "` ENGINE=InnoDB;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` DROP INDEX `user_name`, ADD UNIQUE KEY `key_user_name` (`user_name`);")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CHANGE `user_email` `user_email` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
			if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` ADD UNIQUE KEY `key_user_email` (`user_email`);")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
		}
	}
}

if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1', '2.4.99.2', '2.4.99.3'))) {
	// changed tables
	if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` ADD `inactivity_notification` BOOLEAN NOT NULL DEFAULT FALSE, ADD `browser_window_target` tinyint(4) NOT NULL DEFAULT '0' AFTER `user_lock`;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['b8_rating_table'] . "` ADD KEY `B8_spam` (`spam`), ADD KEY `B8_training_type` (`training_type`);")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	if (!@mysqli_query($connid, "INSERT INTO `" . $db_settings['settings_table'] . "` (`name`, `value`) VALUES ('delete_inactive_users', '30'), ('notify_inactive_users', '3'), ('link_open_target', '');")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
}

if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1', '2.4.99.2', '2.4.99.3', '20220508.1', '20220509.1'))) {
	// changed tables
	if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['userdata_table'] . "` CHANGE `user_email` `user_email` VARCHAR(255) CHARACTER SET utf8 NOT NULL;")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
}

if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1', '2.4.99.2', '2.4.99.3', '20220508.1', '20220509.1', '20220517.1', '20220529.1'))) {
	// changed tables
	$rEN_exists = mysqli_query($connid, "SHOW COLUMNS FROM `". $db_settings['forum_table'] ."` LIKE 'email_notification'");
	if (mysqli_num_rows($rEN_exists) > 0) {
		if (!@mysqli_query($connid, "ALTER TABLE `" . $db_settings['forum_table'] . "` DROP `email_notification`;")) {
			$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
		}
	}
	$rObsoleteIndexes = mysqli_query($connid, "SELECT DISTINCT INDEX_NAME AS obsolete_key
	FROM information_schema.STATISTICS 
	WHERE TABLE_SCHEMA LIKE '". $db_settings['database'] ."' AND
	TABLE_NAME LIKE '" . $db_settings['userdata_table'] ."' AND 
	INDEX_NAME LIKE 'user_%';");
	if (mysqli_num_rows($rObsoleteIndexes) > 0) {
		while ($row  = mysqli_fetch_assoc($rObsoleteIndexes)) {
			if (!@mysqli_query($connid, "DROP INDEX ". $row['obsolete_key'] ." ON " . $db_settings['userdata_table'] .";")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
		}
	}
}

/** VERSION NUMBER TO BE DEFINED: 'YYYYMMDD.I' **/
if (empty($update['errors']) && in_array($settings['version'], array('2.4.19.1', '2.4.20', '2.4.21', '2.4.22', '2.4.23', '2.4.24', '2.4.99.0', '2.4.99.1', '2.4.99.2', '2.4.99.3', '20220508.1', '20220509.1', '20220517.1', '20220529.1', 'YYYYMMDD.I'))) {
	// changed tables
	if (!@mysqli_query($connid, "UPDATE `" . $db_settings['settings_table'] . "` SET `bbcode_latex_uri` = 'https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js';")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
}

if (empty($update['errors'])) {
	if (!@mysqli_query($connid, "UPDATE ".$db_settings['temp_infos_table']." SET value='". mysqli_real_escape_string($connid, $newVersion) ."' WHERE name = 'version'")) {
		$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
	}
	else {
		// Set new Version for update script output, taken from VERSION file.
		$update['new_version'] = $newVersion;
		// reenable the forum after database update is done
		if (empty($update['errors'])) {
			if (!@mysqli_query($connid, "UPDATE ".$db_settings['settings_table']." SET value = '1' WHERE name =  'forum_enabled'")) {
				$update['errors'][] = 'Database error in line '.__LINE__.': ' . mysqli_error($connid);
			}
		}
	}
}

?>
