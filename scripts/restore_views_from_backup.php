<?php

/**
 * @file
 * Restores views configuration from MySQL backup when serialization is intact.
 *
 * Run: php vendor/drush/drush/drush.php scr scripts/restore_views_from_backup.php
 */

$backup = '/Users/reyniel-smart145/Herd/backup_ETECSA-DB_etecsadb_20261021_1257_nfc.sql';
if (!is_readable($backup)) {
  echo "Backup not found: {$backup}\n";
  return;
}

/**
 * Extracts a config blob from a mysqldump INSERT line.
 */
function etecsa_extract_config_blob(string $line, string $config_name): ?string {
  $marker = "','{$config_name}','";
  $pos = strpos($line, $marker);
  if ($pos === FALSE) {
    return NULL;
  }
  $start = $pos + strlen($marker);
  $len = strlen($line);
  $depth = 0;
  $in_string = FALSE;
  for ($i = $start; $i < $len; $i++) {
    $char = $line[$i];
    if ($in_string) {
      if ($char === "'" && ($i + 1) < $len && $line[$i + 1] === "'") {
        $i++;
      }
      elseif ($char === "'") {
        $in_string = FALSE;
      }
      continue;
    }
    if ($char === "'") {
      $in_string = TRUE;
      continue;
    }
    if ($char === '{') {
      $depth++;
    }
    elseif ($char === '}') {
      $depth--;
      if ($depth === 0) {
        return str_replace("''", "'", substr($line, $start, $i - $start + 1));
      }
    }
  }
  return NULL;
}

/**
 * Unserialize dump blob (handles escaped quotes from SQL export).
 */
function etecsa_unserialize_config(?string $blob): array|false {
  if ($blob === NULL || $blob === '') {
    return FALSE;
  }
  $blob = stripslashes(str_replace("''", "'", $blob));
  return unserialize($blob, ['allowed_classes' => FALSE]);
}

$targets = [];
foreach (\Drupal::database()->query(
  "SELECT name FROM {config} WHERE collection = '' AND name LIKE 'views.view.%'"
) as $row) {
  $targets[] = $row->name;
}

$backup_blobs = [];
$handle = fopen($backup, 'r');
if ($handle === FALSE) {
  echo "Cannot open backup.\n";
  return;
}
while (($line = fgets($handle)) !== FALSE) {
  if (!str_starts_with($line, 'INSERT INTO `config`')) {
    continue;
  }
  foreach ($targets as $config_name) {
    if (isset($backup_blobs[$config_name])) {
      continue;
    }
    $blob = etecsa_extract_config_blob($line, $config_name);
    if ($blob !== NULL) {
      $backup_blobs[$config_name] = $blob;
    }
  }
  if (count($backup_blobs) === count($targets)) {
    break;
  }
}
fclose($handle);

$restored = 0;
$still_broken = [];

foreach ($targets as $config_name) {
  $id = str_replace('views.view.', '', $config_name);
  if (\Drupal::entityTypeManager()->getStorage('view')->load($id)) {
    continue;
  }

  $data = FALSE;
  if (isset($backup_blobs[$config_name])) {
    $data = etecsa_unserialize_config($backup_blobs[$config_name]);
  }

  if ($data === FALSE) {
    $current = \Drupal::database()->query(
      'SELECT data FROM {config} WHERE name = :name AND collection = :c',
      [':name' => $config_name, ':c' => '']
    )->fetchField();
    $data = etecsa_unserialize_config($current ?: '');
  }

  if ($data === FALSE) {
    $still_broken[] = $config_name;
    continue;
  }

  \Drupal::configFactory()->getEditable($config_name)->setData($data)->save(TRUE);
  $restored++;
  echo "Restored {$config_name}\n";
}

\Drupal::service('router.builder')->rebuild();
echo "Restored {$restored} views; still broken: " . count($still_broken) . "\n";
if ($still_broken !== []) {
  echo implode("\n", array_slice($still_broken, 0, 20)) . "\n";
}
