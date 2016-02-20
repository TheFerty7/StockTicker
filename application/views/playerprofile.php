<h1>{player}</h1>
<hr size=4>

<script>
    $(document).ready(function()
    {
        
    });
</script>

<div>
    <form id="bootstrapSelectForm" role="form" method="post" action="/playerprofile">
        <div class="form-group">
            <label for="sel1">Player:</label>
            <select name="player" class="form-control" id="sel1" title="Pick a Player">
                {player_array}
                <option value="{Player}" type="submit">{Player}</option>
                {/player_array}
            </select>
        </div>
    </form>
    <form action="/playerprofile" method="post"> Players 
        <select name="player">
            {player_array}
            <option value="{Player}">{Player}</option>
            {/player_array}
        </select>
        <input type="submit" value="Submit"/>
    </form>
</div>
<br/>
<div class="panel2 panel-primary col-md-4">
    <!-- Default panel contents -->
    <div class="panel-heading">Purchases</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Transaction</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                {player_transactions}
                <tr>                   
                    <td>{Stock}</td>
                    <td>{Trans}</td>
                    <td>{Quantity}</td>
                </tr>
                {/player_transactions}  
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>

<div class="panel1 panel-primary col-md-4">
    <!-- Default panel contents -->
    <div class="panel-heading">Sales</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Transaction</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                {player_sales}
                <tr>
                    <td>{Stock}</td>
                    <td>{Trans}</td>
                    <td>{Quantity}</td>
                </tr>
                {/player_sales}
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>

<div class="panel1 panel-primary col-md-4">
    <!-- Default panel contents -->
    <div class="panel-heading">Current Holdings</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Gold: {gold_qty}</td>
                </tr>    
                <tr>
                    <td>Silver: {silver_qty}</td>
                </tr>    
                <tr>
                    <td>Bonds: {bonds_qty}</td>
                </tr>    
                <tr>
                    <td>Oil: {oil_qty}</td>
                </tr>    
                <tr>
                    <td>Industrials: {industrials_qty}</td>
                </tr>    
                <tr>
                    <td>Grain: {grains_qty}</td>
                </tr>
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>