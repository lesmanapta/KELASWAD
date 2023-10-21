<?php
namespace Controllers;

include_once "dao/post.php";
use DAO\PostDAO;

class Post {
    private $postDAO;

    public function __construct($conn = null) {
        $this->postDAO = new PostDAO($conn);
    }

    public function index() {
        $posts = $this->postDAO->getAll();
        include_once 'views/post.php';
    }

    public function doPost() {
        $user_id = $_POST['user_id'];
        $content = $_POST['content'];
        
        // Handle file upload
        $file_name = '';
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];

            // Define the upload directory
            $upload_dir = 'upload/' . $file_name;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($file_tmp, $upload_dir)) {
                // File uploaded successfully
            } else {
                // File upload failed
            }
        }

        // Insert data into the database
        $this->postDAO->insert($user_id, $content, $file_name);

        // Redirect to the 'post' page
        header('location:/post');
    }
}
?>
