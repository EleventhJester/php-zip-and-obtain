<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

$zipFileName = './zip-or-obtain/my-archive.zip'; // Path to the zip archive
$extractPath = './zip-or-obtain'; // Path to the extraction directory

try {
    $zip = new ZipArchive();

    if ($zip->open($zipFileName) === true) {
        // Create the extraction directory if it doesn't exist
        if (!file_exists($extractPath)) {
            mkdir($extractPath, 0755, true);
        }

        // Extract the contents of the zip archive
        if ($zip->extractTo($extractPath)) {
            $zip->close();
            echo "Zip archive extracted successfully to '$extractPath' directory.";
        } else {
            $zip->close();
            throw new Exception("Failed to extract zip archive.");
        }
    } else {
        throw new Exception("Failed to open zip archive.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
