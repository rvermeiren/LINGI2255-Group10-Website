#Wecitizens.be

##Website installation

###Files installation

####Exact copy
- Clone this repository into the main folder of your server (www or www/html)

####Fresh wordpress installation
- Download the wordpress zip on https://wordpress.org/download/
- Exctract the new wordpress folder into the main folder of your server (**/www/** or **/www/html/**)
- Clone this repository into an other folder and copy/paste the **/wp-content/** folder in the main directory of the fresh wordpress installation

###Set the permission of the folder with theses rules : 
Sources : https://codex.wordpress.org/Hardening_WordPress

For this, you can use the *chmod* command but never set all the permission "*777*" this cause major security issue on your website. 

- Into the main directory :
  - **/** : The root WordPress directory: all files should be writable only by your user account, except **.htaccess** if you want WordPress to automatically generate rewrite rules for you.
  - **/wp-admin/** : The WordPress administration area: all files should be writable only by your user account.
  - **/wp-includes/** : The bulk of WordPress application logic: all files should be writable only by your user account.
  - **/wp-content/** : User-supplied content: intended to be writable by your user account and the web server process.
- Within /wp-content/ you will find:
  - **/wp-content/themes/** : Theme files. If you want to use the built-in theme editor, all files need to be writable by the web server process. If you do not want to use the built-in theme editor, all files can be writable only by your user account.
  - **/wp-content/plugins/** : Plugin files: all files should be writable only by your user account.
- Other directories that may be present with **/wp-content/** should be documented by whichever plugin or theme requires them. Permissions may vary.

###Database installation

- Extract the sql.zip from the main directory of this repository to get the dump sql to load
- Load the sql file with mysql command line or phpmyadmin tool if provided
  - Due to the size of the database, you need to disable the time limit to load the sql file
- Change the field 1 and 36 of the **wp_option** table with the domain name of the website or ip address of the server if you don't have a domain name
- Configure the database information into the **wp-config.php** file


##Lauching

Normaly, the website work directly at the adress put into the database. If you meet a white page, verify the different step or the file permission.