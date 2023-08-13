<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

// Define file paths for the text and PDF zip archives
$textZipFileName = './zip-or-obtain/text-archive.zip';
$pdfZipFileName = './zip-or-obtain/pdf-archive.zip';

// Define the directory where the contents will be extracted
$extractPath = './zip-or-obtain';

try {
    // Create a ZipArchive instance for the text zip file
    $textZip = new ZipArchive();
    if ($textZip->open($textZipFileName) === true) {
        // Extract the contents of the text zip archive
        if ($textZip->extractTo($extractPath)) {
            $textZip->close();
            echo "Text Zip archive extracted successfully to '$extractPath' directory.<br>";
        } else {
            $textZip->close();
            throw new Exception("Failed to extract text zip archive.");
        }
    } else {
        throw new Exception("Failed to open text zip archive.");
    }

    // Create a ZipArchive instance for the PDF zip file
    $pdfZip = new ZipArchive();
    if ($pdfZip->open($pdfZipFileName) === true) {
        // Extract the contents of the PDF zip archive
        if ($pdfZip->extractTo($extractPath)) {
            $pdfZip->close();
            echo "PDF Zip archive extracted successfully to '$extractPath' directory.<br>";
        } else {
            $pdfZip->close();
            throw new Exception("Failed to extract PDF zip archive.");
        }
    } else {
        throw new Exception("Failed to open PDF zip archive.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
