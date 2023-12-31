﻿**`Zip and deZip Script`**

Welcome to the Zip and Obtain Script repository. This set of scripts empowers you to efficiently manage text and PDF files through zip archiving and extraction.
 This README will guide you through the process of utilizing these scripts for your own files.

Usage Instructions
Zip Files
Prepare Your Files: Begin by placing your desired text file(s) into the files-to-zip directory. Similarly, place your PDF file(s) in the same directory.

Edit zip.php:

Open the zip.php script in your preferred text editor or integrated development environment.

Locate the following line:
**`[$sourceFilePath1 = './files-to-zip/motivatie.txt'; // Path to the text file]`**
-------------------------------------------------------------------------------------------------------------------------------
Change the value of $sourceFilePath1 to match the actual path of your text file.'

Next, find this line:
**`$sourceFilePath2 = './files-to-zip/Curriculum-vitae.pdf';  // Path to the PDF file`**
Change the value of $sourceFilePath2 to match the actual path of your PDF file.
-------------------------------------------------------------------------------------------------------------------------------


Generate Zip Archives:

Run the zip.php script. It will create two separate zip archives: one for your text file and another for your PDF file.

Obtain Files:


Open the obtain-zip.php script in your text editor or integrated development environment.

Locate the following line:
**`$extractPath = './zip-or-obtain'; // Path to the extraction directory`**
Change the value of $extractPath to the desired directory where you want the extracted files to be placed.
-------------------------------------------------------------------------------------------------------------------------------

Extract Zip Archives:

Execute the **`obtain-zip.php script.`** This will extract the contents of the zip archives back to their original formats.


Note
Customization Tip: If you wish to use your own text or PDF files, simply follow the instructions above. You only need to edit the lines indicated with comments to specify the appropriate file paths.

We hope these scripts streamline your file management process. Should you have any questions or encounter any issues, please feel free to reach out.

Happy scripting!

