<?php

/*
Student Management System
*/

// print("press 1 for counsellor ");
// print("press 2 for faculty ");
// print("press 3 for student ");

// $role_id = readline("Enter a role id: ");

// if($role_id == 1){
//     print("1. Add Student");
//     print("2. Remove Student");
//     print("1. view all Student");
//     print("1. view specific Student");

    // $choice = readline("Enter a choice by counsellor : ");
    // $data = array("Enter choice of counsellor: ");
    // $srno = 
   




class StudentManagementSystem {
    private $students = [];

    public function addStudent() {
        echo "Enter Student ID: ";
        $studentId = trim(fgets(STDIN));
        if (isset($this->students[$studentId])) {
            echo "Student with this ID already exists!\n";
            return;
        }
        echo "Enter Student Name: ";
        $name = trim(fgets(STDIN));
        echo "Enter Student Age: ";
        $age = trim(fgets(STDIN));
        echo "Enter Student Course: ";
        $course = trim(fgets(STDIN));

        $this->students[$studentId] = [
            "Name" => $name,
            "Age" => $age,
            "Course" => $course,
        ];
        echo "Student added successfully!\n";
    }

    public function viewStudents() {
        if (empty($this->students)) {
            echo "No students found.\n";
            return;
        }
        echo "\nStudent List:\n";
        foreach ($this->students as $studentId => $details) {
            echo "ID: $studentId, Name: {$details['Name']}, Age: {$details['Age']}, Course: {$details['Course']}\n";
        }
    }

    public function searchStudent() {
        echo "Enter Student ID to search: ";
        $studentId = trim(fgets(STDIN));
        if (isset($this->students[$studentId])) {
            $details = $this->students[$studentId];
            echo "ID: $studentId, Name: {$details['Name']}, Age: {$details['Age']}, Course: {$details['Course']}\n";
        } else {
            echo "Student not found.\n";
        }
    }

    public function updateStudent() {
        echo "Enter Student ID to update: ";
        $studentId = trim(fgets(STDIN));
        if (isset($this->students[$studentId])) {
            echo "Enter new Name (leave blank to keep current): ";
            $name = trim(fgets(STDIN));
            echo "Enter new Age (leave blank to keep current): ";
            $age = trim(fgets(STDIN));
            echo "Enter new Course (leave blank to keep current): ";
            $course = trim(fgets(STDIN));

            if (!empty($name)) {
                $this->students[$studentId]['Name'] = $name;
            }
            if (!empty($age)) {
                $this->students[$studentId]['Age'] = $age;
            }
            if (!empty($course)) {
                $this->students[$studentId]['Course'] = $course;
            }
            echo "Student updated successfully!\n";
        } else {
            echo "Student not found.\n";
        }
    }

    public function deleteStudent() {
        echo "Enter Student ID to delete: ";
        $studentId = trim(fgets(STDIN));
        if (isset($this->students[$studentId])) {
            unset($this->students[$studentId]);
            echo "Student deleted successfully!\n";
        } else {
            echo "Student not found.\n";
        }
    }

    public function run() {
        while (true) {
            echo "\n--- Student Management System ---\n";
            echo "1. Add Student\n";
            echo "2. View Students\n";
            echo "3. Search Student\n";
            echo "4. Update Student\n";
            echo "5. Delete Student\n";
            echo "6. Exit\n";
            echo "Enter your choice: ";
            $choice = trim(fgets(STDIN));

            switch ($choice) {
                case '1':
                    $this->addStudent();
                    break;
                case '2':
                    $this->viewStudents();
                    break;
                case '3':
                    $this->searchStudent();
                    break;
                case '4':
                    $this->updateStudent();
                    break;
                case '5':
                    $this->deleteStudent();
                    break;
                case '6':
                    echo "Exiting the system. Goodbye!\n";
                    exit();
                default:
                    echo "Invalid choice! Please try again.\n";
            }
        }
    }
}

$system = new StudentManagementSystem();
$system->run();
?>