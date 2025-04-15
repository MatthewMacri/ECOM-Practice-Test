<?php

namespace controllers;

use models\Employee;
use views\EmployeeList;
use core\auth\MembershipProvider;

require(dirname(__DIR__)."/models/employee.php");
require(dirname(__DIR__)."/resources/views/employees/employeeslist.php");
require(dirname(__DIR__)."/core/auth/membershipprovider.php");

class EmployeeController{

    private Employee $employee;

    public function read() {
        // Access the request parameters (or pass them from index.php)
        $requestBuilder = new \core\http\RequestBuilder();
        $request = $requestBuilder->getRequest();
        $urlParams = $request->getParams();

        // Check if a sub-action is provided (e.g., "registerview")
        if (isset($urlParams[1]) && $urlParams[1] === 'registerview') {
            // Include the register view
            include __DIR__ . '/../Resources/Views/employees/registerview.php';
        } else {
            // Show employee list as usual
            include __DIR__ . '/../Resources/Views/employees/index.php';
        }
    }

    

    public function unauthorized() {
        $membershipprovider = new MembershipProvider();
        $membershipprovider->checkIfUserIsLogged(); // this now redirects if not logged
    }
}

/*TEST

$employeeController = new EmployeeController();
$employeeController->read();

*/
