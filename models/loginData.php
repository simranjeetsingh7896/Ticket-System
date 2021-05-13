<?php

//Create Document
$doc = new DOMDocument();

//XML file
$doc->load("xml/users.xml");

//variables
$xmlUsername = "";
$xmlPassword = "";
$usertype = "";
$userId = "";
$users = $doc->getElementsByTagName("user");
$email = $doc->getElementsByTagName("email");
$username = $doc->getElementsByTagName("username");
$password = $doc->getElementsByTagName("password");
$firstname = "";
$error = "";


//login click button
if (isset($_POST["submitLogin"])){

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    //Loops data
    foreach ($users as $user){
        $xmlUsername = $user->getElementsByTagName("username")->item(0)->nodeValue;
        $xmlPassword = $user->getElementsByTagName("password")->item(0)->nodeValue;
        $userId = $user->getElementsByTagName("userId")->item(0)->nodeValue;
        $usertype = $user->attributes->getNamedItem("usertype")->nodeValue;
        $firstname = $user->getElementsByTagName("first")->item(0)->nodeValue;

        //If login valid
        if (($username == $xmlUsername) && ($password == $xmlPassword)){
            //session data
            session_start();
            $_SESSION['status']="Logged In";
            $_SESSION['userId'] = $userId;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['usertype'] = $userType;

            if (($usertype == "admin")){
                exit(header("Location: ./Admin.php"));
            }
            else if (($usertype == "client")){
                exit(header("Location: ./clientTicket.php"));
            }
            break;
        }
        else{
            $error = "Invalid username and/or password";
        }
    }
}

$hide = "";
$signUpMsg = "";
$error2 = "";

 //Checks if Sign Up button is clicked
 if (isset($_POST["submitSignUp"])){
    //Saves POST data as variables
    $title = $_POST['title'];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $contact = $_POST["Contact"];
   

    //Checks for empty fields, returns error is missing data
    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($contact)){
        $error2 = "<h5 style='color:red'>Please input all information.";
    }

    else{
        //Create DomDocument
        $doc = new DOMDocument();

        //Loads XML file
        $doc->load("xml/users.xml");

        //Creates elements and their corresponding attribute (if applicable) for new ticket
        $newUser = $doc->createElement("user");
        $newUser->setAttribute("usertype", "client");//Make into random number 
        
        $newId = $doc->createElement("userId", rand(10000, 90000));//Make into random number 
        

        $newUsername = $doc->createElement("username", $username);
        $newPassword = $doc->createElement("password", $password);


        $newName = $doc->createElement("name");
        $newName->setAttribute("title", $title);
        $newFirst = $doc->createElement("first", $firstname);
        $newLast = $doc->createElement("last", $lastname);


        $newcontact= $doc->createElement("contactnumber", $contact);
        $newEmail = $doc->createElement("email", $email);


        //Append child elements to parent elements
        $newUser->appendChild($newId);
        $newUser->appendChild($newUsername);
        $newUser->appendChild($newPassword);
        $newName->appendChild($newFirst);
        $newName->appendChild($newLast);
        $newUser->appendChild($newName);

        $newUser->appendChild($newcontact);
        $newUser->appendChild($newEmail);
       
      
        
      
       
    
        $doc->documentElement->appendChild($newUser);

        //Saves updates to xml file
        $doc->save("xml/users.xml");

        //Displays respective messages
        $hide = "style='display: none;'";
        $signUpMsg = "<h2 style='text-align: center'>Thanks for registering with us!
        </br> <a href='index.php'> Click here to login </a>";
    }
}
?>

