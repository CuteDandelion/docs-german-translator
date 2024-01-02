#!/bin/bash

# Setup Node.js
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash
source ~/.bashrc
nvm install 12.22.12
nvm use 12.22.12

# Display Node.js version
node -v

# Setup PHP
sudo apt update
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install -y php8.0 php8.0-mbstring php8.0-xml php8.0-zip php8.0-pdo php8.0-pdo-mysql

# Display PHP version
php -v

# Install Composer
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Display Composer version
composer --version

# Set PHP configuration
sudo sed -i 's/memory_limit = .*/memory_limit = -1/' /etc/php/8.0/cli/php.ini
sudo sed -i 's/post_max_size = .*/post_max_size = 512M/' /etc/php/8.0/cli/php.ini
sudo sed -i 's/upload_max_filesize = .*/upload_max_filesize = 512M/' /etc/php/8.0/cli/php.ini

#
