### Directory Structure

- `/application` contains the Codeigniter PHP application, that is served by Apache
- `/phpmyadmin` contains the phpmyadmin source
- `/wsserver` contains the Node.js websocket server

### Setting up the development environment (for MacOSX)

#### Enable Apache

```
apachectl start
```

#### Enable PHP for Apache

edit the `/etc/apache2/httpd.conf` file to uncomment the following line

```
LoadModule php7_module libexec/apache2/libphp7.so
```

#### Install MySQL, from https://dev.mysql.com/downloads/mysql/

#### Connect PHP to MySQL

```
mkdir /var/mysql
cd /var/mysql
ln -s /tmp/mysql.sock mysql.sock
```

#### Create VirtualHosts

Withough using VirtualHosts, every project you create will be accessible at
their particular paths. For example: `http://localhost/rhombus`. In order to
access the sites individually instead, in our case `http://rhombus.local`, we must create a corresponding VirtualHost. To do so, uncomment the following two lines in `/etc/apache2/httpd.conf`

```
Include /private/etc/apache2/extra/httpd-userdir.conf
Include /private/etc/apache2/extra/httpd-vhosts.conf
```

These two lines do exactly what they say, they load supplimental configuration
files from the `/private/etc/apache2/extra` directory. These are just other
configuration files responsible for settings corresponding to specific functions.

Also uncomment the following line:

```
LoadModule userdir_module libexec/apache2/mod_userdir.so
```

Then, edit `/private/etc/apache2/extra/httpd_userdir.conf` to uncomment the
following line

```
Include /private/etc/apache2/users/*.conf
```

This asks apache to load user specific configuration files from the `/private/etc/apache2/users/` directory. Lets' create a configuration file `/private/etc/apache2/users/your_username.conf` there, that we'll use to specify filesystem specific configuration settings. Add the following content to the file

```
<Directory "/Users/your_username/Sites/">
  AllowOverride All
  Options Indexes MultiViews FollowSymLinks
  Require all granted
</Directory>
```

This grants apache the necessary permissions to access your projects within the
`~/Sites` folder, which, by convention, is the location for all the hosted websites
on a server.

Now that apache can access this location, let's create a VirtualHost that points to a project within this location. Edit the `/private/etc/apache2/extra/httpd-vhosts.conf` file that we included before, to add the following to it:

```
<VirtualHost *:80>
  DocumentRoot "/Users/your_username/Sites/rhombus/"
  ServerName rhombus.local
 	ErrorLog "/private/var/log/apache2/rhombus.local-error_log"
  CustomLog "/private/var/log/apache2/rhombus.local-access_log" common
</VirtualHost>
```

If you try to access `http://rhombus.local`, Apache will try to host an
index file from within `~/Sites/rhombus` folder. This is where we shall host
our Codeigniter & phpmyadmin apps from. Tada!

#### Clone the project

```
git clone https://github.com/ironstein0/user_sessions ~/Sites/rhombus
```

This will give you Codeigniter and phpmyadmin out of the box.

#### Setup database

Setup your mysql development database, and then add the credentials to `application/config/database.php`

#### Start the servers

Finally, restart apache so that it is configured as per the new settings

```
sudo apachectl restart
```

Then, spin up the node websocket server. To do so

```
cd wsserver
npm install
npm start
```
