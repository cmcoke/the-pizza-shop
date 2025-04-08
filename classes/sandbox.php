<?php

/**
 * Classes
 * 
 *  - Defines properties (variables) and methods (functions) that the objects instantiated from the class will have.
 * 
 * 
 *  Constructor Functions:
 * 
 *  - Is a special method within a class that gets called automatically when a new object is created.
 * 
 *  - The constructor is typically used to initialize the object's properties with specific values upon creation.
 * 
 *  - Syntax: In PHP, constructors are defined using the __construct() method.
 * 
 *  - Example:
 * 
 *     class MyClass{
 * 
 *      public $name;
 * 
 *      public function __construct($name) {
 *        $this->name = $name;
 *      }
 * 
 *     }
 * 
 *   
 *  Access Modifiers:
 * 
 *   - Access modifiers define the accessibility of properties and methods in a class. They control where a property or method can be accessed from.
 *   
 *   - Three types of access modifiers are available:
 * 
 *      - public:  The property or method can be accessed from anywhere (inside or outside the class, and by child classes). This is the default behavior in PHP.
 * 
 *      - protected: The property or method can be accessed within the class and by classes that inherit from it, but it cannot be accessed outside of the class hierarchy.
 * 
 *      - private: The property or method can only be accessed within the class itself. It cannot be accessed outside the class or by child classes.
 */


class User
{

  // The 'public' keyword makes the $name property accessible from outside the class
  // This means that any code can directly access or modify this property (e.g., $userOne->name)
  public $name;

  // The 'public' keyword makes the $email property accessible from outside the class
  // Like the $name property, this can be directly accessed or modified by any code (e.g., $userOne->email)
  public $email;

  // Constructor to initialize the properties
  public function __construct($name, $email)
  {
    // The $this keyword refers to the object (userOne)
    $this->name = $name;  // Sets the name property of the current object
    $this->email = $email; // Sets the email property of the current object
  }

  // Method to display the login message
  public function login()
  {
    // Again, $this refers to the current object (userOne) and accesses its 'name' property
    echo $this->name . ' is logged in';
  }
}

// Create a new instance of the User class
$userOne = new User('mario', 'mario@nintendo.com');

// Accessing the 'name' property of the object
echo $userOne->name . '<br/>';

// Calling the 'login' method on the object, which uses $this to refer to $userOne
$userOne->login();
