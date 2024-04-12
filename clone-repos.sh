. .env

cd ./tsugi
mkdir src_volume
cd src_volume
git clone --branch codetest-customizations          https://github.com/JuezLTI/tsugi.git
git clone --branch master         https://github.com/JuezLTI/codetest.git
cd ..
cd ..

cd ./central-repository
mkdir src_volume
cd src_volume
git clone --branch master                  https://github.com/JuezLTI/questions-storage.git
cd ..
cd ..

cd ./validators
mkdir src_volume
cd src_volume
git clone --branch master                             https://github.com/JuezLTI/feedback-manager.git
git clone --branch master                       https://github.com/JuezLTI/xml-evaluator.git
git clone --branch master                           https://github.com/JuezLTI/java-evaluator.git
git clone --branch master                           https://github.com/JuezLTI/sql-evaluator.git
git clone --branch master                           https://github.com/JuezLTI/mongodb-evaluator.git
cd ..
cd ..
