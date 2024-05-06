docker compose stop mongo-validator
docker rm mongo-validator_container
docker image rm mongo-validator_img
docker compose build --no-cache mongo-validator
docker compose up -d mongo-validator