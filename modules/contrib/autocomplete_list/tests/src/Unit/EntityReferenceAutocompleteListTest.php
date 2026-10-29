<?php

declare(strict_types=1);

namespace Drupal\Tests\autocomplete_list\Unit;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Tests\UnitTestCase;
use Drupal\autocomplete_list\Plugin\Field\FieldWidget\EntityReferenceAutocompleteList;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;

#[CoversClass(EntityReferenceAutocompleteList::class)]
#[Group('autocomplete_list')]
/**
 * Tests the form value normalisation of the autocomplete list widget.
 */
final class EntityReferenceAutocompleteListTest extends UnitTestCase {

  /**
   * Ensures submitted references are flattened and deduplicated.
   */
  public function testMassageFormValuesRemovesDuplicates(): void {
    $widget = (new \ReflectionClass(EntityReferenceAutocompleteList::class))
      ->newInstanceWithoutConstructor();
    $form_state = $this->createMock(FormStateInterface::class);

    $values = [
      ['target_id' => ['target_id' => '3']],
      ['target_id' => '3'],
      ['target_id' => ['target_id' => '7']],
      [],
    ];

    self::assertSame([
      ['target_id' => '3'],
      ['target_id' => '7'],
    ], $widget->massageFormValues($values, [], $form_state));
  }

}
