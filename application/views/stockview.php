<div class="panel2 panel-primary col-md-12">
    <!-- Default panel contents -->
    <div class="panel-heading">Purchases</div>
    <div class="panel-body">
        <!--table-->
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th> 
                    <th>Category</th> 
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                {stock_array}    
                <tr>             
                    <td><a href="/stockhistory/stock/{Code}">{Code}</a></td>
                    <td><a href="/stockhistory/stock/{Code}">{Name}</a></td>
                    <td>{Category}</a></td>
                    <td>{Value}</a></td>
                </tr>
                {/stock_array}  
            </tbody>
        </table>
        <!--end of table-->
    </div>
</div>
