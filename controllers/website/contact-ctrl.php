<?php 

require __DIR__ . '/../../models/User.php';
require __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';

try {
    $title = "Contact • Guide Ultime de Super Mario";
    $css = 'contact.css';
    $categories = Category::getall();
    $script = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($username)){
            $errors['user'] = "Veuillez entrez votre pseudo";
        } else{
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_USERNAME)));
            if(!$isOk){
                $erros['user'] = "Ce pseudo n'est pas valide";
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if(empty($email)){
            $errors ['email'] = "Veuillez entrez une adresse mail";
        } else{
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($email == false ){
                $errors['email'] = "Cette adresse mail n'est pas valide";
            }
        }

        $object = filter_input(INPUT_POST, 'object', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($object)){
            $errors['object'] = "Veuillez entrez l'objet de votre message";
        } else{
            $isOk = filter_var($object, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_SUBJECT)));
            if(!$isOk){
                $errors['object'] = "Ce nom d'objet contient des caractéres spéciaux";
            }
        }

        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($content)){
            $errors['content'] = "Veuillez entrez la description de votre message";
        } else{
            if(strlen($content) < 50 || strlen($content) > 500){
                $errors['content'] = "Entrez votre message entre 50 et 500 caractéres";
            }
        }
    }
} catch (\Throwable $th) {
    $errors = $th->getMessage();

    include __DIR__ . '/../../views/templates/header.php';
    include __DIR__ . '/../../views/templates/error.php';
    include __DIR__ . '/../../views/templates/footer.php';
}

include __DIR__ . '/../../views/templates/header.php';
include __DIR__ . '/../../views/contact.php';
include __DIR__ . '/../../views/templates/footer.php';
