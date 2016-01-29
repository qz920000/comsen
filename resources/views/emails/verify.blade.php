<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            Thanks for creating an account with us.
            Please follow the link below to verify your email address. <br/>
            <a href={{ URL::to('register/verify/' . $activation_code) }}>{{ URL::to('register/verify/' . $activation_code) }}</a>.<br/>
            

        </div>

    </body>
</html>