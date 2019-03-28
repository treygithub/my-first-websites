

<div class="container">
<form class="contact" action="verifycust.php" method="post">
    <h3 class="title">Check Out Procedure</h3>
    <h4>If you are a returning customer, please enter your e-mail address and password</h4> 
    <fieldset>
    <input type="email" name="email" placeholder="Email Adress goes here">
    </fieldset>
    <fieldset>
    <input type="password" name="password1" placeholder="Enter Password Here">
    </fieldset>
    <fieldset>
    <button type="submit" name="button" data-submit="...Sending">Submit</button>
    </fieldset>
</form>
</div>

<div class="container">
<form class="contact" action="index.php" method="get">
        <h3 class="title">New Customer Click Here</h3>
    <fieldset>
    <button type="submit" name="button">SUBMIT</button>
    </fieldset>
    <input type="hidden" name="content" value="newcust">
</div>
</form>