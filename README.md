# magento2-geo-ip-store-currency-switcher
auto switch to correct store &amp; currency base on IP of customer

This solution uses Apache GEO IP module, it get IP from GEOIP_COUNTRY_CODE env variable then set store for Magento. Reference here about Apache GEO IP module: https://kb.layershift.com/enable-apache-mod_geoip


Add switch store code in index.php file. 

if($_SERVER['HTTP_HOST'] == 'example.domain.com'){
    switch ($_SERVER['GEOIP_COUNTRY_CODE']){
        case 'US':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_us';
            break;
        case 'GB':
            $_SERVER['MAGE_RUN_CODE'] = 'site1_store_gb';
            break;
            
            ...

If you use index.php in webroot add this code to index in webroot
If you use index.php in pub add this code to index in pub
