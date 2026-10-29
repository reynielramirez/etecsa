<?php

/**
 * @file
 * Recreates field config entities with corrupt serialized config rows.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/fix_corrupt_field_configs.php
 */

use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;

$connection = \Drupal::database();
$storage = \Drupal::entityTypeManager()->getStorage('field_config');
$names = $connection->query(
  "SELECT name FROM {config} WHERE collection = '' AND name LIKE 'field.field.%'"
)->fetchCol();

$recreated = 0;
$skipped = 0;

foreach ($names as $config_name) {
  $id = substr($config_name, strlen('field.field.'));
  if ($storage->load($id)) {
    continue;
  }

  $blob = $connection->query(
    'SELECT data FROM {config} WHERE name = :name AND collection = :collection',
    [':name' => $config_name, ':collection' => '']
  )->fetchField();

  if ($blob === FALSE || unserialize($blob) !== FALSE) {
    continue;
  }

  if (!preg_match('/^([^.]+)\.([^.]+)\.(.+)$/', $id, $parts)) {
    $skipped++;
    continue;
  }
  [, $entity_type, $bundle, $field_name] = $parts;

  $field_storage = FieldStorageConfig::load("{$entity_type}.{$field_name}");
  if (!$field_storage) {
    echo "Skip {$id}: missing field storage\n";
    $skipped++;
    continue;
  }

  if (!preg_match('/s:4:"uuid";s:36:"([^"]+)"/', $blob, $uuid_match)) {
    echo "Skip {$id}: no uuid\n";
    $skipped++;
    continue;
  }

  $label = $field_name;
  if (preg_match('/s:5:"label";s:\d+:"([^"]*)"/', $blob, $label_match)) {
    $label = fix_label($label_match[1]) ?: $label;
  }

  $connection->delete('config')
    ->condition('name', $config_name)
    ->execute();

  try {
    FieldConfig::create([
      'uuid' => $uuid_match[1],
      'langcode' => 'es',
      'status' => TRUE,
      'dependencies' => [
        'config' => [
          "field.storage.{$entity_type}.{$field_name}",
        ],
      ],
      'id' => $id,
      'field_name' => $field_name,
      'entity_type' => $entity_type,
      'bundle' => $bundle,
      'label' => $label,
      'required' => FALSE,
    ])->save();
    $recreated++;
  }
  catch (\Throwable $e) {
    echo "Skip {$id}: {$e->getMessage()}\n";
    $skipped++;
  }
}

\Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
echo "Recreated field configs: {$recreated}, skipped: {$skipped}\n";

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
