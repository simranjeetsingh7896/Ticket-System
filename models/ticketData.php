<?php
//Create DomDocument
$doc = new DOMDocument();

//XML file
$doc->load("xml/supportTickets.xml");

//XPath 
$xpath = new DOMXPath($doc);
$userTickets = $xpath->query("//ticket[@userId='$userId']");
//rows
$rows = "";

//Loops messages
foreach ($userTickets as $ticket){
    $rows .= '<tr>';
    $ticketId = $ticket->attributes->getNamedItem("id")->nodeValue;
    $rows .= '<td>' . $ticketId  . '</td>';   
    $rows .= '<td>' . $ticket->getElementsByTagName("subject")->item(0)->nodeValue . '</td>';
    $rows .= '<td>' . $ticket->getElementsByTagName("datetime")->item(0)->nodeValue . '</td>';
    $rows .= '<td>' . $ticket->getElementsByTagName("text")->item(0)->nodeValue . '</td>';
    $rows .= '</tr>';
}

if (empty($rows)){
    $rows = "<h3>No messages found</h3>";
}

?>