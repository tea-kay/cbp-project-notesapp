<?php
if (empty($_POST)) {
    echo 'not a POST';
    exit();
} 

$errors = array();

if (empty($_POST['title'])) {
    $errors[] = 'missing title';
}

if (!filter_var($_POST['time'])) {
    $errors[] = 'not a valid time';
}

if (empty($_POST['notes'])) {
    $errors[] = 'you did not add any notes';
}

// if (!ctype_digit($_POST['amount'])) {
//     $errors[] = 'not a number';
// }

if (empty($errors)) {
    $foo = $_POST['title'];
    // echo htmlspecialchars($foo);
    header('Location: notes_form.php?status=ok');
    exit();
} else {
    foreach ($errors as $error) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    }
}

?>