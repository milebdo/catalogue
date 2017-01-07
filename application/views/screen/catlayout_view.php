<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Category Layout</title>
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
            max-width: 500px;
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
    </style>

<div id="popup" style="z-index: 100; position: absolute; left: 0px; top: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%">
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
		<td colspan="2"></td><td id=sisip1inp></td>
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
			<?
			foreach($data['categories'] as $categori)
			{
				echo "<option value='".$categori['id']."'>".$categori['nama']."</option>";
			}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2></td><td style="padding-top: 10px;"><input class="submit" type=submit value='SUBMIT'/></td>
		</tr>
	</table>	
</form>
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
            height:250px; 
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
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><?=anchor('screen/index', 'Home', 'title="Layout"');?></li>
          <li><?=anchor('catscreen/index', 'Categories', 'title="Categories"');?></li>
          <li><?=anchor('itemscreen/index', 'Items', 'title="Items"');?></li>
          <li><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
          <li><?=anchor('limit/index', 'Others', 'title="Others"');?></li>
          <li class="selected">
          	<?php 
				$getid = 0;
				foreach($data['categories'] as $cat)
				{
					echo "<a value='".$cat['id']."'>
					".$cat['nama']."
					</a>";
					echo "<input type='hidden' name='someVar' id='someVar' value='".$cat['id']."' />";
					$getid = $cat['id'];
				}
			?>
          </li>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <!-- insert the page content here -->	
        <?php $this->load->helper('url');?>
        <h2>Features</h2>	
		<table style='float: left; margin-right: 20px'>
		<tr>
		<td valign=top>
		<?php
			$idscreen = 1;
		?>
		</td>
		<td></td>
		</tr>
		<tr>
		<td valign=top>
		<table id=tabmain1 border=1 <?php if($idscreen != 0 && $idscreen != 1){echo "style='display:none'";} ?> >
			<tr>
			<td id=tabsub1 value='<?php if($idscreen == 1){echo "".$data['featuredcategory'][0]['id_item'];} ?>' style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredcategory'][0]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub2 value='<?php if($idscreen == 1){echo "".$data['featuredcategory'][1]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredcategory'][1]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub3 value='<?php if($idscreen == 1){echo "".$data['featuredcategory'][2]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredcategory'][2]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub4 value='<?php if($idscreen == 1){echo "".$data['featuredcategory'][3]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredcategory'][3]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub5 value='<?php if($idscreen == 1){echo "".$data['featuredcategory'][4]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredcategory'][4]['image'].")";} ?>'></td>
			</tr>
        </table>
		<div style='margin-top:15px;'><input class=submit_lay type=button id=sublaycat value="SUBMIT LAYOUT"/></div>	
		</td>
		<td valign=top>
		<div id='itemcontainer' style="overflow: scroll; width: 110px; height: 400px">
        <?php
			$ix = 0;
			foreach($data['items'] as $item)
			{
				$ix++;
				echo "<img class=imgku id='my$ix' value='".$item['id']."' src='".base_url().$item['image']."' width='90' height='90'/><br/><hr/>";
			}
		?>
		</div>
		</td>
		</tr>
		</table>
		
		<form class="form_settings" id=myformm enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/updateajaxitem" method=post>
		<input type=hidden name="iditem"/><table class=tabumum>
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
		<td colspan="2"></td><td id=sisip1></td>
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
		<td>Icon</td><td> : </td><td><img id=iconup style='background: blank; border: 1px black solid; width: 40px; height: 40px' src=''/> <input type=file name="icon"/></td>
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
				foreach($data['categories'] as $cat)
				{
					echo "<option value='".$cat['id']."'>".$cat['nama']."</option>";
				}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2></td><td style="padding-top: 20px;"><input style="margin-left: 105px;" class="submit" type=submit value='UPDATE'/>
		<input type=button  class="submit" id=additem value='ADD ITEM'/></td>
		</tr>
		</table>	
		</form>
	<div style='clear: both'></div>	
	<div style="padding-top: 40px;"></div>
	<table>
		<tr>
		<?php 
		$c = 0;
		foreach($data['title'] as $set)
		{
		if($c==1)
			echo "<td style='padding-left:10px;'><h2>";
		else 
			echo "<td><h2>";
		echo $set['ntitle'];
		echo"</h2></td>";
		$c++;
		}?>
		</tr>
		<tr>
			<td>
				<table>
				<tr>
					<td valign=top >
						<table cellspacing=0 class=cubecontent>
						<thead>
						<tr>
							<td>
							Item List
							</td>
						</tr>
						</thead>
						<tbody>
						<?php
							$ix = 0;
							foreach($data['items'] as $item)
							{
								$ix++;
								echo "<tr style='padding:5px;'>
								<td class=tdtab id='c7_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins7>&nbsp>&nbsp</button><br/>
				<button id=out7>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c7_lmaind cellspacing=0 class=cubecontent>
				<thead>
				<tr>
				<td>
				List on Device
				</td>
				</tr>
				</thead>
				<tbody>
				<?php
					$ix = 0;
					foreach($data['reca'] as $recb)
					{
						$ix++;
						echo "<tr>
						<td class=tdtab id='dc7$ix' value='".$recb['id_item']."'>
						".$recb['title']."
						</td>
						</tr>";
					}
				?>
				</tbody>
				</table>
				</td>
				</table>
			</td>
			<td style="padding: 10px;">
				<table>
				<tr>
					<td valign=top>
						<table cellspacing=0 class=cubecontent>
						<thead>
						<tr>
							<td>
							Item List
							</td>
						</tr>
						</thead>
						<tbody>
						<?php
							$ix = 0;
							foreach($data['items'] as $item)
							{
								$ix++;
								echo "<tr>
								<td class=tdtab id='c8_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins8>&nbsp>&nbsp</button><br/>
				<button id=out8>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c8_lmaind cellspacing=0 class=cubecontent>
				<thead>
				<tr>
				<td>
				List on Device
				</td>
				</tr>
				</thead>
				<tbody>
				<?php
					$ix = 0;
					foreach($data['recb'] as $recb)
					{
						$ix++;
						echo "<tr>
						<td class=tdtab id='dc8$ix' value='".$recb['id_item']."'>
						".$recb['title']."
						</td>
						</tr>";
					}
				?>
				</tbody>
				</table>
				</td>
				</table>
			</td>
			<td>
				<table>
				<tr>
					<td valign=top>
						<table cellspacing=0 class=cubecontent>
						<thead>
						<tr>
							<td>
							Item List
							</td>
						</tr>
						</thead>
						<tbody>
						<?php
							$ix = 0;
							foreach($data['items'] as $item)
							{
								$ix++;
								echo "<tr>
								<td class=tdtab id='c6_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins6>&nbsp>&nbsp</button><br/>
				<button id=out6>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c6_lmaind cellspacing=0 class=cubecontent>
				<thead>
				<tr>
				<td>
				List on Device
				</td>
				</tr>
				</thead>
				<tbody>
				<?php
					$ix = 0;
					foreach($data['newsapp'] as $recb)
					{
						$ix++;
						echo "<tr>
						<td class=tdtab id='dc6$ix' value='".$recb['id_item']."'>
						".$recb['title']."
						</td>
						</tr>";
					}
				?>
				</tbody>
				</table>
				</td>
				</table>
			</td>
		</tr>
		<tr>
		<td><button id=sub7 class='submit_dev'>Submit</button> <button id=res7 class='submit_dev'>Reset</button></td>
		<td style="padding: 10px;"><button id=sub8 class='submit_dev'>Submit</button> <button id=res8 class='submit_dev'>Reset</button></td>
		<td><button id=sub6 class='submit_dev'>Submit</button> <button id=res6 class='submit_dev'>Reset</button></td>
		</tr>
		</table>
  </div>
  <div id="content_footer"></div>
    <div id="footer">
      <a href="http:\\waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>
