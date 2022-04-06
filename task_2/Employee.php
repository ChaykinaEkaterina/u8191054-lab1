<?php
include "../vendor/autoload.php";
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

$validator = Validation::createValidator();


class Employee {
    public int $id;
    public string $name;
    public int $salary;
    public DateTime $date;

    /**
     * @param $id - идентификатор сотрудника
     * @param $name - имя сотрудника
     * @param $salary- зарплата сотрудника
     * @param $date - дата принятия на работу
     */
    public function __construct(int $id, string $name, int $salary, DateTime $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->salary = $salary;
        $this-> date= $date;
        //date("d.m.y");
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        //$metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraints("name", [
            new Assert\NotBlank(),
            new Assert\Regex([
                'pattern' => '/^[a-z]+$/i',
                'message' => 'Name should only contain letters'
            ]),
            new Assert\Length(['max' => 20])
            ]);

        $metadata->addPropertyConstraints("salary", [
            new Assert\NotBlank(),
            new Assert\Positive
        ]);

        $metadata->addPropertyConstraints("id", [
            new Assert\NotBlank(),
            new Assert\Positive
        ]);
        
        $metadata->addPropertyConstraints("date", [
            new Assert\NotBlank()
        ]);
        
    }

    public function getSeniority() : int
    {
        $now = new DateTime(); // текущее время 
        $interval = $now->diff($this->date); // разница 
        return $interval->y; // кол-во лет

    }


}