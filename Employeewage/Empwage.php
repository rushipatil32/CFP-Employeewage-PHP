<?php
class EmployeeWage{
    function welcome(){
        echo "Welcome to employeewage";
    }
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $IS_FILL_TIME = 2;
    public $IS_PART_TIME = 1;
    public $IS_ABSENT = 0;

    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     * Non-Parameterized Function
     */
    function attendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case 1:
                echo "Part Time Employee\n";
                return $this->PART_TIME_WORKING_HRS;
                break;

            case 2:
                echo "Full Time Employee\n";
                return $this->FULL_TIME_WORKING_HRS;
                break;

            default:
                echo "Employee is Absent\n";
                return 0;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Non-Parameterized Function
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
?>