<?php

function isRouteActive($routeName)
{
    return request()->routeIs($routeName) ? 'active' : '';
}

// Dejo la funcion usada anteriormente, para evitar que el codigo rompa.
function setActive($routeName)
{
    return isRouteActive($routeName);
}
