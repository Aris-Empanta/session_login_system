<?php

namespace Router;

trait Middleware
{
    private array $callbacks = [];

    //we pass the callbacks in the above property.
    public function middleware(...$callbacks) : self
    {
        foreach($callbacks as $callback) {
            $this->callbacks[] = $callback;
        }

        return $this;
    }

    public function runMiddleware(array $callbacks) : void
    {
        foreach($callbacks as $callback) {
            $callback();
        }
    }

    public function getMiddlewareArray() : array
    {
        return $this->callbacks;
    }

    public function resetMiddlewareArray() : void
    {
        $this->callbacks = array();
    }
}