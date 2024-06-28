#!/bin/sh

echo "==========================================="
echo "Checking Installation Requirements"
echo "==========================================="

if ! command -v php >/dev/null; then
  echo "php is not installed on your machine" 

  exit 1
fi

if ! command -v composer >/dev/null; then
  echo "composer is not installed on your machine" 

  exit 1
fi

echo "Installation Requirements met"
echo "==========================================="

echo "==========================================="
echo "Installing laravel-10-base"
echo "==========================================="

git clone git@github.com:tedante/laravel-10-base.git 
cd laravel-10-base 

echo "Creating .env file"
cp .env.example .env
echo ".env created"

echo "Installing dependencies"
composer install
php artisan key:generate
echo "Dependencies installed"

echo "Installation complete"
echo "==========================================="

