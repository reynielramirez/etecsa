<?php

/**
 * @file
 * Recreates field storage config entities with corrupt serialized config rows.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/fix_corrupt_field_storage.php
 */

use Drupal\field\Entity\FieldStorageConfig;

$field_names = [
  'field_clasif_enlace_descrip',
  'field_pertenece_a',
  'field_promo',
  'field_provincia',
  'field_tipo',
  'field_tipogen',
  'field_tipo_de_imagen',
  'field_tipo_imagen',
];

$connection = \Drupal::database();
$storage = \Drupal::entityTypeManager()->getStorage('field_storage_config');

foreach ($field_names as $field_name) {
  $config_name = "field.storage.node.{$field_name}";
  $blob = $connection->query(
    'SELECT data FROM {config} WHERE name = :name AND collection = :collection',
    [':name' => $config_name, ':collection' => '']
  )->fetchField();

  if ($blob === FALSE) {
    echo "Missing config row: {$config_name}\n";
    continue;
  }

  if (!preg_match('/s:4:"uuid";s:36:"([^"]+)"/', $blob, $uuid_match)) {
    echo "Could not parse uuid for {$field_name}\n";
    continue;
  }

  preg_match_all(
    '/s:5:"value";s:\d+:"([^"]*)";s:5:"label";s:\d+:"([^"]*)";/',
    $blob,
    $pairs,
    PREG_SET_ORDER
  );

  $allowed_values = [];
  foreach ($pairs as $pair) {
    $allowed_values[$pair[1]] = fix_label($pair[2]);
  }

  if ($allowed_values === []) {
    echo "No allowed values parsed for {$field_name}\n";
    continue;
  }

  $id = "node.{$field_name}";
  $existing = $storage->load($id);
  if ($existing) {
    echo "Already loadable: {$id}\n";
    continue;
  }

  // Remove corrupt serialized rows (default + language overrides).
  $connection->delete('config')
    ->condition('name', $config_name)
    ->execute();

  FieldStorageConfig::create([
    'uuid' => $uuid_match[1],
    'langcode' => 'es',
    'status' => TRUE,
    'dependencies' => [
      'module' => ['node', 'options'],
    ],
    'id' => $id,
    'field_name' => $field_name,
    'entity_type' => 'node',
    'type' => 'list_string',
    'settings' => [
      'allowed_values' => $allowed_values,
      'allowed_values_function' => '',
    ],
    'module' => 'options',
    'locked' => FALSE,
    'cardinality' => 1,
    'translatable' => TRUE,
  ])->save();

  echo "Recreated field storage: {$id} (" . count($allowed_values) . " options)\n";
}

\Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
$definitions = \Drupal::service('entity_field.manager')->getFieldStorageDefinitions('node');
\Drupal::service('entity.last_installed_schema.repository')
  ->setLastInstalledFieldStorageDefinitions('node', $definitions);

echo 'Synced installed node field storage definitions: ' . count($definitions) . "\n";

/**
 * Fixes common mojibake in option labels from imported DB dumps.
 */
function fix_label(string $label): string {
  $replacements = [
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
