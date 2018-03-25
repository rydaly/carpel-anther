echo "============================================"
echo "Downloading the latest WordPress for you and"
echo "placing it in ./public."
echo "============================================"
#get wordpress version
wpversion=`cat .wordpress-version`
#download wordpress
curl -O https://wordpress.org/wordpress-${wpversion}.tar.gz
#unzip wordpress
tar -zxf wordpress-${wpversion}.tar.gz
#remove tar
rm wordpress-${wpversion}.tar.gz
#move wordpress to public
mkdir -p public
#remove plugins folder since we will symlink our own
rm -r wordpress/wp-content/plugins
#move files from "wordpress" to "public"
mv wordpress/* public/
# get rid of wordpress folder
rm -r wordpress
rm -r public/wp-content/plugins
#symlink our plugins source into public
ln -s ../../source/plugins/ public/wp-content/plugins
#run gulp build to compile theme
gulp build
echo "============================================"
echo "Complete. run 'gulp' to serve site"
echo "./public"
echo "============================================"
