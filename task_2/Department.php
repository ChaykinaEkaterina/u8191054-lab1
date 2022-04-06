<?php
include "../vendor/autoload.php";
include_once "Employee.php";



class Department {
    private string $name;
    private array $emps;

    public function __construct(array $emps, string $name)
    {

        $this->name = $name;
        $this->emps = $emps;
        //date("d.m.y");
    }

    public function salarySum() :int
    {
        $sum=0;

         foreach ($this->emps as $emp) {
           $sum = $sum + $emp->salary;
        }    
        return $sum;     
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmployees(): array
    {
        return $this->emps;
    }
}