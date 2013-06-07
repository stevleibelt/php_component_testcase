<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-07
 */

chdir(realpath(getcwd()));

require 'vendor/autoload.php';
require 'test/Net/Bazzline/Component/TestCase/UnitTestCase.php';
require 'test/Net/Bazzline/Component/TestCase/MockFactory.php';
require 'source/Net/Bazzline/Component/TestCase/developmentAutoloader.php';
