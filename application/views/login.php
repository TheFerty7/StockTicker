<form name="login" method="post" action="/index.php/Login/submit">
    PlayerID: <input type="text" name="userid"></input><br/>
    Password: <input type="password" name="password"></input><br/>
    <input type="submit">Submit</input>
</form>

<hr/>
<p>Sign Up</p>
<form name ="signup" method="post" action ="/index.php/Login/signup" enctype="multipart/form-data">
    ID: <input type="text" name="userid"></input><br/>
    Password: <input type="password" name="password"></input><br/>
    Image: <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit">Submit</input>
</form>

