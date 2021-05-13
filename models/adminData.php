<?php
//Create Document 
$ticketDoc = new DOMDocument();
$userDoc = new DOMDocument();

//XML file
$ticketDoc->load("xml/supportTickets.xml");
$userDoc->load("xml/users.xml");

$tickets = $ticketDoc->getElementsByTagName("ticket");

//variables
$ticketId = "";
$rows = "";

//Loop to display
foreach ($tickets as $ticket){
    $rows .= '<tr>';
    $ticketId = $ticket->attributes->getNamedItem("id")->nodeValue;
    $rows .= '<td>' . $ticketId  . '</td>'; 
    $rows .= '<td>' . $ticket->getElementsByTagName("subject")->item(0)->nodeValue . '</td>';
    $date = new DateTime($ticket->getElementsByTagName("dateofissue")->item(0)->nodeValue);
    $rows .= '<td>' . date_format($date, 'Y-m-d,  H:i:s') . '</td>';
    $rows .= '<td>' . $ticket->getElementsByTagName("status")->item(0)->nodeValue . '</td>';
    $rows .= '<td>' . $ticket->attributes->getNamedItem("userId")->nodeValue . '</td>';
    $rows .=    '<td>
                    <form action="./TicketDetail.php" method="POST">
                        <input type="hidden" name="id" value="' . $ticketId . '"/>
                        <input type="submit" class="Btn" name="TicketDetail" value="View Ticket"/>
                    </form>
                </td>';
    $rows .= '</tr>';
}