<div class="container">
    <form class="contact" action="index.php" method="post">
        <h3>Register at Recipe Center</h3>
        <h4>To share your recipes and comments with others</h4>

        <fieldset>
        <input placeholder="Create Your User / Login Name Here..." type="text" name="userid" required>
        </fieldset>

        <fieldset>
        <input type="password" placeholder="Type Password Here:" name="password" title="Type Password here" required>
        </fieldset>

        <br />

       <fieldset>
        <input type="password" placeholder="Type Password Here:" name="password2" title="Type Password here" required>
        </fieldset>

        <br />

        <fieldset>
        <input placeholder="Enter Your Full Name..." type="text" size="40" name="fullname" required>
        </fieldset>

        <br />

        <fieldset>
        <input placeholder="Type E-mail address Here..." type="email" size="50" name="email" required>
        </fieldset>

        <h4>Privacy Policy: we do not share e-mail addresses with others!</h4>

        <fieldset>
        <button type="submit" value="Submit">SUBMIT</button>
        </fieldset>

        <input type="hidden" name="content" value="adduser">


    </form>
</div>