#!/bin/bash
set -e

# Inicia MongoDB
mongod --dbpath /app/mongodb --fork --syslog

# Ejecuta npm run watch:dev
npm run watch:dev
