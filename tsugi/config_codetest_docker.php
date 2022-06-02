<?php
require_once dirname(__DIR__) . "/config.php";
require 'vendor/autoload.php';

$CFG->codetestRootDir = dirname(__FILE__);
$CFG->codetestBasePath = __DIR__;

$CFG->twig = array(
    'viewsPath' => __DIR__ . "/views",
    'debug' => true,
    'cachePath' => __DIR__ . "/tmp",
);

$CFG->CT_log = array(
    'debug' => true,
    'filePath' => __DIR__ . "/tmp/ctLog.log",
);

$CFG->repositoryUrl = getenv('SPRING_CODETEST_URL').":".getenv('SPRING_CODETEST_PORT');

$CFG->type = [
    "PHP" => "PHP",
    "SQL" => "SQL",
    "Python" => "Python",
    "Java" => "Java"
];

$CFG->validators = array(
    "Java" => [
        "name" => 'Java',
        "baseUrl" => "http://java-validator:3000/",
    ],
    "PHP" => [
        "name" => 'PHP',
        "baseUrl" => "http://{$CFG->repositoryUrl}/",
    ],
    "SQL" => [
        "name" => "SQL",
        "baseUrl" => "http://sql-validator:3000/",
    ],
    "Python" => [
        "name" => 'Python',
        "baseUrl" => "http://{$CFG->repositoryUrl}/",
    ],
);

$CFG->apiConfigs = [
    "spring-repo" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => "http://{$CFG->repositoryUrl}/",
        "user" => getenv('CENTRAL_REPOSITORY_USER'),
        "pass" => getenv('CENTRAL_REPOSITORY_PASS'),
    ],
    "authorkit" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => getenv('AK_BASE_URL'),
        "user" => getenv('AK_USER'),
        "pass" => getenv('AK_PASS'),
    ],
];

$CFG->ExerciseProperty = array(
    'name' => 'programming',
    'class' => \CT\CT_ExerciseCode::class,
    'instructorForm' => 'exercise/forms/exerciseCodeForm.php.twig',
    'studentView' => 'exercise/students/exerciseCodeStudent.php.twig',
    'timeout' => 5,
    'codeLanguages' => array(
        array('name' => 'Java'),
        // array('name' => 'PHP', 'ext' => 'xml', 'command' => null, 'stdin' => false)
        
    ),
    
);

$CFG->difficulty = array(
    "Easy" => "Easy",
    "medium" => "Medium",
    "Hard" => "Hard"
);
