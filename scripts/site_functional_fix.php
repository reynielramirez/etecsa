<?php

/**
 * @file
 * Applies production-aligned site settings and repairs broken role configs.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/site_functional_fix.php
 */

use Drupal\user\Entity\Role;

// Production values from backup_ETECSA-DB_etecsadb_20261021_1257_nfc.sql (2026-10-21).
$site = [
  '_core' => [
    'default_config_hash' => 'yTxtFqBHnEWxQswuWvkjE8mKw2t8oKuCL1q8KnfHuGE',
  ],
  'langcode' => 'es',
  'uuid' => 'e1ad7549-ccbb-4731-8e22-2b1a4aceee1b',
  'name' => 'Empresa de Telecomunicaciones de Cuba S.A (ETECSA)',
  'mail' => 'formulario.web@etecsa.cu',
  'slogan' => 'En línea con el mundo',
  'page' => [
    403 => '/pagina-acceso-denegado',
    404 => '/pagina-no-encontrada',
    'front' => '/inicio',
  ],
  'admin_compact_mode' => FALSE,
  'weight_select_max' => 100,
  'default_langcode' => 'es',
  'mail_notification' => '',
];

\Drupal::configFactory()->getEditable('system.site')->setData($site)->save(TRUE);
echo "Restored system.site (front={$site['page']['front']}, uuid={$site['uuid']})\n";

$anonymous_permissions = [
  'access comments',
  'access content',
  'access content overview',
  'access site-wide contact form',
  'search content',
  'use text format restricted_html',
  'view empty pages',
  'view terms in cargo',
  'view terms in marcas',
  'view terms in modelos',
  'view terms in operadores',
  'view terms in paises',
  'view terms in provincias',
  'view terms in segmentos',
  'view terms in temas_faq',
  'view terms in tipo_de_instalacion',
  'view terms in tipo_de_plan',
  'view terms in tipo_paquete',
  'view terms in tipos_de_clientes',
  'view terms in tipos_de_equipos',
  'view terms in tipos_de_establecimientos',
  'view terms in tipos_de_so',
];

$connection = \Drupal::database();
$blob = $connection->query(
  'SELECT data FROM {config} WHERE name = :name AND collection = :c',
  [':name' => 'user.role.anonymous', ':c' => '']
)->fetchField();

if ($blob !== FALSE) {
  $blob = stripslashes(str_replace("''", "'", $blob));
  $parsed = @unserialize($blob, ['allowed_classes' => FALSE]);
  if (is_array($parsed) && !empty($parsed['permissions']) && is_array($parsed['permissions'])) {
    $anonymous_permissions = array_values(array_unique(array_merge(
      $anonymous_permissions,
      $parsed['permissions']
    )));
  }
}

$role_storage = \Drupal::entityTypeManager()->getStorage('user_role');
/** @var \Drupal\user\Entity\Role|null $role */
$role = $role_storage->load('anonymous');
if (!$role) {
  preg_match('/s:4:"uuid";s:36:"([^"]+)"/', $blob ?: '', $uuid_match);
  $connection->delete('config')->condition('name', 'user.role.anonymous')->execute();
  $role = Role::create([
    'uuid' => $uuid_match[1] ?? \Drupal::service('uuid')->generate(),
    'langcode' => 'es',
    'status' => TRUE,
    'id' => 'anonymous',
    'label' => 'Usuario anónimo',
    'weight' => 0,
    'is_admin' => FALSE,
  ]);
}
$valid = array_keys(\Drupal::service('user.permissions')->getPermissions());
$anonymous_permissions = array_values(array_intersect($anonymous_permissions, $valid));
$role->set('permissions', $anonymous_permissions);
$role->save();
echo 'Updated anonymous role (' . count($role->getPermissions()) . " permissions)\n";

// Remove stale schema entries for removed modules.
$schema = \Drupal::keyValue('system.schema');
$removed = [
  'ckeditor_font',
  'ckeditor_format_buttons',
  'ckeditor_ls',
  'ckeditor_tableselection',
  'colorbutton',
  'jquery_ui_effects',
  'panelbutton',
];
foreach ($removed as $module) {
  if ($schema->get($module) !== NULL) {
    $schema->delete($module);
    echo "Removed system.schema entry: {$module}\n";
  }
}

// Restore main menu entity and Superfish block if missing (local DB drift).
$menu_storage = \Drupal::entityTypeManager()->getStorage('menu');
if (!$menu_storage->load('main')) {
  $menu_storage->create([
    'id' => 'main',
    'label' => 'Main navigation',
    'description' => 'Site section links',
    'langcode' => 'es',
    'status' => TRUE,
    'locked' => TRUE,
  ])->save();
  echo "Created menu: main\n";
}

$theme = \Drupal::config('system.theme')->get('default') ?: 'etecsa_subtheme';
$block_id = 'superfishmain';
$block_storage = \Drupal::entityTypeManager()->getStorage('block');
$full_id = $theme . '.' . $block_id;
$block = $block_storage->load($block_id);
if (!$block) {
  $plugin_id = 'superfish:main';
  $settings = \Drupal::service('plugin.manager.block')->createInstance($plugin_id)->getConfiguration();
  $block_storage->create([
    'id' => $block_id,
    'theme' => $theme,
    'region' => 'primary_menu',
    'weight' => 0,
    'plugin' => $plugin_id,
    'settings' => $settings,
    'visibility' => [],
    'status' => TRUE,
  ])->save();
  echo "Created Superfish block in primary_menu for {$theme}\n";
}
else {
  $block->setRegion('primary_menu');
  $block->setStatus(TRUE);
  $block->save();
  echo "Superfish block already exists; ensured primary_menu region for {$theme}\n";
}

echo "Done.\n";
