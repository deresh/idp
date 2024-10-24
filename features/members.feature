Feature:
  In order to use the application
  As a visitor
  I want to be able to become a member

  Background:


  Scenario: Becoming a member
    Given user enters his email:"newuser@email.com", first name "Mike", last name "test" and hiring date "01.04.2024"
    When chooses to become member
    Then member is created

  Scenario: Becoming a member with already registered email
    Given user with email "user@email.com", first name "Old", last name "Faithful" and hiring date "01.01.2004" exists
    And user enters his email:"user@email.com", first name "John", last name "Doe" and hiring date "01.04.2024"
    When chooses to become member
    Then user is not created
    And error is displayed