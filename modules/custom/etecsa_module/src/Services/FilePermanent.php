<?php

namespace Drupal\etecsa_module\Services;

use Drupal\file\Entity\File;

/**
 * Class FilePermanent.
 */
class FilePermanent
{

    /**
     * Constructs a new FilePermanent object.
     */
    public function __construct()
    {

    }

    /**
     * Method to save file permanenty in the database.
     *
     * @param string $fid
     *   File id.
     */
    public function setFileAsPermanent($fid)
    {
        if (is_array($fid)) {
            $fid = array_shift($fid);
        }

        $file = File::load($fid);

        // If file doesn't exist return.
        if (!is_object($file)) {
            return;
        }

        // Set as permanent.
        $file->setPermanent();

        // Save file.
        $file->save();

        // Add usage file.
        \Drupal::service('file.usage')->add($file, 'etecsa_module', 'etecsa_module', 1);
    }

}
