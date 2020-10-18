#!/bin/bash

sqlite3 /var/www/db/main.db < /install/init_schema.sql
