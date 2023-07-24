<?php

namespace Router;

trait Prefix
{
    // The prefix for the routes
    private string $prefix = '';

    // Set the prefix
    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;
        return $this;
    }

    // Get the prefix
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    //Grouping routes
    public function group(array $createRouteMethods): self
    {

        foreach($createRouteMethods as $createRoute) {
            $createRoute;
        }

        return $this;
    }
}