<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="/styles/registrationData.css">
</head>
<body>
    <?php

    if (isset($_POST['submit'])) {
        if (empty($_POST['user-name'])||empty($_POST['user-last-name'])||empty($_POST['user-email'])||empty($_POST['user-sex'])||empty($_POST['user-password'])) {
            {
                echo 
                '<header>
                    <h1>Rejestracja</h1>
                    <p>Wystąpił błąd podczas rejestracji</p>
                </header>
                <main>
                    <ul>
                        <li>Musisz wypełnić wszystkie pola formularza.</li>
                        <li>
                            <a href="index.html">Powrót do formularza</a>
                        </li>
                    </ul>
                </main>';
            }
        }
        else{
            
            $firstName = trim($_POST["user-name"]); 
            $lastName = trim($_POST['user-last-name']); 
            $sex = trim($_POST['user-sex']);
            $eMail = trim($_POST['user-email']); 

            echo 
            "<header>
                <h1>Rejestracja</h1>
                <p>Zarejestrowano pomyślnie</p>
            </header>
            <main>
                <ul>
                    <li>
                        Imię<br> $firstName
                    </li>
                    <li>
                        Nazwisko<br> $lastName
                    </li>
                    <li>
                        Płeć<br> $sex
                    </li>
                    <li>
                        E-mail<br> $eMail
                    </li>";
            
            $namesOfExistingFiles = array(0);
            if (is_uploaded_file($_FILES['UPLOADED_FILE']['tmp_name'])) {
                $allowedExtensions = array('jpg', 'png', 'bmp');
                $path = "../uploads/";
                $extension = pathinfo($_FILES['UPLOADED_FILE']['name'], PATHINFO_EXTENSION);
        
                if (!in_array($extension, $allowedExtensions)) {
                    echo 
                    '<li>
                        Wprowadziłeś plik z niepoprawnym rozszerzeniem
                    </li>
                    <li>
                    <a href="aboutMe.html">Przejdź do strony o mnie</a>
                    </li>
                        <span>lub</span>
                    <li>
                        <a href="index.html">Powrót do formularza</a>
                    </li>';
                } else {
                    switch ($_FILES['UPLOADED_FILE']['error']) {
                        case 0:

                            $newFileName = max($namesOfExistingFiles)+1;
                            $_FILES['UPLOADED_FILE']['name'] = $newFileName.".$extension";
                            move_uploaded_file($_FILES['UPLOADED_FILE']['tmp_name'],__DIR__.$path.$_FILES['UPLOADED_FILE']['name']);

                            echo 
                                '<li>
                                    Zdjęcie profilowe<br>';
                            echo 
                                '<div style="
                                background-image: url(uploads/'.$newFileName.'.'.$extension.');
                                width: 200px;
                                height: 200px;
                                background-position: center; background-size: cover;
                                margin-top: 10px;
                                margin-bottom: 10px;"></div>';
                            
                            $fileSizeInMegabytes = round($_FILES['UPLOADED_FILE']['size'] / 1048576,2);
                            echo 'Nazwa pliku: '.$_FILES['UPLOADED_FILE']['name'].'<br>';
                            echo 'Typ pliku: '.$_FILES['UPLOADED_FILE']['type'].'<br>';
                            echo 'Rozmiar pliku: '.$fileSizeInMegabytes.' MB</li>';

                            echo 
                            '<li>
                                <a href="aboutMe.html">Przejdź do strony o mnie</a>
                            </li>';
                            
                            break;
                        
                        case 2:
                            echo 
                                '<li>
                                    Rozmiar pliku jest zbyt duży
                                </li>
                                <li>
                                    <a href="aboutMe.html">Przejdź do strony o mnie</a>
                                </li>
                                <span>lub</span>
                                <li>
                                    <a href="index.html">Powrót do formularza</a>
                                </li>';
                            break;
        
                        case 4:
                            echo
                                '<li>
                                    Plik nie został wysłany
                                </li>
                                <li>
                                <a href="aboutMe.html">Przejdź do strony o mnie</a>
                                </li>
                                    <span>lub</span>
                                <li>
                                    <a href="index.html">Powrót do formularza</a>
                                </li>'; 
                            break;
                        
                        default:
                            echo 
                                '<li>
                                    Wystąpił błąd podczas wysyłania pliku na serwer
                                </li>
                                <li>
                                    <a href="aboutMe.html">Przejdź do strony o mnie</a>
                                </li>
                                    <span>lub</span>
                                <li>
                                    <a href="index.html">Powrót do formularza</a>
                                </li>';
                            break;
                    }
                }
            }
        }
    } else {
        header("Location: ../../index.html");
    }
    ?>
</body>
</html>