<?php
if (!defined('APPPATH'))
	exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{title}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type ="text/css" href="../assets/css/style.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous"></link>
    </head>
    <body>
        <div class="container">   
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" 
                            data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                        </button>
                        <a class="navbar-brand">Stock Ticker</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/welcome">
                            <span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="/stockhistory">
                            <span class="glyphicon glyphicon-blackboard"></span> History</a></li>
                        <li><a href="/playerprofile">
                            <span class="glyphicon glyphicon-user"></span> Portfolio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/login"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
                    </ul>
                </div>
            </nav>
            <div id="content">
                <!--<div class="jumbotron">
                    <h1>{title}</h1>
                </div> -->             
                {content}
            </div>           
        </div>
        
    </body>
</html>
