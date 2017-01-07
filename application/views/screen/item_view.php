<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Items</title>
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
<form class="form_settings" id=myinputform enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/addajaxitem" method=post>
	<table id=tabinputform class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>ADD NEW ITEM</font></td>
		</tr>
		<tr>
		<td>Title</td><td> : </td><td><input type=text name="atitle"/></td>
		</tr>
		<tr>
		<td>Label</td><td> : </td><td><input type=text name="alabel"/></td>
		</tr>
		<tr>
		<td>Rating</td><td> : </td>
		<td>
		<select name="arating">
			<option>--choose--</option>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
		</select>
		</td>
		</tr>	
		<tr>
		<td>Popup</td><td> : </td>
		<td>
		<select name="aflag">
			<option>--choose--</option>
			<option value='1'>YES</option>
			<option value='0'>NO</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Description</td><td> : </td><td><textarea name=adesc cols=40 rows=3></textarea></td>
		</tr>
		<tr>
		<td>Icon</td><td> : </td><td><input type=file name="aicon"/></td>
		</tr>
		<tr>
		<td>Display Image</td><td> : </td><td><input type=file name="aimage"/></td>
		</tr>
		<tr>
		<td>Category</td><td> : </td>
		<td>
		<select name="aid_category">
			<option>--choose--</option>
			<?
			$ix = 0;
			foreach($data['categoriesitem'] as $categori)
			{
				echo "<option value='".$categori['id']."'>".$categori['nama']."</option>";
			}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2></td><td><input class='submit' type=submit value='SUBMIT'/></td>
		</tr>
	</table>	
</form>
</div>


<div id="popupi" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exiti style="padding: 5px; background: black; color: white; position: fixed">x</div>
<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/updateajaxitem" method=post>
<input type=hidden name="iditem" />
	<table id=tabinputformi class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>UPDATE ITEM</font></td>
		</tr>
		<tr>
		<td>Title</td><td> : </td><td><input type=text name="title"/></td>
		</tr>
		<tr>
		<td>Label</td><td> : </td><td><input type=text name="label"/></td>
		</tr>
		<tr>
		<td>Rating</td><td> : </td>
		<td>
		<select name="rating">
			<option>--choose--</option>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Popup</td><td> : </td>
		<td>
		<select name="flag">
			<option>--choose--</option>
			<option value='1'>YES</option>
			<option value='0'>NO</option>
		</select>
		</td>
		</tr>
		<tr>
		<td>Description</td><td> : </td><td><textarea name=desc cols=40 rows=3></textarea></td>
		</tr>
		<tr>
		<td>Icon</td><td> : </td><td><img id=iconup style='background: blank; border: 1px black solid; width: 40px; height: 40px' src=''/><input type=file name="icon"/></td>
		</tr>
		<tr>
		<td>Display Image</td><td> : </td><td><img id=imageup style='background: blank; border: 1px black solid; width: 100px; height: 40px' src=''/><br/><input type=file name="image"/></td>
		</tr>
		<tr>
		<td>Category</td><td> : </td>
		<td>
		<select name="aid_category">
			<option>--choose--</option>
			<?
			foreach($data['categoriesitem'] as $categori)
			{
				echo "<option value='".$categori['id']."'>".$categori['nama']."</option>";
			}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2></td><td><input class='submit' type=submit value='UPDATE'/></td>
		</tr>
		</table>	
	</form>
</div>

<style type="text/css">
 
        /*** central column on page ***/
        div#divContainer
        {
            max-width: 760px;
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
          <li class="selected"><?=anchor('itemscreen/index', 'Items', 'title="Items"');?></li>
          <li><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
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
                    <th style="width:10px;">No</th><th style="width:50px; text-align:center;">Icon</th><th style="width:50px;">Category</th><th style="width:100px;">Item Name</th><th style="width:250px;">Description</th>
                	<th style="width:100px;">&nbsp&nbsp&nbsp&nbspRating</th><th style="width:50px;">Popup</th><th style="width:50px;text-align:center;">Manage</th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <?php
			if ( !empty($data['items']) ) {
	    		$no = 1; 
	    		$ix = 0;
    		foreach ($data['items'] as $item) {?>
    		<tr>
     		<td style="text-align:center;"><?php echo $no;?></td>
     		<td style="text-align:center;"><?php echo "<img class=imgku value='".$item['id']."' src='".base_url().$item['icon']."' width='40' height='40'/>"; ?></td>
			<?php 
				echo "<td id='c1_l$ix' value='".$item['id']."'>";
				foreach ($data['categoriesitem'] as $cat)
				{
					if($item['id_category'] == $cat['id']){
						echo $cat['nama'];}
				}
				echo "</td>";
				
				echo "<td id='c1_l$ix' value='".$item['id']."'>
				".$item['title']."
				</td>";
				echo "<td id='c1_l$ix' value='".$item['id']."'>
				".$item['desc']."
				</td>";
				echo "<td id='c1_l$ix' value='".$item['id']."'>";
				if($item['rating']==1)
				{
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled' checked='checked'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
				}
				if($item['rating']==2)
				{
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled' checked='checked'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
				}
				if($item['rating']==3)
				{
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled' checked='checked'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
				}
				if($item['rating']==4)
				{
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled' checked='checked'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
				}
				if($item['rating']==5)
				{
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled'/>";
					echo "<input name='".$item['id']."' type='radio' class='star' disabled='disabled' checked='checked'/>";
				}
				echo "</td>";
				
				echo "<td id='c1_l$ix' value='".$item['id']."'>";
					if($item['flag']==1) echo "<span>YES</span>";
					else echo "<span>NO</span>";
				echo "</td>";
			?>
     		<td style="text-align:center;">
     		<a id=<?php echo "it$ix";?> /><?php echo"<img class=imgku id='mxx$ix' value='".$item['id']."' src='".base_url()."file/images/user_edit.png'/>"; ?></a> | 
     		<a href="<?php echo site_url('itemscreen/delete/'.$item['id']);?>" onclick="return confirm('Are you sure?');">
     		<?php echo "<img src='".base_url()."file/images/trash.png' />";?></a></td>
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
	<p><div><input style="margin-left:790px;" class='submit' type=button id=additem value='ADD NEW ITEM'/></div></p>
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http://waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>
