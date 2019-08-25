#!/bin/bash
unitd --no-daemon --control unix:/var/run/control.unit.sock &

curl -X PUT -d @/www/unit.conf.json --unix-socket /var/run/control.unit.sock http://localhost/ \
    && tail -f /www/unit.conf.json
