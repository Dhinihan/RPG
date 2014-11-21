<?php
namespace example\V1\Rest\Example;

class ExampleResourceFactory
{
    public function __invoke($services)
    {
        return new ExampleResource();
    }
}
