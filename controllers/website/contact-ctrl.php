<?php 

require __DIR__ . '/../../models/User.php';
require __DIR__ . '/../../models/Category.php';
require __DIR__ . '/../../config/init.php';
require __DIR__ . '/../../models/Contact.php';

try {
    $errors = [];
    $title = "Contact • Guide Ultime de Super Mario";
    $css = 'contact.css';
    $categories = Category::getall();
    $script = "";
    $description = "Envie d'en savoir plus ou de poser une question à un administrateur ? Vous pouvez envoyer un message grâce au formulaire de contact.";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        if(empty($user)){
            $errors['user'] = "Veuillez entrez votre pseudo";
        } else{
            $isOk = filter_var($user, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => REGEX_USER)));
            if(!$isOk){
                $errors['user'] = "Ce pseudo n'est pas valide";
            }
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if(empty($email)){
            $errors ['email'] = "Veuillez entrez une adresse mail";
        } else{
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if(!$isOk){
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

        if(empty($errors)){
            $newContact = new Contact();
            $newContact->set_user($user);
            if(!Contact::ifExistsByUser($user)){
                $errors['user'] = "Veuillez entrer un pseudo déjà enregistré";
            }
            $newContact->set_email($email);
            if(!Contact::ifExistsByEmail($email)){
                $errors['email'] = "Veuillez entrer un email déjà enregistré";
            }
            if(!Contact::ifExistsByEmail($email) && !Contact::ifExistsByUser($user)){
                $errors['contact'] = "L'email et le pseudo ne sont pas enregistrées.";
            }
            $newContact->set_object($object);
            $newContact->set_content($content);
            $saved = $newContact->add(); 

            if($saved){
                header('location: /controller/website/confirm_contact-ctrl.php');
                die;
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
