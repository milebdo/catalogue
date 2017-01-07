<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Pass</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="shortcut icon" type="image/png" href="<?=base_url()?>file/style/favicon.png" />
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>file/style/style.css" />
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-1.8.0.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.form.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/dragdrop.js"></script>
  <script type="text/javascript" src="<?=base_url()?>file/js/jquery.lightbox_me.js"></script>
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

<style type="text/css">
 
        /*** table's thead section, head row style ***/
        table.cubecontent thead tr td  {
            font-weight: bold;
			padding: 12px; 
			display:block; 
			border-top: solid 1px black; 
			border-left: solid 1px black; 
			border-right: solid 1px black;
        }
 
        /*** table's tbody section, even rows style ***/
        table.cubecontent tbody{
            padding:5px;
            height:440px; 
            width:137px; 
            overflow-y:auto;
            overflow-x:auto; 
            display:block; 
            border: solid 1px black;
        }
        
         /*** table's thead section, head row style ***/
        table.cubecategories thead tr td  {
            font-weight: bold;
			padding: 12px; 
			display:block; 
			border-top: solid 1px black; 
			border-left: solid 1px black; 
			border-right: solid 1px black;
        }
 
        /*** table's tbody section, even rows style ***/
        table.cubecategories tbody{
            padding:5px;
            height:170px; 
            width:143px; 
            overflow-y:auto;
            overflow-x:auto; 
            display:block; 
            border: solid 1px black;
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
		  <li style='padding-left:526px;'><?=anchor('screen/index?aksi=logout', 'Logout', 'title="Logout from this site"');?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <!-- insert the page content here -->
        <form class="form_settings" enctype="multipart/form-data" action="<?=base_url()?>index.php/cube/changepass" method=post>
		<table class=tabumum>
		<tr>
		<td>Old Username</td><td> : </td><td><input type=text name="oldusr"/></td>
		</tr>
		<tr>
		<td>Old Password</td><td> : </td><td><input type=password name="oldpass"/></td>
		</tr>
		<tr>
		<td>New Username</td><td> : </td><td><input type=text name="nusr"/></td>
		</tr>
		<tr>
		<td>New Password</td><td> : </td><td><input type=password name="npass"/></td>
		</tr>
		<tr>
		<td colspan=2></td><td style="padding-top: 10px;"><input class="submit" type=submit value='SET'/></td>
		</tr>
		</table>	
		</form>
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http:\\waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>