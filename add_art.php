<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .upload-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .upload-container h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }
        .upload-container label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        .upload-container input[type="text"],
        .upload-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .upload-container input[type="text"]:focus,
        .upload-container textarea:focus {
            border-color: #6e8efb;
        }
        .upload-container input[type="file"] {
            display: none;
        }
        .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            background-color: #6e8efb;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .custom-file-upload:hover {
            background-color: #5a75d6;
        }
        .file-chosen {
            margin-top: 10px;
            color: #555;
            font-size: 14px;
        }
        .upload-container button {
            background-color: #6e8efb;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .upload-container button:hover {
            background-color: #5a75d6;
        }
        .home-link {
            display: block;
            margin-top: 20px;
            color: #6e8efb;
            text-decoration: none;
            transition: color 0.3s;
        }
        .home-link:hover {
            color: #5a75d6;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload Image</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="title">Art Title:</label>
            <input type="text" name="title" id="title" required>
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="4" required></textarea>
            <label for="image" class="custom-file-upload">
                Select an Image
            </label>
            <input type="file" name="image" id="image" accept="image/*" required>
            <span class="file-chosen">No file chosen</span>
            <button type="submit" name="submit">Upload</button>
        </form>
        <a href="../index.php" class="home-link">Go to Home</a>
    </div>
    <script>
        const fileInput = document.getElementById('image');
        const fileChosen = document.querySelector('.file-chosen');
        const customFileUpload = document.querySelector('.custom-file-upload');

        customFileUpload.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileChosen.textContent = fileInput.files[0].name;
            } else {
                fileChosen.textContent = 'No file chosen';
            }
        });
    </script>
</body>
</html>