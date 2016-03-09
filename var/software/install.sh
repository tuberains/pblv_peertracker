# configure lighttpd (web-server)
cp /peertracker/web/lighttpd.conf /etc/lighttpd/lighttpd.conf
/etc/init.d/lighttpd restart
/etc/init.d/lighttpd disable

# reconfigure standard web-server
cp /peertracker/web/uhttpd /etc/config/uhttpd
/etc/init.d/uhttpd restart
/etc/init.d/uhttpd disable

# configure php5
cp /peertracker/web/php.ini /etc/php.ini

# create /www1 + ingredients
mkdir /www1
chmod 777 /www1
cp -r /peertracker/web/serverdata/* /www1/

# delete web data
rm -rf /peertracker/web