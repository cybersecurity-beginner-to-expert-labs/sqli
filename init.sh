#!/bin/bash

for service in apache2 mariadb; do
   systemctl is-active --quiet $service || sudo systemctl start $service
done

echo "Lab initialized and ready..."
