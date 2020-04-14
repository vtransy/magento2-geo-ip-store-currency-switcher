# magento2-geo-ip-store-currency-switcher
Auto switch to correct store &amp; currency base on IP of customer for Magento 2

This solution uses Apache GEO IP module, it get IP from GEOIP_COUNTRY_CODE env variable then set store for Magento. Reference here about Apache GEO IP module: https://kb.layershift.com/enable-apache-mod_geoip

If you use Nginx, you can check geoip for Nginx here: http://nginx.org/en/docs/http/ngx_http_geoip_module.html

Add switch store code in index.php file (view detail in index.php file of repo). 
- If you use index.php in webroot add this code to index in webroot
- If you use index.php in pub add this code to index in pub
