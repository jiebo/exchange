    <!-- Expense Guide -->
    <aside class="call-to-action bg-primary" style="position: relative;" id="expense">
        <div class="loading-div" id="ajax-loading"><div class="align-center"><i class="fa fa-refresh fa-spin fa-5x"></i></div></div>
        <div class="container ">
                <div class="btn-group pull-right row" role="group">
                    <button class="btn btn-default active">City</button>
                    <button class="btn btn-default">Exchange</button>
                </div>
            <div class="col-lg-8 text-center centered">
                <h2>Expenses</h2>
                <hr class="small">
                <div class="row" id="ajax-expense-display">
                    <h3>City</h3>
                    <form class="form-horizontal col-lg-6" style="font-size: 18px;">     
                        <div>
                            <div class="form-group">        <!-- Form group for AVG MEAL    -->
                                <label class="col-sm-6 control-label">Average Meal</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">15.23 SGD</p>
                                </div>
                            </div>        
                            <div class="form-group">        <!-- Form group for TRANSPORT   -->
                                <label class="col-sm-6 control-label">Public Transportation</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">6.24 SGD</p>
                                </div>
                            </div>                     
                            <div class="form-group">        <!-- Form group for ACCOMMODATION -->
                                <label class="col-sm-6 control-label">Accommodation</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">50.34 SGD</p>
                                </div>
                            </div>                       
                            <div class="form-group">        <!-- Form group for CURRENCY    -->
                                <label class="col-sm-6 control-label">Est. Local Currency required</label>
                                <div class="col-sm-6">
                                    <p class="form-control-static">70 SGD</p>
                                </div>
                            </div>  
                        </div>
                        <div id="ajax-expense-default"></div>
                    </form>  
                </div>
                <div class="row">
                <form class="form-horizontal col-lg-10" autocomplete="off" >
                    <div class="btn-group pull-right">     <!-- Button dropdown for Select City -->
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">City Selector &nbsp; <span class="caret"></span>                        </button>
                        <ul class="dropdown-menu">
                        <?php
                            include 'sql.php';

                            $city_array = get_expense_city_list();
                            
                            foreach ( $city_array as $city ) {
                        
                        ?>
                            <li><a href="javascript:void(0);" onclick="ajaxLoadCityExpense('<?php echo $city; ?>');"><?php echo $city; ?></a></li>
                            
                        <?php
                            }
                        ?>
                        </ul>
                    </div>
                </form>  
                </div>
                <div class="row">
                    <h3>Exchange</h3>
                    <div id="container" style="width: 100%; height: 400px;"></div>
                </div>  
                                          
            </div>
        </div>
    </aside>