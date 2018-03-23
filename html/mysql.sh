#!/bin/bash
# for ((i=1; i<=100; i ++))
# do
# 	echo $i
# done
for ((i=0;i<=420;i++))
do 
php ./index.php $i &
# sleep 30
done
