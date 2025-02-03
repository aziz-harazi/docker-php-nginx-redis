# Docker php  nginx redis
This is a simple php Application in order to know how to install it with docker.
The topics covered are :    
- Docker compose 
- Dockerfile 
- Nginx & php-fpm setting
- Docker Volume 
- Development Build
- Env variables
- Redis
- Xdebug
- Docker multi stage builds
- Docker Registry
- Github action setting

### Application Description
This application is a simple php form which find a constructor by country and type of vehicle.
It works with a mariadb database hosted in an nginx server and its result cached with redis.   

After starting the docker container, you can get the page here http://localhost:8081/   

### Build and start container 
`docker compose up --build`

###  Build and start container dev environment
`docker compose -f compose.local.yml --env-file=.env.local up --build`    

### Push container image to docker registry
`docker build --target app -t azizhikari/docker-php:1.0 -f ./php/Dockerfile .`   
`docker push azizhikari/docker-php:1.0`   

### Dump data
`make dump-sql`

### Xdebug extension & phpstorm setting
- Install XDebug Chrome extension
- Set Xdebug in phpstorm `Preferences > PHP > Add CLI Interpreter from docker`
- Enable xdebug Chrome extension, start listening in PhpStorm and test http://localhost:8081/

### Redis 
`redis-cli`   
```
127.0.0.1:6379> keys *   
1) "constructor;3;motocycle"
2) "constructor;2;car"
3) "constructor;4;motocycle"
4) "constructor;1;car"
```
```
GET constructor;1;car
"a:1:{i:0;a:1:{s:4:\"name\";s:7:\"Peugeot\";}}"
```   

Please take a look at the code to know how it works ;)

Thank you