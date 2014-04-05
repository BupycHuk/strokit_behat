Feature: Create post
  In order to Create posts
  As an anonymous
  I need to be able to create post
  @javascript
  Scenario: Post create page with javascript
    Given I am on "/post/create"
    When I fill in "post_type_title" with "testTitle"
    When I fill in "post_type_content" with "testContent"
    When press "post_type_submit"
    Then I should see "пост сохранен"
  @javascript
  Scenario: Post create page fail with javascript
    Given I am on "/post/create"
    When I fill in "post_type_content" with "testContent"
    When press "post_type_submit"
    Then I should not see "пост не сохранен"
    Then I should not see "пост сохранен"
  Scenario: Post create page without javascript
    Given I am on "/post/create"
    When I fill in "post_type_title" with "testTitle"
    When I fill in "post_type_content" with "testContent"
    When press "post_type_submit"
    Then I should see "пост сохранен"
  Scenario: Post create page fail without javascript
    Given I am on "/post/create"
    When I fill in "post_type_content" with "testContent"
    When press "post_type_submit"
    Then I should see "пост не сохранен"

