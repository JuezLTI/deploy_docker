## JuezLTI Docker

The project has a docker-compose with everything needed to run a full developer instance of JuezLTI

It's composed by:

- A node with Apache [ 2.4.46 ] and PHP [ 7.3.21 ]
  - Inside has tsugi and codetest installed

- A node with Java [ 8 ]
  - Inside has the code for the questions-storage

- A node with MongoDB [ 4.4.9 ]
  - To be used by SpringBoot

- A node with MySQL [ 5.7 ]
  - To be used by Tsugi and Codetest

- A node with Node.js [ 16.13.2 ]
  - To be used by the [xml-validator](https://github.com/JuezLTI/xml-evaluator)

- A node with Node.js [ 16.13.2 ]
  - To be used by the [feedback-manager](https://github.com/JuezLTI/feedback-manager)

- A node with Java [ 11 ] and Node.js [ 16.13.2 ] installed
  - To be used by the [java-validator](https://github.com/JuezLTI/java-evaluator)

- A node with Nginx [ latest ]
  - To be used as a reverse proxy and act as gateway

<br>

Before starting the docker-compose, you must:

- Clone the `.env.example` file to a new file called `.env`
	- Configure your variables there, like adding a github token with read access to this repositories ([xml-evaluator](https://github.com/JuezLTI/xml-evaluator), [feedback-manager](https://github.com/JuezLTI/feedback-manager)) or changing passwords

- Run the script provided (windows)<b>(clone-repos.bat)</b>, (linux)<b>(clone-repos.sh)</b> to clone all needed repositories

- Create a self-signed certificate to access our localhost services via SSL. To do that you must follow this guide ([Generate_Certs](generate_certs.md)) once finished you must copy the files <b>"(yourKey).key"</b> and <b>"(yourKeyCrt).crt"</b> inside the <b>./nginx/certs</b> folder. <b>IMPORTANT:</b> Folder ./nginx/certs does not exist by default. You must create it.
- Edit <b>./nginx/default.conf.template</b> file, and change:
  -  <b>ssl_certificate_key</b> value to <b>/opt/certs/(yourKey).key;</b> 
  -  <b>ssl_certificate</b> value to <b>/opt/certs/(yourKeyCrt).crt;</b>  

After that you must have Docker and docker-compose installed.

To get the docker environment running just run this command in the root folder of this project:

    docker-compose up

> Use `docker-compose up -d` to run it detached (on the background)

<br>

> After the docker-initialization is done you will be able to access:

- Tsugi at `https://localhost/tsugi`

- Codetest at `https://localhost/tsugi/mod/codetest`

- Spring API at `https://localhost/api`

<br>

To rebuild a container with the latests code changes you'll need to run this command:

    docker-compose build --no-cache --force-rm <service-name>

To restart a specific container you'll need to run this command:

    docker-compose restart <service-name>

To stream the logs of a specific container you'll need to run this command:

    docker-compose logs -f <service-name>

### Debug of central-repository (spring-boot)
It's posible to attach a remote debugger to the docker container from the host machine of the docker container connected
