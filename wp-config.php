<?php

/*
 * Don't edit this file, put your custom config in config-custom.php
 */

if (!file_exists(__DIR__ . '/config.php')) {
    throw new Exception('Failed to include "config.php"');
}

// ==================
// Include config.php
// ==================
require_once(__DIR__ . '/config.php');

// =========================
// Include config-custom.php
// =========================
if (file_exists(__DIR__ . '/config-custom.php')) {
    require_once(__DIR__ . '/config-custom.php');
}

// =============================
// Security settings and Headers
// =============================

/* Cookies only accesable through HTTP protocol, no script access */
@ini_set('session.cookie_httponly', true);

if ($ssl) {
    /* Only send Cookies over secure SSL connection */
    @ini_set('session.cookie_secure', true);
}

/* Allow only session ID's by cookie not by URL */
@ini_set('session.use_only_cookies', true);

/* Prevent Clickjacking attacks, allow only iframe from same orgin */
header('X-Frame-Options: SAMEORIGIN');

/* Allows a site to control how much information the browser includes with navigations away from a document */
header('Referrer-Policy: same-origin');

/* Helps mitigate Cross-site scripting (XSS) attacks */
header('X-XSS-Protection: 1; mode=block');

/* Instructs IE not to sniff mime types, preventing attacks related to mime-sniffing */
header('X-Content-Type-Options: nosniff');

if ($ssl) {
    /* Only communicate with the server over SSL */
    header('Strict-Transport-Security: max-age=31536000; includeSubdomains; preload');
}

/* A content security policy can prevent the browser from loading malicious assets */
// header('Content-Security-Policy: default-src \'self\' \'unsafe-inline\' \'unsafe-eval\' https: data:');

/* Feature Policy will allow a site to enable or disable certain browser features and APIs */
header('Feature-Policy: microphone \'none\'; payment \'none\'; sync-xhr \'self\' ' . $siteUrl);

// =============
// Site settings
// =============
define('WP_HOME', $siteUrl);
define('WP_SITEURL', $siteUrl);
define('WPLANG', 'nl_NL');

// ============
// SSL settings
// ============
define('FORCE_SSL_ADMIN', $ssl);

// ==================
// Multisite settings
// ==================
if ($multisite) {
    $domain = \parse_url($siteUrl);
    define('MULTISITE', $multisite);
    define('SUBDOMAIN_INSTALL', $multisiteSubdomainInstall);
    define('DOMAIN_CURRENT_SITE', $domain['host']);
    define('PATH_CURRENT_SITE', empty($domain['path']) ? '/' : $domain['path']);
    define('SITE_ID_CURRENT_SITE', 1);
    define('BLOG_ID_CURRENT_SITE', 1);
}

// =================
// Database settings
// =================
define('DB_NAME', $dbName);
define('DB_USER', $dbUser);
define('DB_PASSWORD', $dbPassword);
define('DB_HOST', $dbHost);
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
$table_prefix = $tablePrefix;

// ==================
// Revisions settings
// ==================
define('WP_POST_REVISIONS', $maxPostRevisions);

// =========================
// Plugin and theme settings
// =========================
define('DISALLOW_FILE_EDIT', !$pluginAndThemeEditor);
define('DISALLOW_FILE_MODS', !$pluginAndThemeUpdateAndInstallation);
define('CORE_UPGRADE_SKIP_NEW_BUNDLED', true);

// ==============
// Debug settings
// ==============
define('WP_DEBUG', $debug);

// =======================
// wp-content dir settings
// =======================
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

// ============
// FTP settings
// ============
define('FTP_BASE', __DIR__);
define('FTP_CONTENT_DIR', __DIR__ . '/wp-content');
define('FTP_PLUGIN_DIR ', __DIR__ . '/wp-content/plugins');
define('FTP_PUBKEY', '');
define('FTP_PRIKEY', '');
define('FTP_HOST', '');
define('FS_METHOD', 'direct');

// =========
// WP tokens
// =========
define('AUTH_KEY', '3GdfK!S3,16Wm(Q@U3PWoP8-_vu)R`4}juh@Jb eZv,J3NDZ2m~3+A IG{K^H_m_');
define('SECURE_AUTH_KEY', '3;0JlK{n!{!)K!urF|m9b~r5DL.Jo,&WeD^azH6Yq_/e.cP*cI1}Fs!H~}sK~yvR');
define('LOGGED_IN_KEY', ';V#[xU^f!Hz!mq$ThpVj_viK9Ew$2Fxd[C6v})Xh|TYPe DKoQ0&CM _aC/4(=8V');
define('NONCE_KEY', 'h/RWnoyb)-2ZQ;eTX<83F{]tZ;{JWh!DBli5u(oMBbvpy*=Jeq?}(_U|IP.L}(00');
define('AUTH_SALT', '6aX>I?)i-f<1_BmTh.Zkpf7,iS4Dz`6GHEzfqk[| l;b?:<JSac>B1NM1w+;HUX;');
define('SECURE_AUTH_SALT', 'GLGhW#|iR@N>65gn?P?Wu:vxKSG;LAAwn1b9[TH{C{}yrUyk)C1]V?VViE|5NsU4');
define('LOGGED_IN_SALT', 'Te| D4ee v4h~`F*Fw$?R67F$*Rv<Qs#CjS*cY5dZdhbSI=eH{*%+Y9;n-mo)YVj');
define('NONCE_SALT', 'mXe78Cl^rd5+]nFj`|88rZXcm<QrhkHt{H`)#F.<MuTBSMkJ*fFL<IZ.kYpX38n,');

// ===================
// Bootstrap WordPress
// ===================
require_once(__DIR__ . '/core/wp-settings.php');