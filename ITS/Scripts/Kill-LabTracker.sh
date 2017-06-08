#!/bin/bash
# Kills crontab entry
# Copies error page to prevent future program runs
# Runs Offline.sh to mark all webpages as offline

# Delete entries from crontab
crontab -l -u developer | grep -v LabTrackerETL-ITS | crontab -u developer -
crontab -l -u developer | grep -v Mon-Fri           | crontab -u developer -
crontab -l -u developer | grep -v Last              | crontab -u developer -
crontab -l -u developer | grep -v Offline           | crontab -u developer -
crontab -l -u developer | grep -v Online            | crontab -u developer -

# Copy ErrorFile to program directory to stop future runs
cp -f ./ErrorFile ../Logging/

# Copy Offline page to server
/bin/bash ../HTML/Templates/Offline/Offline.sh










