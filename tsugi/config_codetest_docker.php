<?php

// Make this require relative to the parent of the current folder
// http://stackoverflow.com/exercises/24753758


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
        "capabilities" => [
            "id" => "Java-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "java",
                ],
                [
                    "name" => "version",
                    "value" => ".01",
                ],
                [
                    "name" => "engine",
                    "value" => "https://openjdk.java.net/",
                ],
            ],
        ]
    ],

    "XML" => [
        "name" => 'XML',
        "baseUrl" => "http://xml-validator:3000/",
        "capabilities" => [
            "id" => "XPath-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "XPath",
                ],
                [
                    "name" => "version",
                    "value" => ".01",
                ],
                [
                    "name" => "engine",
                    "value" => "https://www.npmjs.com/package/xpath",
                ],
            ],
        ]
    ],
    "SQL-DQL" => [
        "name" => "SQL-DQL",
        "baseUrl" => "http://sql-validator:3000/",
    ],
    "SQL-DML" => [
        "name" => "SQL-DML",
        "baseUrl" => "http://sql-validator:3000/",
    ],
    "SQL-DDL" => [
        "name" => "SQL-DDL",
        "baseUrl" => "http://sql-validator:3000/",
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