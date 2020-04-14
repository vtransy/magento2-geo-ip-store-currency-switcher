<?php
/**
 * Public alias for the application entry point
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;

try {
    require __DIR__ . '/../app/bootstrap.php';
} catch (\Exception $e) {
    echo <<<HTML
<div style="font:12px/1.35em arial, helvetica, sans-serif;">
    <div style="margin:0 0 25px 0; border-bottom:1px solid #ccc;">
        <h3 style="margin:0;font-size:1.7em;font-weight:normal;text-transform:none;text-align:left;color:#2f2f2f;">
        Autoload error</h3>
    </div>
    <p>{$e->getMessage()}</p>
</div>
HTML;
    exit(1);
}

/**GEO IP switch store Start**/
if($_SERVER['HTTP_HOST'] == 'example.domain.com'){
    switch ($_SERVER['GEOIP_COUNTRY_CODE']){
        case 'US':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_us';
            break;
        case 'GB':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_gb';
            break;
        case 'CA':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_ca';
            break;
        case 'NZ':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_nz';
            break;
        case 'IE':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_ie';
            break;
        case 'ZA':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_za';
            break;
        //EU countries
        case 'AL':
        case 'AD':
        case 'AM':
        case 'AT':
        case 'BY':
        case 'BE':
        case 'BA':
        case 'BG':
        case 'CH':
        case 'CY':
        case 'CZ':
        case 'DE':
        case 'DK':
        case 'EE':
        case 'ES':
        case 'FO':
        case 'FI':
        case 'FR':
        case 'GE':
        case 'GI':
        case 'GR':
        case 'HU':
        case 'HR':
        case 'IS':
        case 'IT':
        case 'LI':
        case 'LT':
        case 'LU':
        case 'LV':
        case 'MC':
        case 'MK':
        case 'MT':
        case 'NO':
        case 'NL':
        case 'PL':
        case 'PT':
        case 'RO':
        case 'RU':
        case 'SE':
        case 'SI':
        case 'SK':
        case 'SM':
        case 'TR':
        case 'UA':
        case 'VA':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_eu';
            break;
        default:
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_au';
    }
}

if($_SERVER['HTTP_HOST'] == 'other.domain.com'){
    switch ($_SERVER['GEOIP_COUNTRY_CODE']){
        case 'US':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_us';
            break;
        case 'GB':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_gb';
            break;
        case 'CA':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_ca';
            break;
        case 'NZ':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_nz';
            break;
        case 'IE':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_ie';
            break;
        case 'ZA':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_za';
            break;
        //EU countries    
        case 'AL':
        case 'AD':
        case 'AM':
        case 'AT':
        case 'BY':
        case 'BE':
        case 'BA':
        case 'BG':
        case 'CH':
        case 'CY':
        case 'CZ':
        case 'DE':
        case 'DK':
        case 'EE':
        case 'ES':
        case 'FO':
        case 'FI':
        case 'FR':
        case 'GE':
        case 'GI':
        case 'GR':
        case 'HU':
        case 'HR':
        case 'IS':
        case 'IT':
        case 'LI':
        case 'LT':
        case 'LU':
        case 'LV':
        case 'MC':
        case 'MK':
        case 'MT':
        case 'NO':
        case 'NL':
        case 'PL':
        case 'PT':
        case 'RO':
        case 'RU':
        case 'SE':
        case 'SI':
        case 'SK':
        case 'SM':
        case 'TR':
        case 'UA':
        case 'VA':
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_eu';
            break;
        default:
            $_SERVER['MAGE_RUN_CODE'] = 'site2_store_au';
    }
}
/**GEO IP switch store END**/

$params = $_SERVER;
$params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] = array_replace_recursive(
    $params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] ?? [],
    [
        DirectoryList::PUB => [DirectoryList::URL_PATH => ''],
        DirectoryList::MEDIA => [DirectoryList::URL_PATH => 'media'],
        DirectoryList::STATIC_VIEW => [DirectoryList::URL_PATH => 'static'],
        DirectoryList::UPLOAD => [DirectoryList::URL_PATH => 'media/upload'],
    ]
);
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);
$bootstrap->run($app);
