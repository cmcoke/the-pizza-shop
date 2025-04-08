<?php

/**
 * Getters:
 *  
 *  - Getters are methods used to retrieve the value of a class property.
 *  - They provide a way to access private or protected properties from outside the class.
 *  - A getter method typically follows the naming convention of "getPropertyName" (e.g., getName()).
 *  - Getters are useful when you want to encapsulate the logic for returning a property value, especially if there's additional logic involved.
 *  
 * Setters:
 * 
 *  - Setters are methods used to set or update the value of a class property.
 *  - They allow you to modify the value of private or protected properties from outside the class.
 *  - A setter method typically follows the naming convention of "setPropertyName" (e.g., setName()).
 *  - Setters are useful when you want to validate or perform checks before changing the property value.
 *  - Often used in conjunction with getter methods to follow the principle of encapsulation in object-oriented programming.
 */


class User
{
  // Declare a private property $name that can only be accessed within the class
  private $name;

  // Constructor method to initialize the $name property when a new object is created
  public function __construct($name)
  {
    $this->name = $name;  // Assign the value passed to the constructor to the $name property
  }

  // Getter method to retrieve the value of the private $name property
  public function getName()
  {
    return $this->name;  // Return the value of the $name property
  }

  // Setter method to set or update the value of the private $name property
  public function setName($name)
  {
    // Check if the provided name is a string and has more than 1 character
    if (is_string($name) && strlen($name) > 1) {
      $this->name = $name;  // Set the value of the $name property to the new value
      return "The name has been changed to $name";  // Return a confirmation message
    } else {
      echo "The name was not changed";  // If the validation fails, output an error message
    }
  }
}

// Create a new User object with the name 'mario'
$userOne = new User('mario');

// Call the getName() method to retrieve and display the current value of $name
echo $userOne->getName() . '<br/>';

// Call the setName() method to change the value of $name to 'yoshi' and display the confirmation message
echo $userOne->setName('yoshi') . '<br/>';

// Call the getName() method again to verify that the value of $name has been updated
echo $userOne->getName() . '<br/>';
