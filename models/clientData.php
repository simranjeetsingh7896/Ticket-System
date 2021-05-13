<?php
//Create DomDocument
$doc = new DOMDocument();

//XML file
$doc->load("xml/supportTickets.xml");

// XML elements
$subject = $doc->getElementsByTagName("subject");
$postMessage = $doc->getElementsByTagName("postMessage");
$date = new DateTime("NOW", new DateTimeZone('Asia/Calcutta'));
$error = "";

//To Add new ticket
if (isset($_POST["submitTicket"])){

    $subject = $_POST["subject"];
    $postMessage = $_POST["postMessage"];

    if (empty($subject) || empty($postMessage)){
        $error = "Please input information.";
    }

    else{
    $error = "";

    //elements new ticket
    $newTicket = $doc->createElement("ticket");
    $newTicket->setAttribute("id", rand(100000, 200000));
    $newTicket->setAttribute("userId", $userId); 

    $issueDate = $doc->createElement("dateofissue", $date->format('Y-m-d\TH:i:s'));
    $status = $doc->createElement("status", "on-going");
    $subject = $doc->createElement("subject", $subject);
    $supportmessages = $doc->createElement("supportmessages");

    $message = $doc->createElement("message");
    $message->setAttribute("userId", $userId);

    $datetime = $doc->createElement("datetime", $date->format('Y-m-d\TH:i:s'));
    $text = $doc->createElement("text", $postMessage);
   
    //Append elements
    $message->appendChild($datetime);
    $message->appendChild($text);
    $supportmessages->appendChild($message);
    $newTicket->appendChild($issueDate);
    $newTicket->appendChild($status);
    $newTicket->appendChild($subject);
    $newTicket->appendChild($supportmessages);

    $doc->documentElement->appendChild($newTicket);

    //Save xml file
    $doc->save("xml/supportTickets.xml");

    }

}
//XPath 
$xpath = new DOMXPath($doc);
$userTickets = $xpath->query("//ticket[@userId='$userId']");
//rows
$rows = "";

//Loops tickets
foreach ($userTickets as $ticket){
    $rows .= '<tr>';
    $ticketId = $ticket->attributes->getNamedItem("id")->nodeValue;
    $rows .= '<td>' . $ticketId  . '</td>';   
    $rows .= '<td>' . $ticket->getElementsByTagName("subject")->item(0)->nodeValue . '</td>';
    $date = new DateTime($ticket->getElementsByTagName("dateofissue")->item(0)->nodeValue);
    $rows .= '<td>' . date_format($date, 'Y-m-d,  H:i:s') . '</td>';
    $rows .= '<td>' . $ticket->getElementsByTagName("status")->item(0)->nodeValue . '</td>';
    $rows .= '<td>' . $ticket->attributes->getNamedItem("userId")->nodeValue . '</td>';
    $rows .=    '<td>
                    <form action="./Ticketdetail.php" method="POST">
                        <input type="hidden" name="id" value="' . $ticketId . '"/>
                        <input type="submit" class="Btn" name="Ticketdetail" value="Show Ticket"/>
                    </form>
                </td>';
    $rows .= '</tr>';
}

if (empty($rows)){
    $rows = "<h3>No tickets found</h3>";
}

?>