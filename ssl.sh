#!/bin/bash
set -Eeuo pipefail

echo 'starting'
apt update -y
apt install -y python3 python3-venv libaugeas0
apt install -y dnf
python3 -m venv /opt/certbot/
/opt/certbot/bin/pip install --upgrade pip
/opt/certbot/bin/pip install certbot certbot-apache
ln -s /opt/certbot/bin/certbot /usr/bin/certbot
certbot -d www.bytemeuh.fr -n --apache --agree-tos --email camille.girard1995@gmail.com
echo 'done'
