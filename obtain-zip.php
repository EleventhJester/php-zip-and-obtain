<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

// Define file paths for the text and PDF zip archives
$textZipFileName = './zip-or-obtain/text-archive.zip';
$pdfZipFileName = './zip-or-obtain/pdf-archive.zip';

// Define the directory where the contents will be extracted
$extractPath = './zip-or-obtain';

// /**
//  * Extracts the contents of a given zip archive.
//  *
//  * @param string $zipFileName The path to the zip archive
//  * @param string $extractPath The directory where contents will be extracted
//  * @param string $message The success message to display
//  * @return void
//  */
function extractZipArchive($zipFileName, $extractPath, $message) {
    $zip = new ZipArchive();
    if ($zip->open($zipFileName) === true) {
        // Extract the contents of the zip archive
        if ($zip->extractTo($extractPath)) {
            $zip->close();
            echo "$message extracted successfully to '$extractPath' directory. " . PHP_EOL;
        } else {
            $zip->close();
            throw new Exception("Failed to extract zip archive.");
        }
    } else {
        throw new Exception("Failed to open zip archive.");
    }
}

try {
    // Extract the text zip archive
    extractZipArchive($textZipFileName, $extractPath, "Text Zip archive");

    // Extract the PDF zip archive
    extractZipArchive($pdfZipFileName, $extractPath, "PDF Zip archive");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
