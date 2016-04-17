<form name="register" method="post" action="/index.php/gameplay/register">
    Password: <input type="password" name="pass"></input><br/>
    <input type="submit">Submit</input>
</form>

<hr/>

<h3>Buy</h3>
<form name="buy" method="post" action="/index.php/gameplay/buy">
    <select name="Name" class="form-control">
        {stock_array}
            <option value="{Code}">{Name}</option>
        {/stock_array}
    </select>
    Amount: <input type="text" name="amount">
    <input type="submit">Submit</input>
    
</form>

<hr/>

<h3>Sell</h3>
<form name="sell" method="post" action="/index.php/gameplay/sell">
    
</form>

