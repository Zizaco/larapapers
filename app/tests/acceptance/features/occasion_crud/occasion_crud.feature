Feature: OccasionCRUD
As a administrador
I would like to manage an occasion
In order to manage the events/occasions and to to hold the proposals

Scenario: Listing Occasions
    Given A clean "ocassions" collection
    When I have "Occasion" which the type is "valid_occasion"
    Then I should see the "valid_occasion" at "occasions"

Scenario: Creating Occasions
    Given A clean "ocassions" collection
    And I access "occasion/create"
    When I submit the form with "Occasion" which the type is "valid_occasion"
    Then I should see the "valid_occasion" at "occasions"

Scenario: Updating Occasions
    Given I have "Occasion" which the type is "valid_occasion"
    And I access "occasion/random_event_a/edit"
    When I submit the form with "Occasion" which the type is "another_valid_occasion"
    Then I should see the "another_valid_occasion" at "occasions"
    And I should not see the "valid_occasion" at "occasions"

Scenario: Deleting Occasions
    Given I have "Occasion" which the type is "valid_occasion"
    When I delete a "valid_occasion"
    And I should not see the "valid_occasion" at "occasions"
