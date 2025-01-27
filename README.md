# Docker php  nginx redis
This is a basic php, nginx, docker Application in order to know how to configure docker.   
The topics covered are :    
- Docker compose 
- Dockerfile 
- Nginx & php-fpm setting
- Basic Application
- Docker Volume 
- Development Build
- Env variables
- Redis
- Xdebug
- Docker multi stage builds
- Docker Registry
- Github action setting

### Application Description

### Development Build
`docker compose -f compose.local.yml --env-file=.env.local up --build`    

### Production Build
`docker compose up --build` or `docker compose -f compose.yml --env-file=.env up --build`    

### Push container image to docker registry

### Xdebug extension & phpstorm setting


