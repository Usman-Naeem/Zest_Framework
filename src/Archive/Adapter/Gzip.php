<?php

/**
 * This file is part of the Zest Framework.
 *
 * @author Muhammad Umer Farooq (Malik) <mumerfarooqlablnet01@gmail.com>
 *
 * @link https://lablnet.github.io/profile/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @license MIT
 *
 * @since 3.0.0
 */

namespace Zest\Archive\Adapter;

class Gzip
{
    /**
     * Open zip extract zip.
     *
     * @param (string) $file   file that you want uncompress/open
     * @param (string) $target where you extract file
     * @param (bool)   $delete true delete zip file false not delete
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function extract($file, $target, $delete = false)
    {
        if (file_exists($file)) {
            // buffer size 4KB
            $bufferSize = 4096;
            $filename = str_replace('.gz', '', $file);
            // Open our files (in binary mode)
            if ($file = gzopen($target. $file, 'rb') {
              if ($outfile = fopen($filename, 'wb')) {
                // Keep repeating until the end of the input file
                while (!gzeof($file)) {
                    fwrite($outfile, gzread($file, $bufferSize));
                }
                fclose($outfile);
              }
              gzclose($file);
            }
            if ($delete === true)
                unlink($file);
        }
        return true;
    }

    /**
     * Compress file into bzip.
     *
     * @param (string) $file        file that you want compress
     * @param (string) $destination destination
     * @param (bool)d  $overwrite   true delete zip file false not delete
     *
     * @since 1.0.0
     *
     * @return bool
     */
    public function compress($file, $destination = '', $overwrite = false)
    {
        //if the zip file already exists and overwrite is false, return false
        if (file_exists($destination) && !$overwrite) {
            return false;
        }
        $mode = 'wb' . __config('archive.gzip.level') ?? 9;
        $filename = $destination;
        $bufferSize = 4096;
        if ($outfile = gzopen($filename, $mode)) {
            if ($infile = fopen($file,'rb')) {
                while (!feof($infile)) {
                    gzwrite($outfile, fread($infile, $bufferSize));
                }
                fclose($infile);
            }
            gzclose($outfile);
        }
       //check to make sure the file exists
       return file_exists($filename);
    }
}
