<!DOCTYPE HTML>
<html>
<head>
  <title>Hotgame::Categories</title>
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
<div id="popup" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exit style="padding: 5px; background: black; color: white; position: fixed">x</div>
<form class="form_settings" id=myinputform enctype="multipart/form-data" action="<?=base_url()?>index.php/catscreen/addcategory" method=post>
	<table id=tabinputform class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>ADD NEW CATEGORY</font></td>
		</tr>
		<tr>
		<td>Label</td><td> : </td><td><input type=text name="alabel"/></td>
		</tr>	
		<tr>
		<td>Icon</td><td> : </td><td><input type=file name="aicon"/></td>
		</tr>
		<tr>
		<tr>
		<td colspan=2></td><td><input class="submit" type=submit value='SUBMIT' /></td>
		</tr>
	</table>	
</form>
</div>
		
<div id="popupc" style="display: none; z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
<div style="position: fixed; left: 0px; top: 0px; background-color: #808080; opacity: 0.4; filter:alpha(opacity=40); width: 100%; height: 100%"></div>
<div id=exitc style="padding: 5px; background: black; color: white; position: fixed">x</div>
<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/catscreen/updatecategory" method=post>
<input type=hidden name="iditem"/>
	<table id=tabinputformc class=tabumum style='padding: 10px; position: fixed; margin: auto'>
		<tr>
		<td colspan=3><font style='font-size: 20px'>UPDATE CATEGORY</font></td>
		</tr>
		<tr>
		<td>Label</td><td> : </td><td><input type=text name="label"/></td>
		</tr>	
		<tr>
		<td>Icon</td><td> : </td><td><img id=iconupp style='background: blank; border: 1px black solid; width: 40px; height: 40px' src=''/> <input type=file name="icon"/></td>
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
            color:#0772a9;
            text-shadow: 0 1px 1px rgba(255,255,255,0.3);
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
          <li class="selected"><?=anchor('catscreen/index', 'Categories', 'title="Categories"');?></li>
          <li><?=anchor('itemscreen/index', 'Items', 'title="Items"');?></li>
          <li><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
          <li><?=anchor('limit/index', 'Others', 'title="Others"');?></li>
		  <li style='padding-left:407px;'><?=anchor('screen/index?aksi=logout', 'Logout', 'title="Logout from this site"');?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <!-- insert the page content here -->
        <?php $this->load->helper('url');?>
        <div id= "divContainer">
        <table class="formatHTML5" >
 
            <!-- TABLE HEADER-->
            <thead>
                <tr>
                    <th style="width:20px;text-align:center;">No</th><th style="width:40px;text-align:center;">Icon</th><th style="width:350px;">Category Name</th>
                    <th style="width:80px;text-align:center;">Manage</th>
                </tr>
            </thead>
 
            <!-- TABLE BODY: MAIN CONTENT-->
            <tbody>
            <!--tr><td></td><td></td><td></td><td></td></tr-->
            <?php
			if ( !empty($data['categories']) ) {
	    		$no = 1; 
	    		$ix = 0;
    		foreach ($data['categories'] as $row) {?>
    		<tr>
     		<td style="text-align:center;"><?php echo $no;?></td>
     		<td style="text-align:center;"><?php echo "<img class=imgku id='my$ix' value='".$row->id."' src='".base_url().$row->icon."' width='40' height='40'/>"; ?></td>
			<?php 
				echo "<td id='c1_l$ix' value='".$row->id."'>
				".$row->nama."
				</td>";
			?>
     		<td>
     		<a href="<?php echo site_url('screen/category_layout/'.$row->id);?>"><?php echo "<img src='".base_url()."file/images/look.png'/>";?></a> |
     		<a id=<?php echo "cat$ix";?> /><?php echo"<img class=imgku id='mc$ix' value='".$row->id."' src='".base_url()."file/images/user_edit.png'/>"; ?></a> |  
     		<a href="<?php echo site_url('catscreen/delete/'.$row->id);?>" onclick="return confirm('Are you sure?');">
     		<?php echo "<img src='".base_url()."file/images/trash.png'/>";?></a></td>
    		</tr>
    		<?php
    			$no++;
    			$ix++;
    		}
   			} else {?>
            <?php
   				}
   			?>
            </tbody>
        </table>
        <div class="pagination"><?php echo $data['links']; ?></div>
        </div>
        <p><div><input style="margin-left:720px; position: absolute;" class="submit" type=button id=additem value='ADD CATEGORY'/></div></p>
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http://waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>
