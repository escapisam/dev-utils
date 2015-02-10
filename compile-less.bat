d:
cd \Sam\Projects\vapormedia\opsworks-custom-cookbooks\vapormedia_app_dev\.kitchen\kitchen-vagrant\default-ubuntu-1404
vagrant ssh -c "cd /srv/vapormedia-2015/web/less && make %1"
