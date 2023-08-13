<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

$zip = new ZipArchive();

$textZipFileName = './zip-or-obtain/text-archive.zip';
$pdfZipFileName = './zip-or-obtain/pdf-archive.zip';

$sourceFilePath1 = './files-to-zip/motivatie.txt'; // Path to the text file
$sourceFilePath2 = './files-to-zip/Curriculum-vitae.pdf';  // Path to the PDF file

try {
    if ($zip->open($textZipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        // Add the motivatie.txt file to the text zip archive
        $archiveFilePath1 = 'motivatie.txt'; // This is the path within the archive
        if ($zip->addFile($sourceFilePath1, $archiveFilePath1)) {
            echo "Text file added to zip archive successfully." . PHP_EOL;
        } else {
            throw new Exception("Failed to add text file to zip archive.");
        }
        $zip->close();
        echo "Text zip archive created successfully." . PHP_EOL;
        echo "Text zip archive saved as: $textZipFileName" . PHP_EOL;
    } else {
        throw new Exception("Failed to create text zip archive.");
    }

    if ($zip->open($pdfZipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        // Add the PDF file to the PDF zip archive
        $archiveFilePath2 = 'Curriculum-vitae.pdf'; // This is the path within the archive
        if ($zip->addFile($sourceFilePath2, $archiveFilePath2)) {
            echo "PDF file added to zip archive successfully." . PHP_EOL;
        } else {
            throw new Exception("Failed to add PDF file to zip archive.");
        }
        $zip->close();
        echo "PDF zip archive created successfully." . PHP_EOL;
        echo "PDF zip archive saved as: $pdfZipFileName" . PHP_EOL;
    } else {
        throw new Exception("Failed to create PDF zip archive.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
