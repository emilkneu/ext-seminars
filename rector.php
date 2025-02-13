<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;
use Rector\PostRector\Rector\NameImportingPostRector;
use Rector\Set\ValueObject\SetList;
use Ssch\TYPO3Rector\Configuration\Typo3Option;
use Ssch\TYPO3Rector\FileProcessor\Composer\Rector\ExtensionComposerRector;
use Ssch\TYPO3Rector\FileProcessor\TypoScript\Rector\FileIncludeToImportStatementTypoScriptRector;
use Ssch\TYPO3Rector\Rector\General\ConvertTypo3ConfVarsRector;
use Ssch\TYPO3Rector\Rector\General\ExtEmConfRector;
use Ssch\TYPO3Rector\Rector\v9\v0\InjectAnnotationRector;
use Ssch\TYPO3Rector\Set\Typo3SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PARALLEL, true);

    $parameters->set(Option::BOOTSTRAP_FILES, [
        __DIR__ . '/.Build/vendor/autoload.php',
    ]);

    // paths to refactor; solid alternative to CLI arguments
    $parameters->set(Option::PATHS,
        [
            'Classes/',
            'Configuration/',
            'Tests/',
        ]
    );

    // All rule sets are disabled by default. We can enable them to work on certain refactorings.

//    $containerConfigurator->import(SetList::PHP_52);
//    $containerConfigurator->import(SetList::PHP_53);
//    $containerConfigurator->import(SetList::PHP_54);
//    $containerConfigurator->import(SetList::PHP_55);
//    $containerConfigurator->import(SetList::PHP_56);
//    $containerConfigurator->import(SetList::PHP_70);
//    $containerConfigurator->import(SetList::PHP_71);
//    $containerConfigurator->import(SetList::PHP_72);
//    $containerConfigurator->import(SetList::TYPE_DECLARATION);
//    $containerConfigurator->import(SetList::TYPE_DECLARATION_STRICT);

//    $containerConfigurator->import(Typo3SetList::TYPO3_76);
//    $containerConfigurator->import(Typo3SetList::TYPO3_87);
//    $containerConfigurator->import(Typo3SetList::TYPO3_95);

//    $containerConfigurator->import(SetList::CODE_QUALITY);
//    $containerConfigurator->import(SetList::CODING_STYLE);
//    $containerConfigurator->import(SetList::CODING_STYLE_ADVANCED);
//    $containerConfigurator->import(SetList::DEAD_CODE);
//    $containerConfigurator->import(SetList::PSR_4);

    // In order to have a better analysis from phpstan we teach it here some more things
    $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, Typo3Option::PHPSTAN_FOR_RECTOR_PATH);

    // FQN classes are not imported by default. If you don't do it manually after every Rector run, enable it by:
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);

    // this will not import root namespace classes, like \DateTime or \Exception
    $parameters->set(Option::IMPORT_SHORT_CLASSES, false);

    // this will not import classes used in PHP DocBlocks, like in /** @var \Some\Class */
    $parameters->set(Option::IMPORT_DOC_BLOCKS, false);

    // Define your target version which you want to support
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_72);

    // If you have an editorconfig and changed files should keep their format enable it here
    // $parameters->set(Option::ENABLE_EDITORCONFIG, true);

    // If you only want to process one/some TYPO3 extension(s), you can specify its path(s) here.
    // If you use the option --config change __DIR__ to getcwd()
    // $parameters->set(Option::PATHS, [
    //    __DIR__ . '/packages/acme_demo/',
    // ]);

    // If you set option Option::AUTO_IMPORT_NAMES to true, you should consider excluding some TYPO3 files.
    $parameters->set(Option::SKIP,
        [
            // This file currently is broken with rn_base 1.13.*. This probably will work with 1.14.*.
            'Classes/FrontEnd/AbstractEditor.php',
            // These files muist not use imports.
            NameImportingPostRector::class => [
                'Configuration/BackEnd/Routes.php',
                'Configuration/TCA/*',
                'ext_emconf.php',
                'ext_localconf.php',
                'ext_tables.php',
            ]
        ]
    );

    // If you have trouble that rector cannot run because some TYPO3 constants are not defined add an additional constants file
    // @see https://github.com/sabbelasichon/typo3-rector/blob/master/typo3.constants.php
    // @see https://github.com/rectorphp/rector/blob/main/docs/static_reflection_and_autoload.md#include-files
    // $parameters->set(Option::BOOTSTRAP_FILES, [
    //    __DIR__ . '/typo3.constants.php'
    // ]);

    // get services (needed for register a single rule)
    $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(InjectAnnotationRector::class);

    /**
     * Useful rule from RectorPHP itself to transform i.e. GeneralUtility::makeInstance('TYPO3\CMS\Core\Log\LogManager')
     * to GeneralUtility::makeInstance(\TYPO3\CMS\Core\Log\LogManager::class) calls.
     * But be warned, sometimes it produces false positives (edge cases), so watch out
     */
    // $services->set(StringClassNameToClassConstantRector::class);

    // Optional non-php file functionalities:
    // @see https://github.com/sabbelasichon/typo3-rector/blob/main/docs/beyond_php_file_processors.md

    // Adapt your composer.json dependencies to the latest available version for the defined SetList
    // $containerConfigurator->import(Typo3SetList::COMPOSER_PACKAGES_104_CORE);
    // $containerConfigurator->import(Typo3SetList::COMPOSER_PACKAGES_104_EXTENSIONS);

    // Rewrite your extbase persistence class mapping from typoscript into php according to official docs.
    // This processor will create a summarized file with all of the typoscript rewrites combined into a single file.
    // The filename can be passed as argument, "Configuration_Extbase_Persistence_Classes.php" is default.
    // $services->set(ExtbasePersistenceTypoScriptRector::class);
    // Add some general TYPO3 rules

    // $services->set(ConvertTypo3ConfVarsRector::class);
    // $services->set(ExtEmConfRector::class);
    // $services->set(ExtensionComposerRector::class);

    // Do you want to modernize your TypoScript include statements for files and move from <INCLUDE /> to @import use the FileIncludeToImportStatementVisitor
    // $services->set(FileIncludeToImportStatementTypoScriptRector::class);

    // upgrade PHPUnit
    // $containerConfigurator->import(PHPUnitSetList::PHPUNIT_80);
    // $containerConfigurator->import(PHPUnitSetList::PHPUNIT_CODE_QUALITY);
    // $containerConfigurator->import(PHPUnitSetList::PHPUNIT_EXCEPTION);
    // $containerConfigurator->import(PHPUnitSetList::PHPUNIT_MOCK);
    // $containerConfigurator->import(PHPUnitSetList::PHPUNIT_SPECIFIC_METHOD);
};
