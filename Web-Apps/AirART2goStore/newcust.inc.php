<!-- USE HTTPS HERE-->
<div class="container">
<form class="contact" action="addcust.php" method="post">
    <h3 class="title">Welcome, New Customer!</h3>
    <h4>Please fill out this form so we can send you your products</h4>
    <fieldset>
   <input type="text" size="40" name="firstname" placeholder="Type your First Name Here" required>
    </fieldset>
    <fieldset>
   <input type="text" size="40" name="lastname" placeholder="Type your Last Name Here" required>
    </fieldset>
    <fieldset>
   <input type="text" size="60" name="address" placeholder="Type your Street Address Here" required>
    </fieldset>
    <fieldset>
    <input type="text" size="30" name="city" placeholder="Type your City" required>
    </fieldset>
    <fieldset>
    <input type="text" size="2" name="state" placeholder=" Type your State Here" required>
    </fieldset>
    <fieldset>
    <input type="text" size="5" name="zip" placeholder="Type your Zip Here" required>
    </fieldset>
    <fieldset>
    <input type="tel" size="15" name="phone" placeholder="Type your Phone# Here" required>
    </fieldset>
    <fieldset>
   <input type="email" size="60" name="email" placeholder="Type Email Address Here" required>
    </fieldset>
    <fieldset>
    <input type="password" size="15" name="password1" placeholder="Type your password here" required>
    </fieldset>
    <fieldset>
    <input type="password" size="15" name="password2" placeholder="Confirm Your Password" required>
    </fieldset>
    <fieldset>
    <button type="submit" name="button">SUBMIT</button>
    </fieldset>
</form>
</div>