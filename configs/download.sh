#!/bin/sh

# icecast
curl -s -u admin:`cat /opt/streaming-feedback/icecast-password` "http://live.ber.c3voc.de:8000/admin/stats.xml" > /tmp/stats.xml && mv /tmp/stats.xml stats.xml

# fahrplan
wget -q "https://events.ccc.de/camp/2015/Fahrplan/schedule.xml" -O /tmp/schedule.xml && mv /tmp/schedule.xml schedule.xml

# ys-api
wget -q --no-check-certificate "https://c3voc.de/ys/api/v1/productions?api_key=qqpkI97V9z5uL546IDbl" -O /tmp/ys.json && mv /tmp/ys.json ys.json
# https://yolo.camp15.c3voc.de/ys/api/v1/productions?api_key=qqpkI97V9z5uL546IDbl

# vod json
#wget -q "http://vod.c3voc.de/index.json" -O /tmp/vod.json && mv /tmp/vod.json vod.json 