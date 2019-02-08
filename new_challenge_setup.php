<?php
/**
 * new_challenge_setup.php
 * set up a new challenge with skeleton files
 *
 * @author    Jon Schwartz <joschwartz@wayfair.com>
 * @copyright 2019 Wayfair LLC - All rights reserved
 */

$app_root = dirname(__FILE__);

$templates_path = $app_root.'/challenge-data/templates/';

$friday = strtotime('next friday');

$folder_name = date('Y_m_d', $friday);
$folder_path = $app_root.'/'.$folder_name;

echo 'Setting up challenge for ' . date('y-m-d', $friday)."\n\n\n";
echo "\t" . 'Creating '.$folder_path."\n\n";
mkdir($folder_path);

$templates_iterator = new DirectoryIterator($templates_path);

foreach ($templates_iterator as $fileinfo) {
  if (!($fileinfo->isDir())) {
    echo "\t" . 'Copying ' . $fileinfo->getFilename();
    copy($templates_path . $fileinfo->getFilename(), $folder_path . '/' . $fileinfo->getFilename());
  }
}

echo 'Setup Complete.'."\n";