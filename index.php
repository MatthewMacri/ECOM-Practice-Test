<?php

class App {
    public function start() {
        spl_autoload_register(function ($class) {
            require($class . '.php');
        });
   
        $requestBuilderClass = "\\core\\http\\RequestBuilder";

        if (class_exists($requestBuilderClass)) {
            $requestBuilder = new $requestBuilderClass();
            $request = $requestBuilder->getRequest();
            $urlParams = $request->getParams();

            // Check that there is at least one parameter
            if (count($urlParams) > 0) {
                $resourceName = $urlParams[0];

                // Build the controller name, e.g. "employees" becomes "EmployeeController"
                $controllerClass = substr(ucfirst($resourceName), 0, strlen($resourceName)-1)."Controller";
                $controllerClass = "\\controllers\\" . $controllerClass;

                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    $requestMethod = $request->getMethod();

                    // Determine the action based on the additional URL parameters
                    if(count($urlParams) > 1) {
                        $action = $urlParams[1]; // e.g., "registerview"
                    } else {
                        $action = 'read';
                    }

                    // If the controller has the action method, call it; otherwise, default to "read"
                    if(method_exists($controller, $action)) {
                        $controller->$action();
                    } else {
                        $controller->read();
                    }
                } else {
                    echo "<br>The requested resource is not found.";
                }
            } else {
                echo "No resource specified.";
            }
        }
    }
}
$app = new App();
$app->start();