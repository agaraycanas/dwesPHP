<?php
if (isset($_COOKIE['numeros']) && isset($_COOKIE['n']) && isset($_COOKIE['nMax'])) {

    if (isset($_POST['num'])) {
        setcookie('numeros', $_COOKIE['numeros'] . $_POST['num'] . '-');
    }
    
    if ($_COOKIE['n'] > $_COOKIE['nMax']) {
        header('Location:tres.php');
    } else {
        $n = $_COOKIE['n'];
        setcookie('n', $n + 1);
        echo <<<FORM
            <h4>Introduce el sumando número $n (1..10)</h4>
            <form method="post">
                <input type="number" min="1" max="10" value="5" name="num"/>
                <input type="submit"/>
            </form>
FORM;
    }
} else {
    if (isset($_GET['n'])) {
        setcookie('nMax', $_GET['n']);
        setcookie('n', 1);
        setcookie('numeros', '-');
        header('Location:dos.php');
    } else {
        echo "ERROR";
    }
}
?>