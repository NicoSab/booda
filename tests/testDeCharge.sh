#!/bin/bash

echo "test home"
ab -n 1000 -c 50 http://localhost/booda/

echo "test chat"
ab -n 10000 -c 100 http://localhost/booda/chat
