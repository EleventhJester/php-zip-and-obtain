<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

$zip = new ZipArchive();
$zipFileName = 'my-archive.zip';

$sourceFilePath = 'files-to-zip/motivatie.txt'; // Relative path to the file

try {
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        // Add the motivatie.txt file to the zip archive using LZMA compression
        $archiveFilePath = 'motivatie.txt'; // This is the path within the archive

        if ($zip->addFile($sourceFilePath, $archiveFilePath, ZipArchive::CM_LZMA)) {
            // Close the zip archive
            $zip->close();

            echo "Zip archive created successfully.";

            // Move the zip archive to either the 'files-to-zip' or 'php-zip' directory
            $targetDirectory = 'zip-or-obtain'; 
            $targetPath = $targetDirectory . '/' . $zipFileName;

            if (rename($zipFileName, $targetPath)) {
                echo " Zip archive moved to '$targetDirectory' directory.";
            } else {
                throw new Exception("Failed to move zip archive to '$targetDirectory' directory.");
            }
        } else {
            throw new Exception("Failed to add file to zip archive.");
        }
    } else {
        throw new Exception("Failed to create zip archive.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>