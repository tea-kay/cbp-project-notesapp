<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="notes_form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Notes Form</title>
</head>
<body>
<div class="container"></div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
        <?php

            $pdo = new PDO('mysql:host=127.0.0.1;dbname=notes;charset=utf8', 'root', 'rootroot');
            // var_dump($pdo);

            if ($_POST) {
                $stmt = $pdo->prepare('INSERT INTO notes (title, note, email, created) VALUES (?,?,?, NOW())');
                $stmt->execute(array($_POST['title'], $_POST['notes'], $_POST['email']));
                header('Location: notes_form.php');
            }

            // if (isset($_GET['status']) && $_GET['status'] == 'ok') {
            // echo '<p>Notes Saved</p>';
            // };

        ?>
        NOTES:
        <br>
            <form action="" method="post">
                <label for='Name'>Title</label>
                <br>
                <input type="text" name="title" id='title' placeholder="title" tabindex="1">
                <br>
                <label for='email'>Email </label>
                <br>
                <input type="text" name="email" id='email' placeholder="email" tabindex="2">
                <br>
                <!--<label for='Time'>Time </label>-->
                <!--<br>
                <input type="datetime-local" name="time" placeholder="time" tabindex="3">-->
                <br>
                <label for='Notes'>Notes: </label>
                <br>
                <textarea name="notes" rows="5" cols="23"></textarea>
                <input type="hidden" name="token"value="8888">
                <br>
                <!--TO DO:
                <br>
                    <input type="checkbox" name="todo" value="make_to_do"> Creat A To Do<br>
                    <input type="checkbox" name="todo" value="make_form" checked="checked">Create A Form<br>
                <br>-->
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                
            </form>

        </div>
    </div>
</div>
</body>
</html>