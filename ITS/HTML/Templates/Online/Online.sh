#!/bin/sh
# Copies all online versions of summary pages to front end

# Lab Summary
cp -f /home/developer/Desktop/LabTracker/ITS/HTML/Templates/Online/LabSummary-Online.php /var/www/html/LabTracker/ITS/Staff/LabSummary.php

# Lab Summary
cp -f /home/developer/Desktop/LabTracker/ITS/HTML/Templates/Online/LabSummary-Online2.php /var/www/html/LabTracker/ITS/Staff/LabSummary2.php

echo "Done!"
