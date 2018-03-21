1.注意nginx配置文件，fastcgi_pass   127.0.0.1:9000; 此行根据network_mode: "host"或links更改
若docker-compose.yml中用links phpfpm:phpfpm 则此处可以写phpfpm:9000
若docker-compose.yml中用的是network_mode:"host" ，则此处可以写127.0.0.1：9000
