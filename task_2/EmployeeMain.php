<?php

include_once "Employee.php";
include "Department.php";
include "../vendor/autoload.php";

use \Symfony\Component\Validator\ValidatorBuilder;


$emps = [];
$emps []= new Employee(1, "CorrectName", 100, new DateTime("02.04.2002"));
$emps []= new Employee(2, "Wrong.Name", 200, new DateTime("05.05.2005"));
$emps []= new Employee(-5, "WrongId", 300, new DateTime("03.03.2003"));

$emps []= new Employee(4, "WrongSalary", 0, new DateTime("07.07.2017"));
$smps []= new Employee(5, "FifthName", 400, new DateTime("01.01.2001"));
$emps []= new Employee("6", "SixthName", 200, new DateTime("11.11.2011"));

$emps []= new Employee(5, "7thName", "100", new DateTime("07.07.2020"));




$validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();

    $errors = $validator->validate($emps);

    if(count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error."\n";
        }
    }

