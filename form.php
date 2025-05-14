<?php
$uploadDirectory = "uploads/";
$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
$maxFileSize = 2 * 1024 * 1024; // 2MB
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = basename($_FILES['file']['name']);
        $fileSize = $_FILES['file']['size'];

        // Sanitize filename
        $fileName = preg_replace("/[^a-zA-Z0-9\._-]/", "_", $fileName);

        // Get MIME type securely
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($finfo, $fileTmpPath);
        finfo_close($finfo);

        if (in_array($fileType, $allowedTypes)) {
            if ($fileSize <= $maxFileSize) {
                if (!is_dir($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }

                // Avoid filename conflicts
                $newFileName = time() . "_" . $fileName;
                $destPath = $uploadDirectory . $newFileName;

                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $message = "✅ File uploaded successfully!";
                } else {
                    $message = "❌ Error moving the uploaded file.";
                }
            } else {
                $message = "❌ File is too large. Max size: 2MB.";
            }
        } else {
            $message = "❌ Invalid file type. Only JPG, PNG, and PDF are allowed.";
        }
    } else {
        $message = "❌ No file uploaded or file upload error.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload a File (.jpg, .png, .pdf)</h2>

    <?php if (!empty($message)) echo "<p><strong>$message</strong></p>"; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose file:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <input type="submit" value="Upload File">
    </form>
</body>
</html>