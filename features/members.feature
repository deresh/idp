Feature:
  In order to use the application
  As a visitor
  I want to be able to become a member

  Scenario: Becoming a member
    Given user enters his data "email", "first name", "last name" and "datetime"
    And chooses to become member
    Then member is created
