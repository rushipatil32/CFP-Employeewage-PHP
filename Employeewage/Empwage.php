<?php
class EmployeeWage{
    function welcome(){
        echo "Welcome to employeewage";
    }
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;

    /**
     * Function to Check Employee is Present or Absent
     * Non-Parameterized function
     * Returns working hrs
     * Using rand() to generate the random of 0 or 1
     */
    function attendance()
    {
        $empCheck = rand(0, 1);
        if ($empCheck == 1) {
            echo "Employee is Present\n";
            return $this->FULL_TIME_WORKING_HRS;
        } else {
            echo "Employee is Absent\n";
            return 0;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Non-Parameterized function
     * Printing the daily wage to the output
     */
    function dailyWage()
    {
        $hrs = $this->attendance();
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        echo "Daily Wage: " . $dailyWage;
    }
}
$employeeWage = new EmployeeWage();
$employeeWage->dailyWage();