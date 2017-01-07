<!DOCTYPE HTML>
<html>

<head>
  <title>Hotgame::Home</title>
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
          <li class="selected"><?=anchor('screen/index', 'Home', 'title="Home"');?></li>
          <li><?=anchor('catscreen/index', 'Categories', 'title="Categories"');?></li>
          <li><?=anchor('itemscreen/index', 'Items', 'title="Items"');?></li>
          <li><?=anchor('action/index', 'Actions', 'title="Actions"');?></li>
          <li><?=anchor('limit/index', 'Others', 'title="Others"');?></li>
		  <li style='padding-left:407px;'><?=anchor('screen/index?aksi=logout', 'Logout', 'title="Logout from this site"');?></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
    <?php $this->load->helper(array('url','form'));?>
        <!-- insert the page content here -->
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
			<td id=tabsub1 value='<?php if($idscreen == 1){echo "".$data['featuredhome'][0]['id_item'];} ?>' style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredhome'][0]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub2 value='<?php if($idscreen == 1){echo "".$data['featuredhome'][1]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredhome'][1]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub3 value='<?php if($idscreen == 1){echo "".$data['featuredhome'][2]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredhome'][2]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub4 value='<?php if($idscreen == 1){echo "".$data['featuredhome'][3]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredhome'][3]['image'].")";} ?>'></td>
			</tr>
			<tr>
			<td id=tabsub5 value='<?php if($idscreen == 1){echo "".$data['featuredhome'][4]['id_item'];} ?>'  style='background-size: 100%; width: 190px; height: 60px; <?php if($idscreen == 1){echo "background-image: url(".base_url().$data['featuredhome'][4]['image'].")";} ?>'></td>
			</tr>
        </table>
		<div style='margin-top:15px;'><input class="submit_lay" type=button id=sublay value="SUBMIT LAYOUT"/></div>	
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

		<form class="form_settings" id=myform enctype="multipart/form-data" action="<?=base_url()?>index.php/ajax/updateajaxitem" method=post>
		<input type=hidden name="iditem" />
		<table class=tabumum>
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
		<td>Icon</td><td> : </td><td><img id=iconup style='background: blank; border: 1px black solid; width: 40px; height: 40px;' src=''/><input type=file name="icon"/></td>
		</tr>
		<tr>
		<td>Display Image</td><td> : </td><td><img id=imageup style='background: blank; border: 1px black solid; width: 100px; height: 40px; src=''/><br/><input type=file name="image"/></td>
		</tr>
		<tr>
		<td>Category</td><td> : </td>
		<td>
		<select name="aid_category">
			<option>--choose--</option>
			<?php
			foreach($data['categories'] as $categori)
			{
				echo "<option value='".$categori['id']."'>".$categori['nama']."</option>";
			}
			?>
		</select>
		</td>
		</tr>
		<tr>
		<td colspan=2></td><td style="padding-top: 10px;"><input class="submit" type=submit value='UPDATE'/></td>
		</tr>
		</table>	
		</form>
		<div style='clear: both'></div>
		<h2>CATEGORIES</h2>
		<table>
		<tr>
		<td valign=top>
		<table cellspacing=0 class=cubecategories>
			<thead>
				<tr>
					<td>
					Categories List
					</td>
				</tr>
			</thead>
			<tbody>
			<?php
				$ix = 0;
				foreach($data['categories'] as $categori)
				{
					$ix++;
					echo "<tr>
					<td class=tdtab id='c1_l$ix' value='".$categori['id']."'>
					".$categori['nama']."
					</td>
					</tr>";
				}
			?>
			</tbody>
		</table>
		</td>
		<td valign=middle>
		<button id=ins1>&nbsp>&nbsp</button><br/>
		<button id=out1>&nbsp<&nbsp</button>
		</td>
		<td valign=top>
		<table id=c1_lmaind cellspacing=0 class=cubecategories>
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
			foreach($data['catscreen'] as $cat)
			{
				$ix++;
				echo "<tr>
				<td class=tdtab id='dc1$ix' value='".$cat['id_category']."'>
				".$cat['nama']."
				</td>
				</tr>";
			}
		?>
		</tbody>
		</table>
		</td>
		</tr>
		<!-- border -->
		<tr><td><button id=sub1 class='submit_dev'>Submit</button> <button id=res1 class='submit_dev' >Reset</button><td></tr>
		</table>
		<div id="subhead" style='margin-top: 20px'>
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
								<td class=tdtab id='c3_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins3>&nbsp>&nbsp</button><br/>
				<button id=out3>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c3_lmaind cellspacing=0 class=cubecontent>
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
						<td class=tdtab id='dc3$ix' value='".$recb['id_item']."'>
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
								<td class=tdtab id='c4_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins4>&nbsp>&nbsp</button><br/>
				<button id=out4>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c4_lmaind cellspacing=0 class=cubecontent>
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
						<td class=tdtab id='dc4$ix' value='".$recb['id_item']."'>
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
								<td class=tdtab id='c2_l$ix' value='".$item['id']."'>
								".$item['title']."
								</td>
								</tr>";
							}
						?>
						</tbody>
						</table>
					</td>
				<td valign=middle>
				<button id=ins2>&nbsp>&nbsp</button><br/>
				<button id=out2>&nbsp<&nbsp</button>
				</td>
				<td valign=top>
				<table id=c2_lmaind cellspacing=0 class=cubecontent>
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
						<td class=tdtab id='dc2$ix' value='".$recb['id_item']."'>
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
		<td><button id=sub3 class='submit_dev'>Submit</button> <button id=res3 class='submit_dev'>Reset</button></td>
		<td style="padding: 10px;"><button id=sub4 class='submit_dev'>Submit</button> <button id=res4 class='submit_dev'>Reset</button></td>
		<td><button id=sub2 class='submit_dev'>Submit</button> <button id=res2 class='submit_dev'>Reset</button></td>
		</tr>
		</table>
    </div>
  </div>
  	<div id="content_footer"></div>
    <div id="footer">
      <a href="http://waki.mobi">Waki.mobi</a>
    </div>
</body>
</html>
