#!/bin/sh
LOGFILE=/home/drsean/sh/logs/logSh.log
#rclone sync /home/drsean/immich/data/ clouds3sv:cloudsv --log-file=/home/drsean/sh/logs/logRcloneLibrary.log --exclude=/home/drsean/immich/data/thumbs/
aws s3 sync /home/drsean/immich/data/ s3://cloudsv --exclude "/home/drsean/immich/data/thumbs/*" --storage-class DEEP_ARCHIVE