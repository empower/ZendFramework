<?php

error_reporting(E_ALL & ~E_DEPRECATED);

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'ignore'            => array('generatePackage.php'),
    'dir_roles' => array(
        'docs' => 'doc',
        'bin'  => 'script',
    ),
));

$packagexml->setPackage('Zend');
$packagexml->setSummary('Zend Framework');
$packagexml->setDescription(
    'Zend Framework 1 as a PEAR package'
);

$packagexml->setChannel('empower.github.com/pirum');
$packagexml->setAPIVersion('1.11.10');
$packagexml->setReleaseVersion('1.11.10');

$packagexml->setReleaseStability('stable');

$packagexml->setAPIStability('stable');

$packagexml->setNotes('
* Initial Empower release
');
$packagexml->setPackageType('php');
$packagexml->addRelease();

$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'shupp@php.net');
$packagexml->setLicense('New BSD License',
                        'http://framework.zend.com/license');

$packagexml->setPhpDep('5.2.0');
$packagexml->setPearinstallerDep('1.4.3');

$packagexml->addReplacement('bin/zf.sh', 'pear-config', '@php_bin@', 'php_bin');
$packagexml->addReplacement('bin/zf.sh', 'pear-config', '@php_dir@', 'php_dir');
$packagexml->addReplacement('bin/zf.bat', 'pear-config', '@php_bin@', 'php_bin');
$packagexml->addReplacement('bin/zf.bat', 'pear-config', '@php_dir@', 'php_dir');

$packagexml->generateContents();
$packagexml->writePackageFile();

?>
