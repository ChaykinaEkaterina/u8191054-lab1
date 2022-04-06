<?php

include_once "Employee.php";
include "Department.php";
include "../vendor/autoload.php";


$first_emps = [];
$first_emps []= new Employee(1, "FirstName", 100, new DateTime("02.04.2002"));
$first_emps []= new Employee(2, "SecondName", 200, new DateTime("05.05.2005"));
$first_emps []= new Employee(3, "ThirdName", 300, new DateTime("03.03.2003"));
//sumSalary = 600

$second_emps = [];
$second_emps []= new Employee(1, "FirstEmp", 50, new DateTime("07.07.2017"));
$second_emps []= new Employee(2, "SecondEmp", 400, new DateTime("01.01.2001"));
$second_emps []= new Employee(3, "ThirdEmp", 200, new DateTime("11.11.2011"));
//sumSalary = 650

$third_emps = [];
$third_emps []= new Employee(5, "ThirdDeptEmp", 100, new DateTime("07.07.2020"));
$third_emps []= new Employee(6, "AnotherThirdDeptEmp", 450, new DateTime("06.06.2006"));
$third_emps []= new Employee(9, "AndAnother", 100, new DateTime("10.10.2010"));
//sumSalary = 650

$fourth_emps = [];
$fourth_emps []= new Employee(5, "FourthDeptEmp", 100, new DateTime("07.07.2020"));
$fourth_emps []= new Employee(6, "AnotherFourthDeptEmp", 400, new DateTime("06.06.2006"));
$fourth_emps []= new Employee(9, "AndAnotherFourth", 50, new DateTime("10.10.2010"));
$fourth_emps []= new Employee(9, "LastOne", 100, new DateTime("10.10.2010"));
//sumSalary = 650

$depts = [];
$depts [] = new Department($first_emps, "Dept1");
$depts [] = new Department($second_emps, "Dept2");
$depts [] = new Department($third_emps, "Dept3");
$depts [] = new Department($fourth_emps, "Dept4");

$minSalary = $depts[1]->salarySum();
$maxSalary = $depts[1]->salarySum();
$minSalaryDept = [];
$minSalaryDept [] = $depts[1];
$maxSalaryDept = [];
$maxSalaryDept [] = $depts[1];
foreach ($depts as $dept) {
    if ($dept->salarySum()<=$minSalary && !in_array($dept, $minSalaryDept)) 
    {
        if ($dept->salarySum()<$minSalary) 
        {
        $minSalary = $dept->salarySum();
        $minSalaryDept = [];
        $minSalaryDept [] = $dept;
        }
        else {
            if (count($dept->getEmployees())>count($minSalaryDept[0]->getEmployees())) 
            {
                $minSalaryDept = [];
                $minSalaryDept[0] = $dept;
            }
            else $minSalaryDept []= $dept;
        }
    }
    elseif ($dept->salarySum()>=$maxSalary && !in_array($dept, $maxSalaryDept))  
    {
        if ($dept->salarySum()>$maxSalary) 
        {
        $maxSalary = $dept->salarySum();
        $maxSalaryDept = [];
        $maxSalaryDept []= $dept;
        }
        else {
            if (count($dept->getEmployees())>count($maxSalaryDept[0]->getEmployees())) 
            {
                $maxSalaryDept = [];
                $maxSalaryDept[0] = $dept;
            }
            elseif (count($dept->getEmployees())==count($maxSalaryDept[0]->getEmployees())) $maxSalaryDept []= $dept;
        }
    }
}

    foreach ($maxSalaryDept as $maxDept) {
        echo "Max salary: ". $maxSalary. ", Name of department: ". $maxDept->getName(). "<br>";
    }
    foreach ($minSalaryDept as $minDept) {
        echo "Min salary: ", $minSalary. ", Name of department: ". $minDept->getName(). "<br>";
    }


