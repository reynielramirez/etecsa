<?php

namespace Drupal\autocomplete_list\Hook;

use Drupal\Core\Hook\Attribute\Hook;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Hook implementations for Autocomplete List.
 */
final class AutocompleteListHooks {

  /**
   * Implements hook_help().
   */
  #[Hook('help')]
  public function help($route_name, RouteMatchInterface $route_match): ?string {
    if ($route_name !== 'help.page.autocomplete_list') {
      return NULL;
    }

    return '<pre>' . file_get_contents(dirname(__DIR__, 2) . '/README.txt') . '</pre>';
  }

}
