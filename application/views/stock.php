<h1> {type} </h1>
<hr size=4>

<div>
    <form class="form-inline" role="form" method="post" action="/stockhistory/stock_">
        <div class="form-group">
            <label for="email">&nbsp;&nbsp; Stock:</label> &nbsp;&nbsp;
            <select name="Name" class="form-control" id="sel1">
                {stock_array}
                <option value="{Code}">{Name}</option>
                {/stock_array}
            </select>
        </div> &nbsp;&nbsp;
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
</div>
<br/>

<div class="panel2 panel-primary col-md-6">
    <!-- Default panel contents -->
    <div class="panel-heading">Recent Movements</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Datetime</th>
                    <th>Code</th>
                    <th>Action</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                {movements_array}
                <tr>
                    <td>{Datetime} </td>
                    <td>{Code} </td>
                    <td>{Action} </td>
                    <td>{Amount} </td>
                </tr>
                {/movements_array}  
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>

<div class="panel2 panel-primary col-md-6">
    <!-- Default panel contents -->
    <div class="panel-heading">Transactions</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                {recent_array}
                <tr>
                    <td>{Trans} </td>
                    <td>{Quantity} </td>
                </tr>
                {/recent_array}  
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>