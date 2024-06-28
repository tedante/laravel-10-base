#!/bin/sh

echo "Checking Installation Requirements"

if ! command -v php >/dev/null; then
  echo "php is not installed on your machine" 

  exit 1
fi

if ! command -v docker >/dev/null; then
  echo "docker is not installed on your machine" 

  exit 1
fi

echo "Installation Requirements met"

echo "Installing laravel-10-base"
git clone git@github.com:tedante/laravel-10-base.git 
cd laravel-10-base 

echo "Creating .env file"
cp .env.example .env
echo ".env created"

if command -v docker >/dev/null; then
  echo "Docker is installed on your machine"
  echo "Building Docker Image"

  docker compose up -d
else 
  echo "Docker is not installed on your machine"
  echo "If you aren't using docker, please see the readme for instructions on how to run the application without docker"
fi

echo "Installation complete"