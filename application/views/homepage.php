<div class = "row">
    <div class="panel1 panel-primary col-md-6">
        <!-- Default panel contents -->
        <div class="panel-heading">Stocks</div>
        <div class="panel-body">
            <!--table-->
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Current Value</th>
                    </tr>
                </thead>
                <tbody>
                    {stock_array}
                    <tr>
                        <td><a href="/index.php/stockhistory/stock/{Code}">{Code}</a></td>
                        <td>{Value}</td>
                    </tr>
                    {/stock_array}
                </tbody>
            </table>
            <!--end of table-->
        </div>
    </div>
    <div class="panel2 panel-primary col-md-6">
        <!-- Default panel contents -->
        <div class="panel-heading">Players</div>
        <div class="panel-body">
            <!--table-->
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>                        
                        <th>Cash</th>
                        <th>Equity</th>
                    </tr>
                </thead>
                <tbody>
                    {equity_array}
                    <tr>
                        <td><a href="/index.php/playerprofile/player/{Player}">{Player}</a></td>
                        <td>{Cash}</td>
                        <td>{Equity}</td>
                    </tr>
                    {/equity_array}
                </tbody>
            </table>
            <!--end of table-->
        </div>
    </div>
    <div>
        {recent_moves_array}
        <p>{Seq}, {Datetime},{Code}, {Action}, {Amount}</p>
        {/recent_moves_array}
    </div>
    
    <div>
        {recent_transactions}
        <p>{}</p>
        {/recent_transactions}
    </div>
    {role}
    
</div> 