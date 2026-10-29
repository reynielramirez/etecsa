<?php

/**
 * @file
 * Creates missing field instances referenced in the entity field map.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/fix_orphan_field_map.php
 */

use Drupal\field\Entity\FieldConfig;

$to_create = [
  [
    'id' => 'taxonomy_term.tipo_paquete.field_subtitulo',
    'entity_type' => 'taxonomy_term',
    'bundle' => 'tipo_paquete',
    'field_name' => 'field_subtitulo',
    'label' => 'Subtítulo',
  ],
  [
    'id' => 'taxonomy_term.tipos_de_so.field_subtitulo',
    'entity_type' => 'taxonomy_term',
    'bundle' => 'tipos_de_so',
    'field_name' => 'field_subtitulo',
    'label' => 'Subtítulo',
  ],
  [
    'id' => 'taxonomy_term.tipo_de_plan.field_subtitulo',
    'entity_type' => 'taxonomy_term',
    'bundle' => 'tipo_de_plan',
    'field_name' => 'field_subtitulo',
    'label' => 'Subtítulo',
  ],
  [
    'id' => 'block_content.bloque_formulario_estado_opinion.field_estado_de_opinion',
    'entity_type' => 'block_content',
    'bundle' => 'bloque_formulario_estado_opinion',
    'field_name' => 'field_estado_de_opinion',
    'label' => 'Estado de opinión',
  ],
];

$storage = \Drupal::entityTypeManager()->getStorage('field_config');

foreach ($to_create as $info) {
  if ($storage->load($info['id'])) {
    echo "Exists: {$info['id']}\n";
    continue;
  }
  $field_storage_id = "{$info['entity_type']}.{$info['field_name']}";
  if (!\Drupal::entityTypeManager()->getStorage('field_storage_config')->load($field_storage_id)) {
    echo "Skip {$info['id']}: missing storage {$field_storage_id}\n";
    continue;
  }
  FieldConfig::create([
    'langcode' => 'es',
    'status' => TRUE,
    'dependencies' => [
      'config' => ["field.storage.{$field_storage_id}"],
    ],
    'id' => $info['id'],
    'field_name' => $info['field_name'],
    'entity_type' => $info['entity_type'],
    'bundle' => $info['bundle'],
    'label' => $info['label'],
    'required' => FALSE,
  ])->save();
  echo "Created: {$info['id']}\n";
}

\Drupal::service('entity_field.manager')->clearCachedFieldDefinitions();
if (\Drupal::hasService('entity_field.map_cache')) {
  \Drupal::cache('discovery')->deleteAll();
}
echo "Done.\n";
