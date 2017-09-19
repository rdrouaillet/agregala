#!/bin/bash

PATH=$PATH:/home/agregala/update-posts/bin
COMMAND="python /home/agregala/update-posts/update_posts.py $(cat /home/agregala/update-posts/urls.txt)"
VIRTUALENV="/home/agregala/update-posts"
NEW_DISPLAY=:99
XVFB_COMMAND="Xvfb $NEW_DISPLAY -screen 0 1024x768x24"

source $VIRTUALENV/bin/activate
$XVFB_COMMAND 2>&1 >/dev/null &
xvfb_pid=$!
DISPLAY=$NEW_DISPLAY $COMMAND
kill -9 $xvfb_pid
