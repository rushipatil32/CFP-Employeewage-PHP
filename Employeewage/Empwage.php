<<?php

include "EmpInterface.php";
include "CompanyList.php";

//function to display Welcome message
function welcome(){
    echo "Welcome to employeewage";
}

/**
 * UC-13
 * Employee wage Computation Program
 * Calculating Wages till a condition of total working hours or days is reached for a month
 * calculate Employee Wage for multiple companies 
 * Using interface manage Employee Wage of multiple companies.
 * Store the Daily Wage along with the Total Wage
 */
class EmployeeWage implements CalculateEmpWage
{
    const FULL_TIME_WORKING_HRS = 8;
    const PART_TIME_WORKING_HRS = 4;
    const IS_FULL_TIME = 1;
    const IS_PART_TIME = 2;
    const IS_ABSENT = 0;

    public $WAGE_PER_HR;
    public $WORKING_DAYS_PER_MONTH;
    public $WORKING_HOURS_PER_MONTH;

    public $COMPANY_NAME;
    public $workingHrs = 0;
    public $monthlyWage = 0;
    public $totalWorkingDays = 0;
    public $totalWorkingHours = 0;

    /**
     * Parameterized contructor Function
     * Parameters are - $wage- wage per hr, $days-working days per month, $hours-working hrs per month
     */
    public function __construct($companyName,$wage, $days, $hours)
    {
        $this->COMPANY_NAME = $companyName;
        $this->WAGE_PER_HR = $wage;
        $this->WORKING_DAYS_PER_MONTH = $days;
        $this->WORKING_HOURS_PER_MONTH = $hours;
    }
    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     */
    function attendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case 1:
                echo "Full Time Employee\n";
                return 8;
                break;

            case 2:
                echo "Part Time Employee\n";
                return 4;
                break;


            default:
                echo "Employee is Absent\n";
                return 0;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Printing the daily wage to the output
     * Calling attendance function to check employee attendance
     * returns daily wage of the employee
     */
    function dailyWage()
    {
        $this->workingHrs = $this->attendance();
        $dailyWage = $this->WAGE_PER_HR * $this->workingHrs;
        echo "Working Hours : " . $this->workingHrs . "\n";
        echo "Daily Wage : " . $dailyWage . "\n\n";
        return $dailyWage;
    }
    /**
     * Function to Calculate Monthly Wage
     * Printing the Monthly wage to the output
     * Calling daily wage function to get daily wage
     */
    function monthlyWage()
    {
        $i = 0;
        while (
            $this->totalWorkingHours < $this->WORKING_HOURS_PER_MONTH &&
            $this->totalWorkingDays < $this->WORKING_DAYS_PER_MONTH
        ) {
          //  echo "Company Name : ".$this->COMPANY_NAME . "\n";
            $this->totalWorkingDays++;
            echo "Day : " . $this->totalWorkingDays . "\n";
            $dailyWage = $this->dailyWage();
            $this->dailyWageArray[$i] = $dailyWage;
            $this->monthlyWage += $dailyWage;
            $this->totalWorkingHours += $this->workingHrs;
        }

        echo "Total Working Days : " . $this->totalWorkingDays . "\n";
        echo "Total Working Hours : " . $this->totalWorkingHours . "\n";
        echo "Monthly Wage : " . $this->monthlyWage . "\n\n";

        $this->showDailyWage($this->totalWorkingDays);
        return $this->monthlyWage;
    }

    function showDailyWage($totalWorkingDays){
        echo "Daily wage is : ";
        for ($i = 0; $i < $totalWorkingDays; $i++) {
            echo $this->dailyWageArray[$i] . " ";
        }
        echo "/n";
    }
}
//Creating object of CompanyList and calling the method
$multipleCompany = new CompanyList();
$multipleCompany->multipleCompanies();
?>