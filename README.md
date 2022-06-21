## JuezLTI Docker

The project has a docker-compose with everything needed to run a full instance of JuezLTI

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

<br>

Before starting the docker-compose, you must clone the `.env.example` file to a new file called `.env`

And then configure your variables there, like adding a github token with read access to this repositories ([xml-evaluator](https://github.com/JuezLTI/xml-evaluator), [feedback-manager](https://github.com/JuezLTI/feedback-manager)) or changing passwords

After that if you have Docker and docker-compose installed

To get the docker environment running just run this command in the root folder of this project:

    docker-compose up

<br>

> After the docker-initialization is done you will be able to access:

- Tsugi at `http://localhost/tsugi`
- Codetest at `http://localhost/tsugi/mod/codetest`
- Spring API at `http://localhost:8080/api`

<br>

To rebuild a container with the latests code changes you'll need to run this command:

    docker-compose build --no-cache --force-rm <service-name>
