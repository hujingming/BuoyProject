<?php
	include 'db_connect.php';

	$user_id = "user1234";
	$title = $_POST['books_title'];
	$edition = $_POST['books_edition'];
	$course = $_POST['books_course'];
	$professor = $_POST['books_professor'];
	$price = $_POST['books_price'];
	$semester = $_POST['books_semester'];
	$condition = $_POST['books_condition'];
	$image_link = $_POST['books_photourl'];
	$description = $_POST['books_description'];
	$seller = $_POST['books_seller'];

	$patterns = array();
	$patterns[0] = '/\'/';
	$replacements = array();
	$replacements[0] = '';
	$validatedTitle= preg_replace($patterns, $replacements, $title);
	$validatedEdition = preg_replace($patterns, $replacements, $edition);
	$validatedCourse = preg_replace($patterns, $replacements, $course);
	$validatedProfessor = preg_replace($patterns, $replacements, $professor);
	$validatedSemester = preg_replace($patterns, $replacements, $semester);
	$validatedDescription = preg_replace($patterns, $replacements, $description);


	if(!$_POST['books_submit']) {
		echo "Submission unsuccessful.";
		// header('Location: buoyBooks.php');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyBooks.php \">";
	} else {
		mysql_query("INSERT INTO books (	`item_id`, `user_id`, `title`, `edition`, 
														`course`, `professor`, `semester_used`,`condition`,`price`,`image_link`,`description`,`seller`)
						VALUES(NULL,'$user_id','$validatedTitle','$validatedEdition','$validatedCourse','$validatedProfessor','$validatedSemester',
									'$condition','$price','$image_link','$validatedDescription','$seller')")
						or die(mysql_error());
		echo "Book has been listed.";
		// header('Location: CreateAccessories.html');
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=buoyBooks.php \">";
	}

?>