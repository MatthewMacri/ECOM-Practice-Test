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
        $this->unauthorized(); // check first
    
        $employee = new Employee();
        $data = $employee->read();
        
        (new EmployeeList())->render($data);
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
