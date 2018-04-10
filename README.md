### QuickStart (only if you've done all the setup)
- vagrant up
- npm start

# Carpel Anther: Wordpress Theme

## Dependencies

* Install [VirtualBox](https://www.virtualbox.org/wiki/VirtualBox) or upgrade to the latest version.
* Install [Vagrant](https://www.vagrantup.com/)
  * VirtualBox and Vagrant are used to host/develop the site locally
* This project uses Gulp. If you do not yet have Node, NPM and Gulp you must do this first.

### WordPress

There is a script that is scheduled to run post `npm install` which will download the version of WordPress defined in `./.wordpress-version` and move it into the `public/` build folder.

#### WordPress Plugins

* [Advanced Custom Fields PRO](https://www.advancedcustomfields.com/pro/).
  * In the `./source/` folder you will find an acf-export JSON file. Anytime you make a change to the ACF fields you should export a new version of the file so it can be imported by others without the database.
* [WP Sync DB](https://github.com/wp-sync-db/wp-sync-db).
  * We use this to sync back and forth from the Staging database.

# Setup
1. Make proxy url for dev / browsersync
  - Edit your host file `sudo nano /etc/hosts`
  - Add this line: `192.168.33.44 carpelanther.dev`
  - control + o
  - return
  - control + x
2. `cd` to the root of the project
3. `npm i`
4. `gulp build`
4. `vagrant up`
5. `gulp`
7. Setup WordPress with whatever username and password
8. Activate plugins
9. Go to Tools > Migrate DB
10. Do a "pull" from the staging site to get the latest.
  * If there isn't already a migration profile in there named "Staging to Local", then you will have to make a new one.
  * Select "Pull"
  * Enter:
```
https://carpelanther.com
xHP+Le/VmTvnHRY+KeSVAaTU8yd5Rh/d
  ```
  * Check "Media Files"
  * Check "Save Profile" for ease later
    something similar
  * Click Migrate DB
  * Log back in with real creds
  * NOTE: if you can't access pages other than the home page, you may have to update the site urls using sequelpro as outlined below.

## Accessing the database
- Using SequelPro (http://www.sequelpro.com/)
- Go to the SSH tab
- Name: scotchbox
- MySQL Host: 127.0.0.1
- Username: root
- Password: root
- SSH Host: 192.168.33.44
- SSH User: vagrant
- SSH Password: vagrant
- Connect
- Select the database named "scotchbox" from the dropdown in the top left.
