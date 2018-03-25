Vagrant.configure("2") do |config|

    config.ssh.username = "vagrant"
    config.ssh.password = "vagrant"
    config.vm.box = "scotch/box"
    config.vm.box_version = "2.5"
    config.vm.network "private_network", ip: "192.168.33.44"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www/carpelanther.dev", :mount_options => ["dmode=777","fmode=666"]
    config.vm.provision "shell", inline: <<-SHELL

        # Import a  database TODO
        # mysql -u root -proot scotchbox < /var/www/carpelanther.dev/etc/database/setup.sql
        # mysql -u root -proot scotchbox < /var/www/dump.sql

        ## Only thing you probably really care about is right here
        DOMAINS=("carpelanther.dev")

        ## Loop through all sites
        for ((i=0; i < ${#DOMAINS[@]}; i++)); do

            ## Current Domain
            DOMAIN=${DOMAINS[$i]}

            echo "Creating directory for $DOMAIN..."
            mkdir -p /var/www/$DOMAIN/public

            echo "Creating vhost config for $DOMAIN..."
            sudo cp /etc/apache2/sites-available/scotchbox.local.conf /etc/apache2/sites-available/$DOMAIN.conf

            echo "Updating vhost config for $DOMAIN..."
            sudo sed -i s,scotchbox.local,$DOMAIN,g /etc/apache2/sites-available/$DOMAIN.conf
            sudo sed -i s,/var/www/public,/var/www/$DOMAIN/public,g /etc/apache2/sites-available/$DOMAIN.conf

            echo "Enabling $DOMAIN. Will probably tell you to restart Apache..."
            sudo a2ensite $DOMAIN.conf

            echo "So let's restart apache..."
            sudo service apache2 restart

        done

    SHELL

end
