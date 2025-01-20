<?php

// Make this require relative to the parent of the current folder
// http://stackoverflow.com/exercises/24753758


require_once dirname(__DIR__) . "/config.php";
require 'vendor/autoload.php';

global $CFG;
$CFG_CT = new CT\CT_ConfigInfo($CFG->dirroot, $CFG->wwwroot, $CFG->dataroot=false);
$CFG_CT->dbprefix = $CFG->dbprefix;
$CFG_CT->codetestRootDir = dirname(__FILE__);
$CFG_CT->codetestBasePath = __DIR__;


$CFG_CT->twig = array(
    'viewsPath' => __DIR__ . "/views",
    'debug' => true,
    'cachePath' => __DIR__ . "/tmp",
);

$CFG_CT->CT_log = array(
    'debug' => true,
    'filePath' => __DIR__ . "/tmp/ctLog.log",
);

$CFG_CT->repositoryUrl = getenv('SPRING_CODETEST_URL').":".getenv('SPRING_CODETEST_PORT');

$CFG_CT->type = [
    "PHP" => "PHP",
    "SQL" => "SQL",
    "Python" => "Python",
    "Java" => "Java"
];


$CFG_CT->validators = array(
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
                    "value" => "openjdk 11.0.15",
                ],
                [
                    "name" => "engine",
                    "value" => "https://openjdk.java.net/",
                ],
            ]
        ]
            ],
    "Javascript" => [
        "name" => 'Javascript',
        "baseUrl" => "http://java-validator:3000/",
        "capabilities" => [
            "id" => "Javascript-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "javascript",
                ],
                [
                    "name" => "version",
                    "value" => "node v16.13.2",
                ],
                [
                    "name" => "engine",
                    "value" => "https://nodejs.org/dist/v16.13.2/",
                ],
            ]
        ]
    ],

    "Python" => [
        "name" => 'Python',
        "baseUrl" => "http://java-validator:3000/",
        "capabilities" => [
            "id" => "Python-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "python",
                ],
                [
                    "name" => "version",
                    "value" => "3.9.2",
                ],
                [
                    "name" => "engine",
                    "value" => "https://www.python.org/download/releases/3.0/",
                ],
            ]
        ]
    ],

    "DTD" => [
        "name" => 'DTD',
        "baseUrl" => "http://xml-validator:3000/",
        "capabilities" => [
            "id" => "DTD-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "dtd",
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
    "XPath" => [
        "name" => 'XPath',
        "baseUrl" => "http://xml-validator:3000/",
        "capabilities" => [
            "id" => "XPath-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "xpath",
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
    "XSD" => [
        "name" => 'XSD',
        "baseUrl" => "http://xml-validator:3000/",
        "capabilities" => [
            "id" => "XPath-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "xsd",
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
    "PostgreSQL" => [
        "name" => "PostgreSQL",
        "baseUrl" => "http://sql-validator:3000/",
    ],
    "MongoDB" => [
        "name" => "MongoDB",
        "baseUrl" => "http://mongo-validator:3000/",
    ],
    "PHP" => [
        "name" => 'PHP',
        "baseUrl" => "http://java-validator:3000/",
        "capabilities" => [
            "id" => "php-evaluator",
            "features" => [
                [
                    "name" => "language",
                    "value" => "php",
                ],
                [
                    "name" => "version",
                    "value" => "7.4",
                ],
                [
                    "name" => "engine",
                    "value" => "https://php.net/",
                ],
            ]
        ]
    ],
//  "Template" => [
//     "name" => 'Template',
//     "baseUrl" => "http://template-validator:3000/",
//     "capabilities" => [
//         "id" => "Template-evaluator",
//         "features" => [
//             [
//                 "name" => "language",
//                 "value" => "java",
//             ],
//         ]
//     ]
//  ],
);

$CFG_CT->apiConfigs = [
    "spring-repo" => [
        // MUST HAVE A TRAILING SLASH
        "baseUrl" => "http://{$CFG_CT->repositoryUrl}/",
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

$CFG_CT->ExerciseProperty = array(
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

$CFG_CT->difficulty = array(
    "Easy" => "Easy",
    "medium" => "Medium",
    "Hard" => "Hard"
);
