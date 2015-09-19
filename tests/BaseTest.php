<?php

namespace Coreplex\Bridge\Tests;

use Coreplex\Bridge\Javascript;
use PHPUnit_Framework_TestCase;

class BaseTest extends PHPUnit_Framework_TestCase
{
    public function javascript()
    {
        return new Javascript();
    }

    public function testCommon()
    {
        //
    }
}