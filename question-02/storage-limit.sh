#!/bin/bash

USER=$1
SIZE_LIMIT=$2

apt install quota -y

apt install linux-image-extra-virtual -y

mount -o remount,usrquota /

quotacheck -cum /

quotaon -v /

setquota -u $USER 0 $SIZE_LIMIT 0 0 /
