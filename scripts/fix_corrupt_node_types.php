<?php

/**
 * @file
 * Recreates node type config entities with corrupt serialized rows.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/fix_corrupt_node_types.php
 */

use Drupal\node\Entity\NodeType;

$connection = \Drupal::database();
$storage = \Drupal::entityTypeManager()->getStorage('node_type');
$names = $connection->query(
  "SELECT name FROM {config} WHERE collection = '' AND name LIKE 'node.type.%'"
)->fetchCol();

foreach ($names as $config_name) {
  $machine_name = substr($config_name, strlen('node.type.'));
  if ($storage->load($machine_name)) {
    continue;
  }

  $blob = $connection->query(
    'SELECT data FROM {config} WHERE name = :name AND collection = :collection',
    [':name' => $config_name, ':collection' => '']
  )->fetchField();

  if ($blob === FALSE || unserialize($blob) !== FALSE) {
    continue;
  }

  if (!preg_match('/s:4:"uuid";s:36:"([^"]+)"/', $blob, $uuid_match)) {
    echo "Skip {$machine_name}: no uuid\n";
    continue;
  }
  if (!preg_match('/s:4:"name";s:\d+:"([^"]*)"/', $blob, $name_match)) {
    echo "Skip {$machine_name}: no label\n";
    continue;
  }
  if (!preg_match('/s:11:"description";s:\d+:"([^"]*)"/', $blob, $desc_match)) {
    $desc_match = [1 => ''];
  }

  $connection->delete('config')
    ->condition('name', $config_name)
    ->execute();

  NodeType::create([
    'uuid' => $uuid_match[1],
    'langcode' => 'es',
    'status' => TRUE,
    'dependencies' => [
      'module' => ['menu_ui'],
    ],
    'third_party_settings' => [
      'menu_ui' => [
        'available_menus' => ['main'],
        'parent' => 'main:',
      ],
    ],
    'name' => fix_label($name_match[1]),
    'type' => $machine_name,
    'description' => fix_label($desc_match[1]),
    'help' => '',
    'new_revision' => TRUE,
    'preview_mode' => 0,
    'display_submitted' => FALSE,
  ])->save();

  echo "Recreated node type: {$machine_name}\n";
}

/**
 * Fixes common mojibake in labels from imported DB dumps.
 */
function fix_label(string $label): string {
  $replacements = [
    'informaciÃ³n' => 'información',
    'ProtecciÃ³n' => 'Protección',
    'Ã³' => 'ó',
    'Ã¡' => 'á',
    'Ã©' => 'é',
    'Ã­' => 'í',
    'Ãº' => 'ú',
    'Ã±' => 'ñ',
  ];
  return strtr($label, $replacements);
}
