#! /bin/bash
while inotifywait -r less/*
do
  lessc less/bootstrap.less > css/bootstrap.css 
  lessc less/normalize.less > css/normalize.css 
  lessc less/theme.less > css/theme.css 
done

