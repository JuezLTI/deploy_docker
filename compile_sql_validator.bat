docker compose stop sql-validator
docker rm sql-validator_container
docker image rm sql-validator_img
docker compose build --no-cache sql-validator
docker compose up -d sql-validator