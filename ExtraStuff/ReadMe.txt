The files in this zip-folder are are pulled from different folders within the Larvel structure. 
See notes in each page for location details. 

If your virtual host doesn't work correctly, you might need to edit the following
(make a backup prior to editing)
// -------------------------------------------------------------------
// Create virtual host that points to the subpath \public

uncomment following line in httpd.conf
Include conf/extra/httpd-vhosts.conf

Mod the virtual host in httpd-vhost.conf
# Add \public
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot "[drive path to your root]\public"
    ServerName mvc.mylaravel.local
