<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'library');

	// initialize variables
    $b_id = 0;
	$title = "";
	$author = "";
    $pub_year = "";
    $cat_id = "";
    $copies_owned = "";
    $copies_avlbl = "";
    $date_added = "";
    $photo = "";

	$update = false;

    //insert
	if (isset($_POST['save']) && isset($_FILES['photo'])){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $pub_year = $_POST['pub_year'];
        $cat_id = $_POST['cat_id'];
        $copies_owned = $_POST['copies_owned'];
        $copies_avlbl = $_POST['copies_avlbl'];
        $date_added = $_POST['date_added'];

        
        //insert photo
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileSize = $_FILES['photo']['size'];
        $fileError = $_FILES['photo']['error'];
        $fileType = $_FILES['photo']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'jfif');

        if (in_array($fileActualExt, $allowed)){
            if( $fileError === 0){
                if( $fileSize < 100000000){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    //palitan ang path based sa yong pc tagalaog na yan, 
                    //maliban dito kailangan mo rin palitan ang path sa view_book.php
                    //ang variable name ay $str
                    $fileDestination = 'C:/xampp/htdocs/armi/users/librarian/books/uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }
                else{
                    echo "File is too big";
                }
            }
            else{
                echo "Error uploading the file";
            }
        }
        else{
            echo "File type not accepted";
        }



		mysqli_query($db, "INSERT INTO books (title, author, pub_year, cat_id, 
        copies_owned, copies_avlbl, date_added, photo) 
        VALUES ('$title', '$author', '$pub_year', '$cat_id', '$copies_owned', 
        '$copies_avlbl', '$date_added', '$fileNameNew')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: view_book.php');
	}



    //update
	if (isset($_POST['update'])){
		$b_id = $_POST['b_id'];
		$title = $_POST['title'];
        $author = $_POST['author'];
        $pub_year = $_POST['pub_year'];
        $cat_id = $_POST['cat_id'];
        $copies_owned = $_POST['copies_owned'];
        $copies_avlbl = $_POST['copies_avlbl'];
        $date_added = $_POST['date_added'];

        

		mysqli_query($db, "UPDATE books SET title='$title', author='$author'
        , pub_year='$pub_year', cat_id='$cat_id', copies_owned='$copies_owned'
        , copies_avlbl='$copies_avlbl', date_added='$date_added'  WHERE b_id=$b_id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: view_book.php');
	}



    //delete

	if (isset($_GET['del'])) {
		$b_id = $_GET['del'];
		mysqli_query($db, "DELETE FROM books WHERE b_id=$b_id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: view_book.php');
	}

   
?>