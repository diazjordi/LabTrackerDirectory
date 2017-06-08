#!/bin/bash

# Check for and remove Error File, to enable runs
echo "Checking for Error File, and removing if necessary"
if [ -f ../Logging/ErrorFile ]; then
echo "File Found!"
echo "Will Delete Error File!"
rm ../Logging/ErrorFile
else
echo "File Not Found!"

fi

echo "Running LabTracker, will run and re-enable cron job!"

/usr/bin/java -jar ../JARs/LabTrackerETL.jar

/bin/bash ../HTML/Templates/Online/Online.sh

line="# Run LabTrackerETL-ITS
# Everyday, every 6 minutes, 24 hours / day
*/6 * * * * /usr/bin/java -jar /home/developer/Desktop/LabTracker/ITS/JARs/LabTrackerETL.jar
# Last run at 5 PM
# 07 19 * * * /usr/bin/java -jar /home/developer/Desktop/LabTracker/ITS/JARs/LabTrackerETL.jar
# Run Offline Hour Script
# 10 19 * * 1-5 /home/developer/Desktop/LabTracker/ITS/HTML/Templates/Offline/Offline.sh
# Run Online Hour Script
# 00 7 * * * /home/developer/Desktop/LabTracker/ITS/HTML/Templates/Online/Online.sh
"
(crontab -u developer -l; echo "$line" ) | crontab -u developer -
