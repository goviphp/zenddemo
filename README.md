# testapp
A test app using the Zend framework.

# Requirements:
* XAMPP 5.6.3


## Configurations:
Note: I have installed XAMPP on my Windows D: drive.

Git URL: https://github.com/goviphp/zenddemo.git

1.  Clone the repo (or extract zenddemo.zip) into htdocs folder (D:\xampp\htdocs)	
	- skeleton application 
	
2. Set Environment variable in PATH (;D:\xampp\php)

3. Move to Project directory (cd zenddemo)

4. If system behind the proxy, set the proxy configuration. Otherwise ignore this step
   
    set http_proxy=http://<username>:<password>@<proxy_url>:<proxy-port>
    set https_proxy=http://<username>:<password>@<proxy_url>:<proxy-port>

5. Update the composer.phar (php composer.phar self-update)

6. Install The composer.phar  (php composer.phar install)

7.  D:\xampp\apache\conf\extra\httpd-vhosts.conf
	- Setup the virtualhost as given below:
````
	<VirtualHost zenddemo:80>
		DocumentRoot "D:/xampp/htdocs/zenddemo/public"
		ServerName zenddemo
		ErrorLog "logs/zenddemo-error.log"
		CustomLog "logs/zenddemo-access.log" combined
		SetEnv APPLICATION_ENV "development"
		<Directory D:/xampp/htdocs/zenddemo/public>
				DirectoryIndex index.php
				AllowOverride All
				Order allow,deny
				Allow from all
		</Directory>
	</VirtualHost>
````
8.  C:\Windows\System32\drivers\etc\hosts
	- Map virtual host server name (zenddemo) into local ip address
	- add the below line into hosts file
````
		127.0.0.1	zenddemo
````
9.  Start the apache server by using XAMPP-control panel application (available inside the D:\xampp folder)

10.  Open your browser and run the testapp http://zenddemo


## Folder Structures
1.  zenddemo
	- application (where we can start write all our MVC logics)
		- configs
		- controllers
		- layouts
		- models
		- views
		- Bootstrap.php
	- docs
	- vendor
	- public - Where server will starts the app
		- index.php
		- .htaccess
		- css/js
 
	- tests

Please go through the link for more informations: http://framework.zend.com/manual/1.12/en/learning.quickstart.html
