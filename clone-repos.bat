@echo off
FOR /F "eol=# tokens=*" %%i IN (.env) DO SET %%i

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
git clone --branch master                             https://%GITHUB_TOKEN%@github.com/JuezLTI/feedback-manager.git
git clone --branch master                       https://%GITHUB_TOKEN%@github.com/JuezLTI/xml-evaluator.git
git clone --branch master                           https://%GITHUB_TOKEN%@github.com/JuezLTI/java-evaluator.git
git clone --branch master                           https://%GITHUB_TOKEN%@github.com/JuezLTI/sql-evaluator.git
cd ..
cd ..
