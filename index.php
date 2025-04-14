<?php

class App{


    public function start(){

        spl_autoload_register(function ($class) {
            require($class.'.php');
        });
   
        $requestBuilderClass = "\\core\\http\\RequestBuilder";

        if(class_exists($requestBuilderClass)){

                $requestBuilder = new $requestBuilderClass();

                $request = $requestBuilder->getRequest();

            // Given the URL http://localhost/app/index.php?employees=1
            // This means we want the employee with ID = 1
            // We read the value 1 using $_GET["employees"]

            // but what if we want all employees thus the URL doesn't have the id as a value:
            // http://localhost/app/index.php?employees

            // Our objective is to read the "employees" and match it with a controller within our app

            //echo "URL = ".$_GET['url'];

            $urlParams = $request->getParams();

            $resourceName = $urlParams[0];
            //echo $resource;

            // We need to construct the controller name from the resource name

            // what do we need to do?
            // to match our controller name "EmployeeController"
            // starting with "employees" as included in the query string
            // 1- We need to Capitalize the first letter "E"
            // 2- We need to remove the "s"
            // 3- We need to append the keyword "Controller"

            $controllerClass = substr(ucfirst($resourceName), 0, strlen($resourceName)-1)."Controller";

            // Add the namespace / which corresponds to the folder so that the require works
            // using the fully qualified class name:
            $controllerClass = "\\controllers\\".$controllerClass;

            //echo $controllerClass;

            // The class_exists check is calling the function given to spl_autoload_register() and passing the $controllerClass as parameter
            if(class_exists($controllerClass)){

                $controller = new $controllerClass();
                
                $requestMethod = $request->getMethod();

                switch($requestMethod){
                    case 'GET':   
                        $controller->read();
                        break;
                    case 'POST': 
                        $data = $request->getpostFields();
                        $controller->create($data);
                        break;
                    case 'PUT': ;
                        break;
                    case 'DELETE': ;
                        break;
                    default: ;
                }                


                // If we used return in the view then we can echo the data here
                //echo $data;
            }else{
                echo "<br>";
                echo "The requested resource is not found.";
            }

        }

    }
}//End class App

$app = new App();
$app->start();


