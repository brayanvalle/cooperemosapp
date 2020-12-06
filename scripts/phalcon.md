sudo apt update
sudo apt install apache2 -y

sudo mkdir /var/www/internacionalizacionapp
sudo chown -R $USER:$USER /var/www/internacionalizacionapp
sudo chmod -R 755 /var/www/internacionalizacionapp
sudo nano /var/www/internacionalizacionapp/index.html

sudo chown -R $USER:$USER /var/www/
sudo chmod -R 755 /var/www/

sudo touch /etc/apache2/sites-available/internacionalizacionapp.conf
sudo nano /etc/apache2/sites-available/internacionalizacionapp.conf
sudo nano /etc/apache2/sites-available/000-default.conf


<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName internacionalizacionapp
    ServerAlias www.internacionalizacionapp 
    DocumentRoot /var/www/internacionalizacionapp
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

sudo a2ensite 000-default.conf
sudo a2ensite internacionalizacionapp.conf

sudo a2dissite 000-default.conf
sudo a2dissite internacionalizacionapp.conf