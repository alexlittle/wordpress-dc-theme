#! /bin/bash
while inotifywait -r *
do
  lessc bootstrap.less > ../css/bootstrap.css 
done

