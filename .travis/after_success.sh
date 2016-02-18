#!/bin/bash

# Add deploy key
chmod 600 .travis/deploy_key.pem
eval `ssh-agent -s`
ssh-add .travis/deploy_key.pem

# Add git remote
git config --global push.default simple
git remote add production-wp dokku@45.55.202.78:production-wp

# Push to dokku-alt server
git push production-wp master:master
