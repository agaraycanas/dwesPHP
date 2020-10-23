<?php
session_start();

if (isset($_GET['nMax']) && !isset($_SESSION['nMax'])) {
    $_SESSION['nMax'] = $_GET['nMax'];
    $_SESSION['n'] = 1;
    $_SESSION['numeros'] = [];
}

if (isset($_POST['num'])) {
    $_SESSION['n'] ++;
    $_SESSION['numeros'][] = $_POST['num']; // array_push
}

if ($_SESSION['n'] > $_SESSION['nMax']) {
    header('Location:tres.php');
} else {
    echo <<<FORM
                <h4>Introduce el sumando número {$_SESSION['n']} (1..10)</h4>
                <form method="post">
                    <input type="number" min="1" max="10" value="5" name="num"/>
                    <input type="submit"/>
                </form>
 FORM;
}
?>