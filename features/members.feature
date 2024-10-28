Feature:
  In order to use the application
  As a visitor
  I want to be able to become a member

  Background:
    Given there are users:
      | firstName | lastName | email                 | hiringDate |
      | Mike      | Test     | mike.test@email.com   | 01.01.2023 |
      | Ivan      | Drago    | idrago@emails.us      | 12.10.2024 |
      | Milan     | Zver     | milan@zver.hr         | 12.10.2024 |



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

  Scenario: Displaying all members
    Given user with email "user@email.com", first name "Old", last name "Faithful" and hiring date "01.01.2004" exists
      And user enters his email:"john@email.com", first name "John", last name "Doe" and hiring date "01.04.2024"
    When chooses to become member
    Then user is not created
    And error is displayed