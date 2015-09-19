<?php

namespace Coreplex\Bridge\Tests;

class JavascriptTest extends BaseTest
{
    public function testJavascriptSharerImplementsContract()
    {
        $javascript = $this->javascript();

        $this->assertInstanceOf('Coreplex\\Bridge\\Contracts\\Javascript', $javascript);
    }

    public function testShareMethodReturnsJavascriptInstance()
    {
        $javascript = $this->javascript();

        $this->assertInstanceOf('Coreplex\\Bridge\\Contracts\\Javascript', $javascript->share('foo', 'bar'));
    }

    public function testShareMethodAcceptsArrayAndKeyValue()
    {
        $javascript = $this->javascript();

        $this->assertInstanceOf('Coreplex\\Bridge\\Contracts\\Javascript', $javascript->share('foo', 'bar'));
        $this->assertInstanceOf('Coreplex\\Bridge\\Contracts\\Javascript', $javascript->share(['foo' => 'bar']));
    }

    public function testRenderSharedDataRendersCorrectly()
    {
        $javascript = $this->javascript();
        $javascript->share('foo', 'bar');

        $this->assertInternalType('string', $javascript->renderSharedData());
        $this->assertContains('script', $javascript->renderSharedData());
        $this->assertContains('foo', $javascript->renderSharedData());
    }

    public function testShareMethodCanBeChained()
    {
        $javascript = $this->javascript();
        $javascript->share('foo', 'bar')->share('baz', 'qux');

        $this->assertContains('foo', $javascript->renderSharedData());
        $this->assertContains('baz', $javascript->renderSharedData());
    }

    public function testShareMethodCanAcceptArray()
    {
        $javascript = $this->javascript();
        $javascript->share(['foo' => 'bar', 'baz' => 'qux']);

        $this->assertContains('foo', $javascript->renderSharedData());
        $this->assertContains('baz', $javascript->renderSharedData());
    }
}