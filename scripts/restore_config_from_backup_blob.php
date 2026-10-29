<?php

/**
 * @file
 * Unserialize a config blob extracted from a MySQL dump (doubled quotes).
 *
 * Usage: php restore_config_from_backup_blob.php /path/to/blob.blob
 */

$path = $argv[1] ?? '';
if ($path === '' || !is_readable($path)) {
  fwrite(STDERR, "Usage: php {$argv[0]} <blob-file>\n");
  exit(1);
}

$blob = file_get_contents($path);
// MySQL dumps escape single quotes by doubling them inside string literals.
$blob = str_replace("''", "'", $blob);
// Some dumps store backslash-escaped double quotes in serialized strings.
$blob = stripslashes($blob);
$data = unserialize($blob, ['allowed_classes' => FALSE]);
if ($data === FALSE) {
  fwrite(STDERR, "unserialize failed for {$path}\n");
  exit(1);
}

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
