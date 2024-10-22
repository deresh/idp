Feature:
  In order to use the application
  As a visitor
  I want to be able to become a member

  Scenario: Becoming a member
    Given user enters his email:"user@email.com", first name "Mike", last name "test" and hiring date "01.04.2024"
    And chooses to become member
    Then member is created
