#!/bin/bash

echo "[*] Starting SQL Injection Lab Initialization..."

# === Ensure required services are running ===
for service in apache2 mariadb; do
  if systemctl is-active --quiet "$service"; then
    echo "[✓] $service is already running."
  else
    echo "[*] $service not running. Attempting to start..."
    sudo systemctl start "$service"
    if systemctl is-active --quiet "$service"; then
      echo "[✓] $service started successfully."
    else
      echo "[!] Failed to start $service. Please check it manually."
      exit 1
    fi
  fi
done

# === Prepare lab folders ===
TARGET_DIR="/var/www/html"
TMP_DIR=$(mktemp -d)

echo "[*] Downloading lab files from GitHub..."

# Download and extract sqli-basic
curl -L -o "$TMP_DIR/sqli-basic.zip" https://github.com/cybersecurity-beginner-to-expert-labs/sqli/raw/main/sqli-basic.zip
unzip -q "$TMP_DIR/sqli-basic.zip" -d "$TMP_DIR"

# Download and extract sqli-union
curl -L -o "$TMP_DIR/sqli-union.zip" https://github.com/cybersecurity-beginner-to-expert-labs/sqli/raw/main/sqli-union.zip
unzip -q "$TMP_DIR/sqli-union.zip" -d "$TMP_DIR"

echo "[*] Cleaning existing lab folders (if any)..."
sudo rm -rf "$TARGET_DIR/sqli-basic" "$TARGET_DIR/sqli-union"

echo "[*] Copying new lab folders to $TARGET_DIR..."
sudo cp -r "$TMP_DIR/sqli-basic" "$TARGET_DIR/"
sudo cp -r "$TMP_DIR/sqli-union" "$TARGET_DIR/"
sudo chown -R www-data:www-data "$TARGET_DIR/sqli-basic" "$TARGET_DIR/sqli-union"

# === Check DB availability ===
echo "[*] Checking if database 'labdb' is accessible..."
if mysql -u root -prootpass -e "USE labdb;" 2>/dev/null; then
  echo "[✓] Database 'labdb' exists and is accessible."
else
  echo "[!] Could not verify 'labdb'. Please ensure the database is preseeded and accessible."
fi

# === Done ===
echo
echo "[✓] SQLi Lab is ready:"
echo "    → http://localhost/sqli-basic"
echo "    → http://localhost/sqli-union"
