<?php
/*
 * A view of the about tab, with a description of what the program does,
 * design issues and bugs.
 * 
 */

?>
<h1>Northwind About Browser</h1>

<h2>What this website does:</h2>

<p><b>To login:</b><br>
<b>Username: </b>user<br>
<b>Password: </b> northwind</p>

<p><b>Product Tab:</b><br> The product tab takes the user to the Northwind 
    Product Browser. Displayed are two boxes: one for the category of a 
    product and one for the product available under the selected category. 
    There is also a 'Product Details' table, which displays information 
    about the product of interest.</p>

<p><b>Order Tab:</b><br> The order tab takes the user to the Northwind Order 
    Browser. Displayed is a combo box that have order numbers that can 
    be selected, and 2 display tables: one for the Order, and one for 
    the Order Details. When an order number is selected and the "Go" 
    button is pushed, information regarding that rder number will fill in the 
    corresponding information on the display tables, such as who ordered it, 
    who will ship it, etc</p>

<p><b>About Tab:</b><br> The about tab contains all of the information of the 
    website, including what it does, the log-in credentials, design issues with 
    the website, and existing bugs.</p>

<p><b>Login Tab</b><br> The login tab takes the user to the login page, where 
    the user will be prompted to enter a username and password. If the given 
    information is incorrect/is not a valid user, it will notify the user that
    the credentials were not valid. If the information is correct, it will 
    start a session, and will discontinue when the user navigates back to this
    tab and logs out.</p>

<h2>Design Issues:</h2>
<p> - I chose a simple blue banner and a simple navigation menu bar for the
    basic layout because I found that the amount of time I spent implementing
    the models/controllers/views etc took much longer than expected. I found 
    that with my other course work, I did not have a lot of time to explore 
    into CSS. I tried to use bootstrap, but it distorted a lot of the webpage. 
    After some time I still couldn't get it to look aesthetic so I decided to 
    keep it simple. <br>
    - I chose blue because it is my favourite colour<br>
    - I had the browser default to the "About" page so the user credentials for
    the log in can be made readily available for whoever wants to look at my 
    site</p>
    

<h2>Bugs:</h2>
<p><b>General: </b><br>
    -From the "About" welcome page, when you click on any other tab, the 
    main banner will re-allign slightly. I could not figure out how to fix this
</p>
<p><b>Order Browser: </b><br>
    - In the Order Browser tab, it does not display the total cost anywhere.
    I could not get my queries to work properly<br>
    - In the Order Browser tab, it displays the Product ID in the Order Details
    table, but not the product name. Again, this was due
    to issues with my queries, and making items from the productMap work in the
    orderBrowser<br>
    - When the Order Browser tab is selected, the main banner "Northwind Product
    Browser" will re-allign. I could not find a way to fix this </p>




