<?php

?>

<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
    <!-- import image from database -->
    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
    <div class="card-body">
        <h3>Test Title <!-- import card title from database --></h3>
        <p class="card-text">Test Description <!-- import card description from database --></p>
        <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group"><button type="button" class="btn btn-sm btn-outline-secondary">Buy Ticket</button></div>
        <span class="text-muted">$ ??? <!-- import card price from database --></span>
        </div>
    </div>
    </div>
</div>

<!--
page displays cards of competition events with a buy ticket button
    if user is logged in it shows that
    if a user is not logged in it shows that but also a "sign in/sign up" link on the bottom
-->

<!--
tickets are per competition event
tickets are available to public at full price
athletes and employees request for free
if competition event time changes, corresponding tickets are udpated
medal awards ceremonies are free to go to 
-->