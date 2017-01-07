<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Action</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="shortcut icon" type="image/png" href="<?=base_url()?>file/style/favicon.png" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>file/style/style.css" />
  <link rel="stylesheet" href="<?=base_url()?>file/css/jquery.rating.css" type="text/css" />
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-1.8.0.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.form.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/dragdrop.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.lightbox_me.js"></script>
  
  
<script type="text/javascript" src="<?=base_url()?>file/js/jquery.MetaData.js"></script>
<script type="text/javascript" src="<?=base_url()?>file/js/jquery.rating.js"></script>
<script type="text/javascript" src="<?=base_url()?>file/js/jquery.rating.pack.js"></script>
<script type="text/javascript" src="<?=base_url()?>file/js/jquery.ui.stars.min.js"></script>
</head>
<body>
<div id="loading-status">
   <table>
      <tr>
         <td><img src='<?=base_url()?>file/style/ajax-loader.gif' /></td>
         <td>Loading...</td>
      </tr>
   </table>
</div>

<div id="popup" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exit style="padding: 5px; background: black; color: white; position: fixed">x</div> 
<form class="form_settings" id=myinputformm enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/addaction" method=post>
	<table id=tabinputform style='padding: 9px; position: fixed; margin: auto' class=tabumumm>
		<tr>
		<td colspan=3><font style='font-size: 20px'>ADD ACTION</font></td>
		</tr>
		<tr>
		<td>Action : 
		<select style="width: 70px;" name="aaction">
			<option>--choose--</option>
			<option value='1'>REG</option>
			<option value='2'>PULL</option>
		</select>
		</td>
		</tr>
		<tr><td cols=2>
			<table id=otftabinp class=tabumumm style="border: 1px solid #E5E5DB;">
				<tr>
					<td>Shortcode 1</td><td> : </td><td><input style='width:110px;' type=text name='short[0]'/></td>
					<td>Message 1</td><td> : </td><td><input style='width:200px;' type=text name='msg[0]'/></td>
					<td>Delay 1</td><td> : </td><td><input style='width:40px;' type=text name='del[0]'/></td>
					<td>Track 1</td><td> : </td><td><select style="width: 70px;" name="trac[0]">
						<option>--choose--</option>
						<option value='1'>Yes</option>
						<option value='0'>No</option>
					</select></td>
					<td><input style='width:20px;' type=button value='+' id='tambahinp'/><input style='width:20px;' type=button value='-' id='kuranginp'/></td>
				</tr>
			</table>
		</td></tr>
		<tr>
			<td style="overflow: right; padding-left:580px; padding-top:20px;"><input class='submit' type=submit value='SUBMIT'/></td>
		</tr>
	</table>
</form>
</div>

<div id="popupi" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exiti style="padding: 5px; background: black; color: white; position: fixed">x</div>
<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/updateaction" method=post>
	<input type=hidden name="iditem" />
	<table id=tabinputformi class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>UPDATE ACTION</font></td>
		</tr>
		<tr>
		<td>Action : 
		<select style="width: 70px;" name="action">
			<option>--choose--</option>
			<option value='1'>REG</option>
			<option value='2'>PULL</option>
		</select>
		</td>
		</tr>
		<tr><td cols=2>
			<table id=otftab class=tabumumm style="border: 1px solid #E5E5DB;">
				<tr>
					<td>Shortcode 1</td><td> : </td><td><input style='width:110px;' type=text name='short[0]'/></td>
					<td>Message 1</td><td> : </td><td><input style='width:200px;' type=text name='msg[0]'/></td>
					<td>Delay 1</td><td> : </td><td><input style='width:40px;' type=text name='del[0]'/></td>
					<td>Track 1</td><td> : </td><td><select style="width: 70px;" name="trac[0]">
						<option value='1'>YES</option>
						<option value='0'>NO</option>
					</select></td>
					<td><input style='width:20px;' type=button value='+' id='tambah'/><input style='width:20px;' type=button value='-' id='kurang'/></td>
				</tr>
			</table>
		</td></tr>
		<tr>
			<td style="overflow: right; padding-left:580px; padding-top:20px;"><input class='submit' type=submit value='SUBMIT'/></td>
		</tr>
	</table>	
</form>
</div>

<style type="text/css">
 
        /*** central column on page ***/
        div#divContainer
        {
            max-width: 610px;
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
 
        /*** hover effect to table's tbody odd rows ***/
        table.formatHTML5 tbody tr:nth-child(odd):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #e9e7e7;
            background: -webkit-gradient(linear, left top, left bottom, from(#75c7fb), to(#75c7fb));
            background: -moz-linear-gradient(top, #75c7fb, #75c7fb);
            color: #fefefe;
        }
 
        /*** table's tbody section, even rows style ***/
        table.formatHTML5 tbody tr:nth-child(even) {
            background-color: #efefef;
        }
 
        /*** hover effect to apply to table's tbody section, even rows ***/
        table.formatHTML5 tbody tr:nth-child(even):hover
        {
            cursor:pointer;
            /* add gradient */
            background-color: #808080;
            background: -webkit-gradient(linear, left top, left bottom, from(#75c7fb), to(#75c7fb));
            background: -moz-linear-gradient(top, #75c7fb, #75c7fb);
            color: #dadada;
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
            color:#303030;
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
          <li class="selected"><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
          <li><?=anchor('limit/index', 'Others', 'title="Others"');?></li>
		  <li style='padding-left:407px;'><?=anchor('screen/index?aksi=logout', 'Logout', 'title="Logout from this site"');?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <?php $this->load->helper('url');?>
        <!-- insert the page content here -->
		
	<div id= "divContainer">
	<div style='clear: both'></div>
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
                <tr>
                    <th style="width:10px;">No</th><th style="width:100px;text-align: center;">Action</th><th style="width:100px; text-align: center;">Shortcode</th>
                    <th style="width:100px; text-align: center;">Message</th><th style="width:100px; text-align: center;">Delay</th><th style="width:100px; text-align: center;">Tracking</th style="width:100px;"><th>Manage</th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <?php
			if ( !empty($data['action']) ) {
	    		$no = 1; 
	    		$ix = 0;
    		foreach ($data['action'] as $item) {?>
    		<tr>
     		<td style="text-align: center;"><?php echo $no;?></td>
     		<?php 
	     		echo "<td style='text-align: center;' id='c1_l$ix' value='".$item['id']."'>";
	     		if($item['action']==1)echo "<span>REG</span>";
	     		else echo "<span>PULL</span>";
	     		echo"</td>";
	     	?>
	     		<td></td><td></td><td></td><td></td>
	     		<td>
	     		<a id=<?php echo "itm$ix";?> /><?php echo"<img class=imgku id='act$ix' value='".$item['id']."' src='".base_url()."file/images/user_edit.png'/>"; ?></a> |
	     		     		<a href="<?php echo site_url('action/delete/'.$item['id']);?>" onclick="return confirm('Are you sure?');">
	     		     		<?php echo "<img src='".base_url()."file/images/trash.png' />";?></a></td>
	     	<?php 
	     		foreach ($data['getreg'] as $row) 
	     		{
	     			if($item['id'] == $row['id_set'])
	     			{
	     				echo "<tr>";
	     				echo "<td></td><td></td>";
	     				echo "<td style='text-align: center;' id='c1_l$ix' value='".$row['id']."'>
	     				".$row['shortcode']."
	     				</td>";
	     				echo "<td style='text-align: center;' id='c1_l$ix' value='".$row['id']."'>
	     				".$row['message']."
	     				</td>";
	     				echo "<td style='text-align: center;' id='c1_l$ix' value='".$row['id']."'>
	     				".$row['wait']."
	     				</td>";
	     				echo "<td style='text-align: center;' id='c1_l$ix' value='".$row['id']."'>";
	     					if($row['tracking']==1)echo "<span>YES</span>";
	     					else echo "<span>NO</span>";
	     				echo "</td>";
	     				echo "<td></td>";
	     				echo "</tr>";
	     			}
	     		}
     		?>
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
        <div id="tnt_pagination"><?php echo $data['links']; ?></div>
	</div>
	<div style='clear: both'></div>
	<p><div><input style="margin-left:720px;" class='submit' type=button id=additem value='ADD ACTION'/></div></p>
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http://waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>
