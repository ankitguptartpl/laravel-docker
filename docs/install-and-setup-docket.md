## Index
1. Docker
	* [Install Docker](#install-docker)
	* [Install Docker Compose](#install-docker-compose)
	* [Create Docker Image and Container](#create-docker-image-and-container)
    
        * [Directory Structure of Docker](#directory-structure-of-docker)
    	* [Dockerfile](#dockerfile-example)
        * [Docker Compose yml file](#docker-compose-yml-file-example)

## Docker
### Install Docker

1. Check if docker is installed
```
docker --version
```
2. Update the apt package index:
```
sudo apt-get update
```
3. Install packages to allow apt to use a repository over HTTPS:
```
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common
```
4. Add Docker’s official GPG key:
```
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
```
5. Verify that you now have the key with the fingerprint 9DC8 5822 9FC7 DD38 854A E2D8 8D81 803C 0EBF CD88, by searching for the last 8 characters of the fingerprint .
```
sudo apt-key fingerprint 0EBFCD88
```
Output
```
pub   rsa4096 2017-02-22 [SCEA]
      9DC8 5822 9FC7 DD38 854A  E2D8 8D81 803C 0EBF CD88
uid           [ unknown] Docker Release (CE deb) <docker@docker.com>
sub   rsa4096 2017-02-22 [S]
```
7. Use the following command to set up the stable repository.
```
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"
```
8. Update the apt package index.
```
sudo apt-get update
```
9. Install the latest version of Docker CE and containerd, or go to the next step to install a specific version:
```
sudo apt-get install docker-ce docker-ce-cli containerd.io
```
10. Check Docker Installation
: Docker should now be installed, the daemon started, and the process enabled to start on boot. Check that it's running:
```
sudo systemctl status docker
```
The output should be similar to the following, showing that the service is active and running.
```
Output
```
```
● docker.service - Docker Application Container Engine
   Loaded: loaded (/lib/systemd/system/docker.service; enabled; vendor preset: enabled)
   Active: active (running) since Thu 2018-10-18 20:28:23 UTC; 35s ago
     Docs: https://docs.docker.com
 Main PID: 13412 (dockerd)
   CGroup: /system.slice/docker.service
           ├─13412 /usr/bin/dockerd -H fd://
           └─13421 docker-containerd --config /var/run/docker/containerd/containerd.toml
```
11.Executing the Docker Command Without Sudo
: By default, running the docker command requires root privileges — that is, you have to prefix the command with sudo. It can also be run by a user in the docker group, which is automatically created during the installation of Docker. If you attempt to run the docker command without prefixing it with sudo or without being in the docker group, you'll get an output like this:
Output
```
docker: Cannot connect to the Docker daemon. Is the docker daemon running on this host?.
See 'docker run --help'.
```
If you want to avoid typing sudo whenever you run the docker command, add your username to the docker group:
```
sudo usermod -aG docker ${USER}
```
To apply the new group membership, you can log out of the server and back in, or you can type the following:
```
su - ${USER}
```
You will be prompted to enter your user's password to continue. Afterwards, you can confirm that your user is now added to the docker group by typing:
```
id -nG
```

### Install Docker Compose
1. Run this command to download the latest version of Docker Compose
```
sudo curl -L https://github.com/docker/compose/releases/download/1.24.0-rc1/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
```
2. Apply executable permissions to the binary:
```
chmod +x /usr/local/bin/docker-compose
```

### Create Docker Image and Container
* Run folowing command ( Clone dfm-docker repository)
```
git clone https://git.ranosys.org/ranosys/group_buy.git
```
This will create a docker directory structure.

#### Directory Structure of Docker
```
Root Folder
├── mysql-data
├── redis-data
├── server
	└── Dockerfile
    └── config
    	   └── apache2.conf
           └── php.ini
           └── Other Config file
    └── htdocs
        └── Service-1
        └── Service-2
        └── Service-3
└── docker-compose.yml
└── readme.md
```

#### Dockerfile Example
Docker can build images automatically by reading the instructions from a Dockerfile. A Dockerfile is a text document that contains all the commands a user could call on the command line to assemble an image. Using docker build users can create an automated build that executes several command-line instructions in succession.
```
# Install Ubantu as Base Image
FROM ubuntu:16.04

#RUN apt-get update
WORKDIR /var/www/html

```


#### Docker Compose YML File Example
docker-compose.yml file contains no. of services to be initiated.
```
version: '2'
services:
  web:
    build: web
    ports:
      - 3000:80
    #environment:                    ############## For access only ###################
      #DB_HOST: 127.0.0.1            # Any host
      #DB_DATABASE: my_dior_database # Database name to be connected
      #DB_USERNAME: root             # Username of database ( can be root or other user )
      #DB_PASSWORD: ranosys          # Password of user ( can be root username password )
  mysql:
    image: mysql:8.0.15
    command: --default-authentication-plugin=mysql_native_password
    environment:
      MYSQL_DATABASE: dfm                 # database name to be created after mysql install ( Optional )
      #MYSQL_USER: "my_dior_username"     # Any user which have access of above database ( Optional )
      #MYSQL_PASSWORD: "ranosys"          # Password of above user ( Optional )
      MYSQL_ROOT_PASSWORD: ranosys        # Mysql root user password
  phpmyadmin:
        image: phpmyadmin/phpmyadmin:edge-4.8
        container_name: phpmyadmin
        networks:
            - main
networks:
    main:
        driver: bridge

```

#### Run Docker file
* Start or initiate container by this command. This command will create your project docker environment. It may takes upto 15 min.
```
docker-compose up --build
```
* Then your Web Server is running on
```
http://localhost:3000/
```
* Your PHPMyadmin is running on
```
http://localhost:4000/index.php
```
* Your PHPRedisAdmin is running on
```
http://localhost:5000/index.php
```
* After setup project docker environment stop this command by `CTRL+C`
* Restart server in damon mode by
```
docker-compose up -d
```
* You can stop this servern anytime by
```
docker-compose down
```