<?php
class EmployeeWage{
    function welcome(){
        echo "Welcome to employeewage";
    }
/**
     * Function to Check Employee is Present or Absent
     * Non-Parameterized function
     * Using rand() to generate the random of 0 or 1
     */
    function attendance()
    {
        $empCheck = rand(0, 1);
        if ($empCheck == 1) {
            echo "\nEmployee is Present";
        } else {
            echo "\nEmployee is Absent";
        }
    }
}
$employeeWage = new EmployeeWage();
$employeeWage->attendance();
?>