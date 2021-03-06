<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Others</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>file/style/style.css" />
  <link rel="shortcut icon" type="image/png" href="<?=base_url()?>file/style/favicon.png" />
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-1.8.0.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.form.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/dragdrop.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.lightbox_me.js"></script>
</head>

<div id="popupc" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exitc style="padding: 5px; background: black; color: white; position: fixed">x</div>
<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/limit/updatetitle" method=post>
<input type=hidden name="idlimit"/>
	<table id=tabinputformc class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>UPDATE TITLE</font></td>
		</tr>
		<tr>
		<td>Label</td><td> : </td><td><input type=text name="slabel"/></td>
		</tr>	
		<tr>
		<tr>
		<td colspan=2></td><td><input class="submit" type=submit value='SUBMIT' /></td>
		</tr>
	</table>	
</form>
</div>

<body>
<div id="loading-status">
   <table>
      <tr>
         <td><img src='<?=base_url()?>file/style/ajax-loader.gif' /></td>
         <td>Loading...</td>
      </tr>
   </table>
</div>
<style type="text/css">
 
        /*** central column on page ***/
        div#divContainer
        {
            max-width: 600px;
            margin: 0 auto;
            font-family: Calibri;
            padding: 0.5em 1em 1em 1em;
 
            /* rounded corners */
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
 
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#f3f3f3));
            background: -moz-linear-gradient(top, #f3f3f3, #f3f3f3);
 
            /* add box shadows */
            -moz-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            -webkit-box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
            box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
        }
 
        h1 {color:#FFE47A; font-size:1.5em;}
 
        /*** sample table to demonstrate CSS3 formatting ***/
        table.formatHTML5 {
            width: 100%;
            border-collapse:collapse;
            text-align:left;
            color: #606060;
        }
 
        /*** table's thead section, head row style ***/
        table.formatHTML5 thead tr td  {
            background-color: White;
            vertical-align:middle;
            padding: 0.6em;
            font-size:0.8em;
        }
 
        /*** table's thead section, coulmns header style ***/
        table.formatHTML5 thead tr th
        {
            padding: 0.5em;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's tbody section, odd rows style ***/
        table.formatHTML5 tbody tr:nth-child(odd) {
           background-color: #fafafa;
        }
 
        /*** table's tbody section, even rows style ***/
        table.formatHTML5 tbody tr:nth-child(even) {
            background-color: #efefef;
        }
 
       /*** table's tbody section, last row style ***/
        table.formatHTML5 tbody tr:last-child {
             border-bottom: solid 1px #404040;
        }
 
        /*** table's tbody section, separator row pseudo-class ***/
        table.formatHTML5 tbody tr.separator {
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#606060), to(#909090));
            background: -moz-linear-gradient(top, #606060, #909090);
            color: #dadada;
        }
 
        /*** table's td element, all section ***/
        table.formatHTML5 td {
           vertical-align:middle;
           padding: 0.5em;
        }
 
        /*** table's tfoot section ***/
        table.formatHTML5 tfoot{
            text-align:center;
            color:#0772a9;
            text-shadow: 0 1px 1px rgba(255,255,255,0.3);
        }
		
		#tnt_pagination {
	display:block;
	text-align:left;
	height:22px;
	line-height:21px;
	clear:both;
	padding-top:3px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	font-weight:normal;
}

#tnt_pagination a:link, #tnt_pagination a:visited{
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #EBEBEB;
	margin-left:10px;
	text-decoration:none;
	background-color:#F5F5F5;
	color:#0072bc;
	width:22px;
	font-weight:normal;
}

#tnt_pagination a:hover {
	background-color:#DDEEFF;
	border:1px solid #BBDDFF;
	color:#0072BC;	
}

#tnt_pagination .active_tnt_link {
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #BBDDFF;
	margin-left:10px;
	text-decoration:none;
	background-color:#DDEEFF;
	color:#0072BC;
	cursor:default;
}

#tnt_pagination .disabled_tnt_pagination {
	padding:7px;
	padding-top:2px;
	padding-bottom:2px;
	border:1px solid #EBEBEB;
	margin-left:10px;
	text-decoration:none;
	background-color:#F5F5F5;
	color:#D7D7D7;
	cursor:default;
}
    </style>
  <div id="main">
    <div id="header">
      <div id="logo">
      <p></p>
      <div style="padding-top: 50px;" id="logo_cube"></div>
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h2>HOTGAME CATALOG</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><?=anchor('screen/index', 'Home', 'title="Layout"');?></li>
          <li><?=anchor('catscreen/index', 'Categories', 'title="Categories"');?></li>
          <li><?=anchor('itemscreen/index', 'Items', 'title="Items"');?></li>
          <li><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
		  <li class="selected"><?=anchor('limit/index', 'Others', 'title="Others"');?></li>
		  <li style='padding-left:407px;'><?=anchor('screen/index?aksi=logout', 'Logout', 'title="Logout from this site"');?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
	<h2>Limiter</h2>
		<div style="padding-top:20px;"></div>
		<div id= "divContainer">
		<h2>App Limiter</h2>
		<form id=mylimitform enctype="multipart/form-data" action="<?=base_url()?>index.php/limit/getidlimit" method=post>
		<input type=hidden name="idlimit"/>
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
                <tr>
                    <th style="width:150px;">Time</th>
                    <th style="width:150px;padding-left:25px;">Type</th><th style="width:80px;text-align:center;"></th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <!--tr><td></td><td></td><td></td><td></td></tr-->
    		<tr>
			<td><input type=text name="slimit" style="width: 60px;"/></td>
			<td>
				<select name="setd">
				<option>--choose--</option>
				<option value='1'>Day</option>
				<option value='2'>Week</option>
				<option value='3'>Month</option>
				<option value='4'>Year</option>
				</select>
			</td>
     		<td>
     		<input class="submit" type=submit id=setlimit value='SET'/></td>
    		</tr>
            </tbody>
        </table>
        </form>
        <div style='clear: both'></div>
        <div>Active :
        <?php 
        	foreach ($set['gettime'] as $time)
        	{
        		if($time['type']==1)
        		{
        			echo $time['time'];
        			echo "  days";
        		}
        		if($time['type']==2)
        		{
        			$get = $time['time'];
        			$get = $get/7;
        			echo $get;
        			echo "  weeks";
        		}
        		if($time['type']==3)
        		{
        			$get = $time['time'];
        			$get = $get/30;
        			echo $get;
        			echo "  Months";
        		}
        		if($time['type']==4)
        		{
        			$get = $time['time'];
        			$get = $get/365;
        			echo $get;
        			echo "  Years";
        		}
        	}
        ?>
        </div>
	</div>
	<div style="padding-top:35px;"></div>
	<div id= "divContainer">
		<h2>SMS Limiter</h2>
		<form id=mylimitform enctype="multipart/form-data" action="<?=base_url()?>index.php/limit/getidslimit" method=post>
		<input type=hidden name="idlimit"/>
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
                <tr>
                    <th style="width:330px;" align=center>Time</th>
                    <th style="width:80px;text-align:center;"></th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <!--tr><td></td><td></td><td></td><td></td></tr-->
    		<tr>
			<td align=center><input type=text name="slimit" style="width: 160px;"/></td>
     		<td>
     		<input class="submit" type=submit id=setlimit value='SET'/></td>
    		</tr>
            </tbody>
        </table>
        </form>
        <div style='clear: both'></div>
        <div>Active :
        <?php 
        	foreach ($set['getstime'] as $time)
        	{
        			echo $time['time'];
        	}
        ?>
        </div>
	</div>
	<p /><h2>Disclaimer</h2>
	<div align="center">
	<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/limit/updatedisclaimer" method=post>
		<input type=hidden name="iditem" />
		<table class=tabumum>
		<tr>
		<td colspan="2"></td><td id=sisip1></td>
		</tr>
		<tr>
		<td>Popup</td><td> : </td>
		<td>
		<select name="flagdis">
			<option value='0'>--choose--</option>
			<option value='1'>YES</option>
			<option value='2'>NO</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Disclaimer</td><td> : </td><td><textarea name=descdis cols=40 rows=3></textarea></td>
		</tr>
		<tr>
		<td colspan=2></td><td style="padding-top: 10px;"><p><input style='float:right;' id=smsc class="submit" type=button value='EDIT'/><input style='float:right;' class="submit" type=submit value='SET'/></p></td>
		</tr>
		</table>	
		</form>
<div style="padding-top: 10px"></div>
	<div id= "divContainer">
	<div style='clear: both'></div>
        <table class="formatHTML5" >
		<thead>
		<tr>
		<th style="text-align:center;width:30px;">Popup</th><th style="text-align:center;">Disclaimer Text</th>
		</tr>
		</thead>
<tbody>
		<tr>
		<?php foreach ($set['getclaim'] as $text)
		{
		echo"<td align='center'>";
		if($text['status']==1)
		  echo "YES";
		else echo"<a style='color:red;'>NO</a>";			
		echo"</td>";
		echo"<td align='justify' style='width:300px;'>";
		if($text['claimsms']!= "")
			echo $text['claimsms'];
		else echo"<a style='color:red;'>NO TEXT</a>";
		echo"</td>";
		}?>
		</tr>
		</tbody>
		</table>
</div>
		<div style='clear: both'></div>
		</div>
	
	<div style="padding-top: 10px"></div>
	<h2>Set Title</h2>
	<?php $this->load->helper('url');?>
	<div id= "divContainer">
	<div style='clear: both'></div>
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
                <tr>
                    <th style="width:30px;"></th><th style="width:15px; text-align:center;">No</th><th style="width:20px;"></th>
					<th style="width:490px;">Title Name</th><th style="width:90px;">Manage</th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <?php
			if ( !empty($set['judul']) ) {
	    		$no = 1; 
	    		$ix = 0;
    		foreach ($set['judul'] as $item) {?>
    		<tr>
			<td></td>
     		<td style="text-align:center;"><?php echo $no;?></td>
			<td></td>
     		<?php
			echo "<td id='c1_l$ix' value='".$item['id']."'>
				".$item['ntitle']."
				</td>";
			?>
			<td align="center">
     		<a id=<?php echo "cat$ix";?> /><?php echo"<img class=imgku id='ml$ix' value='".$item['id']."' src='".base_url()."file/images/user_edit.png'/>"; ?></a>
    		</tr>
    		</tr>
    		<?php
    			$no++;
    			$ix++;
    		}
   			} else { ?>
            <?php
   				}
   			?>
            </tbody>
        </table>
	</div>
	<!--h2>Data Records</h2>
	<div id= "divContainer">
	<div style='clear: both'></div>
        <table class="formatHTML5" -->
 
            <!-- TABLE HEADER-->
            <!--thead>
                <tr>
                    <th style="width:10px;">No</th><th style="width:50px; text-align:center;">Icon</th><th style="width:50px;">Category</th><th style="width:140px;">Item Name</th>
                	<th style="width:100px;">Provider</th><th style="width:50px;text-align:center;">IMSI Number</th><th style="width:250px;text-align:center;">Date</th>
                </tr>
            </thead-->
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <!--tbody-->
            <!--?php
			if ( !empty($set['log']) ) {
	    		$no = 1; 
	    		$ix = 0;
    		foreach ($set['log'] as $log) {?-->
    		<!--tr>
     		<td style="text-align:center;"><?php echo $no;?></td>
     		<td style="text-align:center;"><?php echo "<img class=imgku value='".$log['id']."' src='".base_url().$log['icon']."' width='40' height='40'/>"; ?></td-->
			<!--?php 
				echo "<td id='c1_l$ix' value='".$log['id']."'>
				".$log['nama']."
				</td>";
				echo "<td id='c1_l$ix' value='".$log['id']."'>
				".$log['title']."
				</td>";
				echo "<td id='c1_l$ix' value='".$log['id']."'>
				".$log['apname']."
				</td>";
				echo "<td id='c1_l$ix' value='".$log['id']."'>
				".$log['imsi']."
				</td>";
				echo "<td id='c1_l$ix' value='".$log['id']."'>
				".$log['date']."
				</td>";
			?-->
    		<!--/tr-->
    		<!--?php
    			$no++;
    			$ix++;
    		}
   			} else { ?-->
            <!--?php
   				}
   			?-->
            <!--/tbody>
        </table>
        <div id="tnt_pagination"><?php echo $set['links']; ?></div>
	</div-->
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http:\\waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>

