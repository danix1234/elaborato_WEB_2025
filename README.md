## problems on linux:

- `website/img` needs to be given 777 permissions, otherwise xampp reports a permission error, when trying to upload images
- if errors are not reported, try setting `display_errors=On` in `/opt/lampp/etc/php.ini`
- if `reset-admin.php` not work in linux and say something about using `mysql_upgrade`, try running: `sudo /opt/lampp/bin/mysql_upgrade -u root -p`
