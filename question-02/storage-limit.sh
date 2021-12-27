#!/bin/bash

USER=$1

apt install quota -y

apt install linux-image-extra-virtual -y

mount -o remount,usrquota /

quotacheck -cum /

quotaon -v /

setquota -u $USER 0 10GB 0 0 /
