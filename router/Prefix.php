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
        $this->groupedRoutes = true;

        //we fill up the routes array with the http methods array
        foreach($createRouteMethods as $createRoute) {
            $createRoute;
        }

        $this->resetMiddlewareArray();

        $this->groupedRoutes = false;
        
        return $this;
    }
}