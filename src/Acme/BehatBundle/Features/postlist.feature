@javascript
Feature: show post list

  Scenario: Show clear post list
    Given the database is clean
    When I am on "/post"
    Then I should see "Нет постов"

  Scenario: Show post list with one post
    Given the database is clean
    Given one post in database
      | Title      | Content      |
      | Some title | Some content |
    When I am on "/post"
    Then I should not see "Нет постов"
    Then I should see "Some title"
    Then I should see "Some content"

  Scenario: Show post list with many post
    Given the database is clean
    Given many post in database
      | Title       | Content       |
      | Other title | Other content |
      | second title | second content |
    When I am on "/post"
    Then I should not see "Нет постов"
    Then I should see "Other title"
    Then I should see "Other content"
    Then I should see "Second title"
    Then I should see "Second content"

