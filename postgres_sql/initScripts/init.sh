#!/bin/bash
# Adjust PostgreSQL configuration so that remote connections to the
# database are possible.
echo "host all  all    0.0.0.0/0  md5" >> /var/lib/postgresql/data/pg_hba.conf

