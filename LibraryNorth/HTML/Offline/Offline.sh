#!/bin/sh
# Copies all offline versions of webpages to front end

# Lab Summary
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Staff/LabSummary.php

# Lab Summary #2
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Staff/LabSummary2.php

# LN1000
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Maps/LN1000.php
 
# LN2000
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Maps/LN2000.php

# LN3000
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Maps/LN3000.php

# LN3016
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php  /var/www/html/LabTracker/Maps/LN3016.php

# LN-B105 (LEC 2)
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php 	/var/www/html/LabTracker/Maps/LNB101.php

# LN-B101 (LEC 1)
cp -f /home/developer/Desktop/LabTracker-v1/HTML/Templates/Offline/LN-Offline.php 	/var/www/html/LabTracker/Maps/LNB105.php

echo "Done!"
