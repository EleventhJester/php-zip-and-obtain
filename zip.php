<?php


function addToZipArchive(ZipArchive $zip, string $sourceFile, string $archivePath, string $successMsg, string $errorMsg)
{
    if ($zip->addFile($sourceFile, $archivePath)) {
        echo $successMsg . PHP_EOL;
    } else {
        throw new Exception($errorMsg);
    }
}


function createZipArchive(string $zipFileName): ZipArchive
{
    $zip = new ZipArchive();
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        return $zip;
    } else {
        throw new Exception("Failed to create zip archive: $zipFileName");
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_implicit_flush(true);

$textZipFileName = './zip-or-obtain/text-archive.zip';
$pdfZipFileName = './zip-or-obtain/pdf-archive.zip';

$sourceFilePath1 = './files-to-zip/motivatie.txt';
$sourceFilePath2 = './files-to-zip/Curriculum-vitae.pdf';

try {
    $textZip = createZipArchive($textZipFileName);
    addToZipArchive($textZip, $sourceFilePath1, 'motivatie.txt', "Text file added to zip archive successfully.", "Failed to add text file to zip archive.");
    $textZip->close();

    $pdfZip = createZipArchive($pdfZipFileName);
    addToZipArchive($pdfZip, $sourceFilePath2, 'Curriculum-vitae.pdf', "PDF file added to zip archive successfully.", "Failed to add PDF file to zip archive.");
    $pdfZip->close();

    echo "Text zip archive created successfully." . PHP_EOL;
    echo "Text zip archive saved as: $textZipFileName" . PHP_EOL;
    echo "PDF zip archive created successfully." . PHP_EOL;
    echo "PDF zip archive saved as: $pdfZipFileName" . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
