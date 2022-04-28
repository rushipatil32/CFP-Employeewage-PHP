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
    public $WORKING_DAYS_PER_MONTH = 20;

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
     * Calling attendance function to check employee attendance
     * returns daily wage of the employee
     */
    function dailyWage()
    {
        $hrs = $this->attendance();
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        echo "Working Hours:: " . $hrs . "\n";
        echo "Daily Wage:: " . $dailyWage . "\n\n";
        return $dailyWage;
    }

    /**
     * Function to Calculate Monthly Wage
     * Non-Parameterized Function
     * Printing the Monthly wage to the output
     * Calling daily wage function to get daily wage
     */
    function monthlyWage()
    {
        $monthlyWage = 0;
        for ($i = 1; $i <= $this->WORKING_DAYS_PER_MONTH; $i++) {
            echo "Day:: " . $i . "\n";
            $dailyWage = $this->dailyWage();
            $monthlyWage += $dailyWage;
        }
        echo "Monthly Wage:: " . $monthlyWage . "\n\n";
    }
}
$employeeWage = new EmployeeWage();
$employeeWage->monthlyWage();
?>