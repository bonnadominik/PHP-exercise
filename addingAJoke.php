<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/secondary.css">
    <title>Dodawanie żartu</title>
</head>
<body>
<?php
     
     function changeLetterCase($someString){
        return ucfirst(strtolower($someString));
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['UPLOADED_JOKE'])) {
            {
                echo 
                '<header>
                    <h1>O mnie</h1>
                    <p>Wystąpił błąd podczas wysyłania żartu</p>
                </header>
                <main>
                    <ul>
                        <li>Musisz dodać jakiś żart.</li>
                        <li>
                            <a href="aboutMe.php">Powrót do strony o mnie</a>
                        </li>
                    </ul>
                </main>';
            }
        }
        else{
            
            $uploadedJoke = trim($_POST["UPLOADED_JOKE"]); 
            include_once "itJokes.php";
            $uploadedJoke = changeLetterCase($uploadedJoke);
            
            echo 
            "<header>
                <h1>O mnie</h1>
                <p>Dziękuję za dodanie żartu</p>
            </header>
            <main>
                <ul>
                    <li>
                        Dodany żart<br> $uploadedJoke
                    </li>
                    <li>";
            echo            
                        '<a href="index.html">Powrót do rejestracji</a>
                    </li>';
    }
} else {
        header("Location: ../../aboutMe.php");
}
?>
</body>
</html>