$(function() {
	
		var imagenya;
		var iditem;
		
		var l = window.location;
		var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];	

	//	alert(base_url);	
		$("#popup").hide();
		$("#popupi").hide();
		$("#popupp").hide();
		$("#popupc").hide();
		$("#sublay").click(function(){

				flag = true;
				datalayout = "";
				countflag = 0;
				$("#tabmain1").find("td[id^='tabsub']").each(function(){
					if(countflag == 0)
						datalayout = datalayout+$(this).attr('value');
					else
						datalayout = datalayout+"-"+$(this).attr('value');
					countflag++;
					if($(this).attr('value') == "")
						flag = false;
				});
				if(flag == true)
				{
					$.ajax({
						type: "POST",
						url: base_url + "/index.php/ajax/updatefeaturedlayout",
						data: { idkategori: 1, datalayout: datalayout, idscreen: 1 }
						}).done(function( msg ) {
							alert(msg);
					});
				}
		});
	//--------------------------------------------	
		$("#sublaycat").click(function(){

				flag = true;
				datalayout = "";
				countflag = 0;
				$("#tabmain1").find("td[id^='tabsub']").each(function(){
					if(countflag == 0)
						datalayout = datalayout+$(this).attr('value');
					else
						datalayout = datalayout+"-"+$(this).attr('value');
					countflag++;
					if($(this).attr('value') == "")
						flag = false;
				});
				if(flag == true)
				{
					$.ajax({
						type: "POST",
						url: base_url + "/index.php/ajax/updatecategorylayout",
						data: { idkategori: 1, datalayout: datalayout, idscreen: 1, idkat: document.getElementById("someVar").value }
						}).done(function( msg ) {
							alert(msg);
					});
				}
		});
		
		//--------------------------------------------	
		$("#sublaysubcat").click(function(){

				flag = true;
				datalayout = "";
				countflag = 0;
				$("#tabmain1").find("td[id^='tabsub']").each(function(){
					if(countflag == 0)
						datalayout = datalayout+$(this).attr('value');
					else
						datalayout = datalayout+"-"+$(this).attr('value');
					countflag++;
					if($(this).attr('value') == "")
						flag = false;
				});
				if(flag == true)
				{
					alert(datalayout);
					$.ajax({
						type: "POST",
						url: base_url + "/index.php/ajax/updatesubcategorylayout",
						data: { idkategori: 1, datalayout: datalayout, idscreen: 1, idsubkat: document.getElementById("someVar1").value }
						}).done(function( msg ) {
							alert(msg);
					});
				}
		});
		
		$("#rad1").click(function(){
			$("#tabmain1").css("display","block");
			$("#tabmain2").css("display","none");
			$("#tabmain3").css("display","none");
		});
		
		$("#rad2").click(function(){
			$("#tabmain1").css("display","none");
			$("#tabmain2").css("display","block");
			$("#tabmain3").css("display","none");
		});
		
		$("#rad3").click(function(){
			$("#tabmain1").css("display","none");
			$("#tabmain2").css("display","none");
			$("#tabmain3").css("display","block");
		});
			
		$("#additem").click(function(){
			lebarp = $("#popup").width();
			tinggip = $("#popup").height();
			$("#popup").show('slow');
			lebar = $("#tabinputform").width();
			tinggi = $("#tabinputform").height();
			kiri = (lebarp - lebar)/2;
			atas = (tinggip - tinggi)/2;
			
			$("#tabinputform").css("left",kiri);
			$("#tabinputform").css("top",atas);
			$("#exit").css("left",kiri+lebar);
			$("#exit").css("top",atas-30);
		});
		
		$("#addsub").click(function(){
			lebarp = $("#popupp").width();
			tinggip = $("#popupp").height();
			$("#popupp").show('slow');
			lebar = $("#tabinputformm").width();
			tinggi = $("#tabinputformm").height();
			kiri = (lebarp - lebar)/2;
			atas = (tinggip - tinggi)/2;
			
			$("#tabinputformm").css("left",kiri);
			$("#tabinputformm").css("top",atas);
			$("#exitt").css("left",kiri+lebar);
			$("#exitt").css("top",atas-30);
		});
		
		$("[id^='cat']").click(function(){
			idt = $(this).attr('id');
			if(idt)
			{
				lebarp = $("#popupc").width();
				tinggip = $("#popupc").height();
				$("#popupc").show('slow');
				lebar = $("#tabinputformc").width();
				tinggi = $("#tabinputformc").height();
				kiri = (lebarp - lebar)/2;
				atas = (tinggip - tinggi)/2;
				
				$("#tabinputformc").css("left",kiri);
				$("#tabinputformc").css("top",atas);
				$("#exitc").css("left",kiri+lebar);
				$("#exitc").css("top",atas-30);
			}
		});
		
		$("td[id^='c']").click(function(){
			if($(this).css("background-color") == "rgb(128, 128, 128)")
				$(this).css("background-color","rgb(255, 255, 255)");
			else
				$(this).css("background-color","rgb(128, 128, 128)");
		});
		
		$("td[id^='d']").live("click",function(){
			if($(this).css("background-color") == "rgb(128, 128, 128)")
				$(this).css("background-color","rgb(255, 255, 255)");
			else
				$(this).css("background-color","rgb(128, 128, 128)");
		});
		
		$("[id^='sub']").click(function(){
			idtomb = $(this).attr('id');
			namacl = "c"+idtomb.substr(idtomb.length - 1);
			dataapp = "";
			countapp = 0;
			$("[id='"+namacl+"_lmaind'] > tbody > tr > td.tdtab").each(function(){
				if(countapp == 0)
					dataapp = dataapp+$(this).attr("value");
				else
					dataapp = dataapp+"-"+$(this).attr("value");
				countapp++;
			});
			if(idtomb.substr(idtomb.length - 1) == 1)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatecategorytoscreen",
					data: { idkategori: 1, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 2)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatenewsapptoscreen",
					data: { idkategori: 1, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 3)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updaterecatoscreen",
					data: { idkategori: 1, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 4)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updaterecbtoscreen",
					data: { idkategori: 1, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 5)
			{
				idcat = document.getElementById("someVar").value;
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatesubcategorytoscreen",
					data: { idkategori: idcat, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 6)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatecatnewsapptoscreen",
					data: { idkategori: document.getElementById("someVar").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 7)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatecatrecatoscreen",
					data: { idkategori: document.getElementById("someVar").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			if(idtomb.substr(idtomb.length - 1) == 8)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatecatrecbtoscreen",
					data: { idkategori: document.getElementById("someVar").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			
			if(idtomb.substr(idtomb.length - 1) == 9)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatesubcatnewsapptoscreen",
					data: { idkategori: document.getElementById("someVar1").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			
			if(idtomb.substr(idtomb.length - 1) == 11)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatesubrecatoscreen",
					data: { idkategori: document.getElementById("someVar1").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
			
			if(idtomb.substr(idtomb.length - 1) == 12)
			{
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/updatesubrecbtoscreen",
					data: { idkategori: document.getElementById("someVar1").value, dataapp: dataapp }
					}).done(function( msg ) {
							alert(msg);
				});
			}
		});
		
		
		$("[id^='res']").click(function(){
			idtomb = $(this).attr('id');
			namacl = "c"+idtomb.substr(idtomb.length - 1);
			$("[id='"+namacl+"_lmaind']").find("tr .tdtab").remove();
		});
		
		$("[id^='ress']").click(function(){
			idtomb = $(this).attr('id');
			namacl = "cc"+idtomb.substr(idtomb.length - 1);
			$("[id='"+namacl+"_lmaind']").find("tr .tdtab").remove();
		});
		
		$("[id^='ins']").click(function(){
			idtomb = $(this).attr('id');

			namacl = "c"+idtomb.substr(idtomb.length - 1);
			
			$("td[id^='"+namacl+"'][style*='rgb(128, 128, 128)']").each(function(){
				var isi = $(this).html();
				var label = 0;
				var values = $(this).attr("value");
				$("td[id^='d"+namacl+"']").each(function(){
					if($(this).html() == isi)
					{
						label = 1;
					}
				});
					
				if(label == 0)
					$("[id='"+namacl+"_lmaind']").append("<tr><td id=d"+namacl+($("[id='"+namacl+"_lmaind']").length+1)+" class=tdtab value='"+values+"'>"+$(this).html()+"</td></tr>");
			});	
		});
		
		$("[id^='inst']").click(function(){
			idtomb = $(this).attr('id');

			namacl = "cc"+idtomb.substr(idtomb.length - 1);

			$("td[id^='"+namacl+"'][style*='rgb(128, 128, 128)']").each(function(){
				var isi = $(this).html();
				var label = 0;
				var values = $(this).attr("value");
				$("td[id^='dd"+namacl+"']").each(function(){
					if($(this).html() == isi)
					{
						label = 1;
					}
				});
					
				if(label == 0)
					$("[id='"+namacl+"_lmaind']").append("<tr><td id=d"+namacl+($("[id='"+namacl+"_lmaind']").length+1)+" class=tdtab value='"+values+"'>"+$(this).html()+"</td></tr>");
			});	
		});
		
		$("[id^='out']").live("click", function(){
			idtomb = $(this).attr('id');
			
			namacl = "c"+idtomb.substr(idtomb.length - 1);
			
			$("td[id^='d"+namacl+"'][style*='rgb(128, 128, 128)']").each(function(){
				$(this).parent().remove();
			});
		});
		
		$("[id^='outt']").live("click", function(){
			idtomb = $(this).attr('id');
			
			namacl = "cc"+idtomb.substr(idtomb.length - 1);
			$("td[id^='d"+namacl+"'][style*='rgb(128, 128, 128)']").each(function(){
				$(this).parent().remove();
			});
		});
		
		$("#tambah").live('click',function(){
			jumlah = $("#otftab > tbody > tr").length;
			$("#tambah").remove();
			$("#kurang").remove();
			$("#otftab").append("<tr><td>Shortcode "+(jumlah+1)+"</td><td> : </td><td><input style='width:110px;' type=text name='short["+jumlah+"]'/></td><td>Message  "+(jumlah+1)+"</td><td> : </td><td><input style='width:200px;' type=text name='msg["+jumlah+"]'/></td><td>Delay "+(jumlah+1)+"</td><td> : </td><td><input style='width:40px;' type=text name='del["+jumlah+"]'/></td>" +
					"<td>Track "+(jumlah+1)+"</td><td> : </td><td><select style='width: 70px;' name='trac["+jumlah+"]'><option>--choose--</option><option value='1'>Yes</option><option value='0'>No</option></select></td>" + 
					"<td><input style='width:20px;' type=button value='+' id='tambahinp'/><input style='width:20px;' type=button value='-' id='kuranginp'/></td></tr>");
			
			if($("#popup").css("display") != "none")
			{
				lebarp = $("#popup").width();
				tinggip = $("#popup").height();
				$("#popup").show('slow');
				lebar = $("#tabinputform").width();
				tinggi = $("#tabinputform").height();
				kiri = (lebarp - lebar)/2;
				atas = (tinggip - tinggi)/2;
			
				$("#tabinputform").css("left",kiri);
				$("#tabinputform").css("top",atas);
				$("#exit").css("left",kiri+lebar);
				$("#exit").css("top",atas-30);
			}
		});

		$("#kurang").live('click',function(){
			jumlah = $("#otftab > tbody > tr").length;
			
			if(jumlah > 1)
			{
				trku = "tr:eq("+(jumlah-2)+")";
				$(this).parent().parent().remove();
				ukuran = $("#otftab").find('tbody').find(trku).append("<td><input style='width:20px;' type=button value='+' id='tambah'/><input style='width:20px;' type=button value='-' id='kurang'/></td>");
				
				if($("#popup").css("display") != "none")
				{
					lebarp = $("#popup").width();
					tinggip = $("#popup").height();
					$("#popup").show('slow');
					lebar = $("#tabinputform").width();
					tinggi = $("#tabinputform").height();
					kiri = (lebarp - lebar)/2;
					atas = (tinggip - tinggi)/2;
			
					$("#tabinputform").css("left",kiri);
					$("#tabinputform").css("top",atas);
					$("#exit").css("left",kiri+lebar);
					$("#exit").css("top",atas-30);
				}
			}
		});
		
		$("#tambahinp").live('click',function(){
			jumlah = $("#otftabinp > tbody > tr").length;
			$("#tambahinp").remove();
			$("#kuranginp").remove();
			$("#otftabinp").append("<tr><td>Shortcode "+(jumlah+1)+"</td><td> : </td><td><input style='width:110px;' type=text name='short["+jumlah+"]'/></td><td>Message  "+(jumlah+1)+"</td><td> : </td><td><input style='width:200px;' type=text name='msg["+jumlah+"]'/></td><td>Delay "+(jumlah+1)+"</td><td> : </td><td><input style='width:40px;' type=text name='del["+jumlah+"]'/></td>" +
					"<td>Track "+(jumlah+1)+"</td><td> : </td><td><select style='width: 70px;' name='trac["+jumlah+"]'><option>--choose--</option><option value='1'>Yes</option><option value='2'>No</option></select></td>" + 
					"<td><input style='width:20px;' type=button value='+' id='tambahinp'/><input style='width:20px;' type=button value='-' id='kuranginp'/></td></tr>");
			
			if($("#popup").css("display") != "none")
			{
				lebarp = $("#popup").width();
				tinggip = $("#popup").height();
				$("#popup").show('slow');
				lebar = $("#tabinputform").width();
				tinggi = $("#tabinputform").height();
				kiri = (lebarp - lebar)/2;
				atas = (tinggip - tinggi)/2;
			
				$("#tabinputform").css("left",kiri);
				$("#tabinputform").css("top",atas);
				$("#exit").css("left",kiri+lebar);
				$("#exit").css("top",atas-30);
			}
		});
		
		$("#kuranginp").live('click',function(){
			jumlah = $("#otftabinp > tbody > tr").length;
			
			if(jumlah > 1)
			{
				trku = "tr:eq("+(jumlah-2)+")";
				$(this).parent().parent().remove();
				ukuran = $("#otftabinp").find('tbody').find(trku).append("<td><input style='width:20px;' type=button value='+' id='tambahinp'/><input style='width:20px;' type=button value='-' id='kuranginp'/></td>");
				
				if($("#popup").css("display") != "none")
				{
					lebarp = $("#popup").width();
					tinggip = $("#popup").height();
					$("#popup").show('slow');
					lebar = $("#tabinputform").width();
					tinggi = $("#tabinputform").height();
					kiri = (lebarp - lebar)/2;
					atas = (tinggip - tinggi)/2;
			
					$("#tabinputform").css("left",kiri);
					$("#tabinputform").css("top",atas);
					$("#exit").css("left",kiri+lebar);
					$("#exit").css("top",atas-30);
				}
			}
		});
		
		$("#exit").click(function(){
			$("#popup").hide();
		});
		
		$("#exit").click(function(){
			$("#popupload").hide();
		});
		
		$("#exiti").click(function(){
			$("#popupi").hide();
			window.location.reload(true);
		});
		
		$("#exitt").click(function(){
			$("#popupp").hide();
		});
		
		$("#exitc").click(function(){
			$("#popupc").hide();
		});
		
		$("img[id^='mc']").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/catscreen/getajaxcategory",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='iditem']").val(jsonparsing.id);
					$("input[name='label']").val(jsonparsing.title);
					$("#iconupp").attr("src",jsonparsing.iconlink);
			});
		});
		
		$("img[id^='mcs']").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/catscreen/getajaxscategory",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='iditem']").val(jsonparsing.id);
					$("input[name='alabels']").val(jsonparsing.title);
					$("#iconuppx").attr("src",base_url+jsonparsing.iconl);
					$("#loading-status").hide();
			});
		});
		
		$("img[id^='ml']").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/limit/getajaxtitle",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='idlimit']").val(jsonparsing.id);
					$("input[name='slabel']").val(jsonparsing.title);
			});
		});
		
		$("#smsc").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/ajax/getajaxsms",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("select[name='action']").val(jsonparsing.id_action);
					$("textarea[name='descdis']").html(jsonparsing.desc);
					$("select[name='flagdis']").val(jsonparsing.flagg);
			});
		});
		
		$("img[id^='my']").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/ajax/getajaxitem",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='iditem']").val(jsonparsing.id);
					$("input[name='title']").val(jsonparsing.title);
					$("input[name='label']").val(jsonparsing.label);
					$("select[name='rating']").val(jsonparsing.rating);
					$("textarea[name='desc']").html(jsonparsing.desc);
					$("#iconup").attr("src",base_url + "/"+jsonparsing.iconlink);
					$("#imageup").attr("src",base_url + "/"+jsonparsing.imagelink);
					$("select[name='aid_category']").val(jsonparsing.id_category);
					//$("select[name='aid_scategory']").val(jsonparsing.subcat);
					$("select[name='flag']").val(jsonparsing.flagg);
			});
		});
		
		$("img[id^='mxx']").click(function(){
			id = $(this).attr("value");
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/ajax/getajaxitem",
				data: { id: id }
				}).done(function( msg ) {
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='iditem']").val(jsonparsing.id);
					$("input[name='title']").val(jsonparsing.title);
					$("input[name='label']").val(jsonparsing.label);
					$("select[name='rating']").val(jsonparsing.rating);
					//$("select[name='action']").val(jsonparsing.id_action);
					$("textarea[name='desc']").html(jsonparsing.desc);
					$("#iconup").attr("src",base_url + "/"+jsonparsing.iconlink);
					$("#imageup").attr("src",base_url + "/"+jsonparsing.imagelink);
					$("select[name='aid_category']").val(jsonparsing.id_category);
					//$("select[name='aid_scategory']").val(jsonparsing.subcat);
					$("select[name='flag']").val(jsonparsing.flagg);
					
					if(id)
					{
						lebarp = $("#popupi").width();
						tinggip = $("#popupi").height();
						$("#popupi").show('slow');
						lebar = $("#tabinputformi").width();
						tinggi = $("#tabinputformi").height();
						kiri = (lebarp - lebar)/2;
						atas = (tinggip - tinggi)/2;
						
						$("#tabinputformi").css("left",kiri);
						$("#tabinputformi").css("top",atas);
						$("#exiti").css("left",kiri+lebar);
						$("#exiti").css("top",atas-30);
					}
					
			});
		});
		
		$("img[id^='act']").click(function(){
			id = $(this).attr("value");
		//	alert(id);
			$.ajax({
				type: "POST",
				url: base_url + "/index.php/ajax/getaction",
				data: { id: id }
				}).done(function( msg ) {
					//alert(msg);
					jsonparsing = jQuery.parseJSON(msg);
					$("input[name='iditem']").val(jsonparsing.id);
					$("select[name='action']").val(jsonparsing.action);
					for(var xx = 0; xx < jsonparsing.dataaksi.length; xx++)
					{	
						if(xx == 0)
						{
							$("input[name='short[0]']").val(jsonparsing.dataaksi[xx].shortcode);
							$("input[name='msg[0]']").val(jsonparsing.dataaksi[xx].message);
							$("input[name='del[0]']").val(jsonparsing.dataaksi[xx].wait);
							$("select[name='trac[0]']").val(jsonparsing.dataaksi[xx].tracking);
						}
						else
						{
							$("#tambah").remove();
							$("#kurang").remove();
							
							val="";
							if(jsonparsing.dataaksi[xx].tracking == 1)					
							{
							   yes = "YES";
							   no = "NO";
						           val = 0;
							}
							else
							{
							   yes = "NO";
							   no = "YES";
						           val = 1;
							}
						
							jumlah = $("#otftab > tbody > tr").length;
							$("select[name='trac["+jumlah+"]']").val(jsonparsing.dataaksi[xx].tracking);
							$("#otftab").append("<tr><td>Shortcode "+(jumlah+1)+"</td><td> : </td><td><input style='width:110px;' type=text name='short["+jumlah+"]' value='"+jsonparsing.dataaksi[xx].shortcode+"'/></td><td>Message  "+(jumlah+1)+"</td><td> : </td><td><input style='width:200px;' type=text name='msg["+jumlah+"]' value='"+jsonparsing.dataaksi[xx].message+"'/></td><td>Delay "+(jumlah+1)+"</td><td> : </td><td><input style='width:40px;' type=text name='del["+jumlah+"]' value='"+jsonparsing.dataaksi[xx].wait+"'/></td>" +
									"<td>Track "+(jumlah+1)+"</td><td> : </td><td><select style='width: 70px;' name='trac["+jumlah+"]' ><option value='"+jsonparsing.dataaksi[xx].tracking+"'>"+yes+"</option><option value='"+val+"'>"+no+"</option></select></td>" +
									"</td><td><input style='width:20px;' type=button value='+' id='tambah'/><input style='width:20px;' type=button value='-' id='kurang'/></td></tr>");
						}
					}
					
					if(id)
					{
						lebarp = $("#popupi").width();
						tinggip = $("#popupi").height();
						$("#popupi").show('slow');
						lebar = $("#tabinputformi").width();
						tinggi = $("#tabinputformi").height();
						kiri = (lebarp - lebar)/2;
						atas = (tinggip - tinggi)/2;
						
						$("#tabinputformi").css("left",kiri);
						$("#tabinputformi").css("top",atas);
						$("#exiti").css("left",kiri+lebar);
						$("#exiti").css("top",atas-30);
					}
					
			});
		});
		
		$("img[id^='my']").draggable({
			appendTo: 'body',
			containment: 'window',
			scroll: false,
			helper: 'clone',
			revert: true,
			start: function(event, ui) {
				id = $(this).attr("value");
				$.ajax({
					type: "POST",
					url: base_url + "/index.php/ajax/getajaxitem",
					data: { id: id }
					}).done(function( msg ) {
						jsonparsing = jQuery.parseJSON(msg);
						$("input[name='iditem']").val(jsonparsing.id);
						$("input[name='title']").val(jsonparsing.title);
						$("input[name='label']").val(jsonparsing.label);
						$("select[name='rating']").val(jsonparsing.rating);
						$("select[name='action']").val(jsonparsing.id_action);
						$("textarea[name='desc']").html(jsonparsing.label);
						$("#iconup").attr("src",base_url + "/"+jsonparsing.iconlink);
						$("#imageup").attr("src",base_url + "/"+jsonparsing.imagelink);
						$("select[name='aid_category']").val(jsonparsing.id_category);
						//$("select[name='aid_scategory']").val(jsonparsing.subcat);
						$("select[name='flag']").val(jsonparsing.flagg);
					});
			},
			drag: function(event, ui) {
				imagenya = $(this).attr("src");
				iditem = $(this).attr("value");
				if (false) {
					$(this).draggable("option", "revert", false);
				}
			}
			
        });
		
        $("td[id^='tabsub']").droppable({
                tolerance: 'intersect',
                over: function() {
						//alert('drop');
                       //$(this).removeClass('out').addClass('over');
                },
                out: function() {
						//alert('out');
                        //$(this).removeClass('over').addClass('out');
                },
                drop: function() {
                        //var answer = confirm('Permantly delete this item?');
                        //$(this).removeClass('over').addClass('out');
						//alert(imagenya);
						$(this).css("background-image","url("+imagenya+")");
						$(this).attr("value",iditem);
                }
        });
		
		$("td[id^='tabsubc']").droppable({
                tolerance: 'intersect',
                over: function() {
						//alert('drop');
                       //$(this).removeClass('out').addClass('over');
                },
                out: function() {
						//alert('out');
                        //$(this).removeClass('over').addClass('out');
                },
                drop: function() {
                        //var answer = confirm('Permantly delete this item?');
                        //$(this).removeClass('over').addClass('out');
						//alert(imagenya);
						$(this).css("background-image","url("+imagenya+")");
						$(this).attr("value",iditem);
                }
        });
		
		$("#loading-status").ajaxStart(function(){
			$(this).show();
		}).ajaxStop(function(){
			$(this).hide();
		});
		
		$('#myform').ajaxForm(function(data) {
//				alert(data);
				var hasiljson = JSON.parse(data);
				if(hasiljson.status == "update data berhasil")
				{
					idsitem = $("input[name='iditem']").val();
					
					$("img[value='"+idsitem+"']").attr("src",hasiljson.img); 
					$("#imageup").attr("src",hasiljson.img); 
					$("#iconup").attr("src",hasiljson.icon);
					
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert(hasiljson.status);
					window.location.reload(true);
				}
				else
				{
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert("update data gagal!");
				}
        });
		
		$('#myformm').ajaxForm(function(data) {
				var hasiljson = JSON.parse(data);
				if(hasiljson.status == "update data berhasil")
				{
					idsitem = $("input[name='iditem']").val();
					
					$("img[value='"+idsitem+"']").attr("src",hasiljson.img); 
					$("#imageup").attr("src",hasiljson.img); 
					$("#iconuppx").attr("src",hasiljson.icon);
					
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert(hasiljson.status);
					window.location.reload(true);
				}
				else
				{
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert("update data gagal!");
				}
        });
		
		$('#myinputformm').ajaxForm(function(data) {
//alert(data);
				var hasiljson = JSON.parse(data);
				if(hasiljson.status == "input data berhasil")
				{	
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert(hasiljson.status);
					window.location.reload(true);
				}
				else
				{
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert("update data gagal!");
				}
        });
		
		$(":checkbox").change(function(e){
			  $(this).val( $(this + ":checked").length > 0 ? "true" : "false");
			})
		
		$('#myinputform').ajaxForm(function(data) {
//alert(data);
				var hasiljson = JSON.parse(data);
				if(hasiljson.status == "input data berhasil")
				{
					var jumlahel = $("#itemcontainer > .imgku").length;
					
					$('#itemcontainer').prepend("<img value='"+hasiljson.id+"' width=90 height=90 class=imgku id='my"+(jumlahel+1)+"' src='"+hasiljson.img+"'/><br/><hr/>").hide().fadeIn('slow'); 
					
					$("img[id^='my']").unbind('click');
					$("img[id^='my']").draggable('destroy');		
					
					$("img[id^='my']").bind('click',function(){
						id = $(this).attr("value");
						$.ajax({
							type: "POST",
							url: base_url + "/index.php/ajax/getajaxitem",
							data: { id: id }
						}).done(function( msg ) {
							jsonparsing = jQuery.parseJSON(msg);
							$("input[name='iditem']").val(jsonparsing.id);
							$("input[name='title']").val(jsonparsing.title);
							$("input[name='label']").val(jsonparsing.label);
							$("select[name='rating']").val(jsonparsing.rating);
							$("select[name='action']").val(jsonparsing.id_action);
							$("textarea[name='desc']").html(jsonparsing.label);
							$("#iconup").attr("src",base_url + "/"+jsonparsing.iconlink);
							$("#imageup").attr("src",base_url + "/"+jsonparsing.imagelink);
							$("select[name='aid_category']").val(jsonparsing.id_category);
							//$("select[name='aid_scategory']").val(jsonparsing.subcat);
							$("select[name='flag']").val(jsonparsing.flagg);
					
						});
					});
		
					$("img[id^='my']").draggable({
						appendTo: 'body',
						containment: 'window',
						scroll: false,
						helper: 'clone',
						revert: true,
						start: function(event, ui) {
							id = $(this).attr("value");
							$.ajax({
								type: "POST",
								url: base_url + "/index.php/ajax/getajaxitem",
								data: { id: id }
							}).done(function( msg ) {
								jsonparsing = jQuery.parseJSON(msg);
								$("input[name='iditem']").val(jsonparsing.id);
								$("input[name='title']").val(jsonparsing.title);
								$("input[name='label']").val(jsonparsing.label);
								$("select[name='rating']").val(jsonparsing.rating);
								$("select[name='action']").val(jsonparsing.id_action);
								$("textarea[name='desc']").html(jsonparsing.label);
								$("#iconup").attr("src",base_url + "/"+jsonparsing.iconlink);
								$("#imageup").attr("src",base_url + "/"+jsonparsing.imagelink);
								$("select[name='aid_category']").val(jsonparsing.id_category);
								//$("select[name='aid_scategory']").val(jsonparsing.subcat);
								$("select[name='flag']").val(jsonparsing.flagg);
							});
						},
						drag: function(event, ui) {
							imagenya = $(this).attr("src");
							iditem = $(this).attr("value");
							if (false) {
								$(this).draggable("option", "revert", false);
							}
						}
			
					});
					
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert(hasiljson.status);
					window.location.reload(true);
				}
				else
				{
					$("#popup").hide();
					$("#popupi").hide();
					$("#popupp").hide();
					$("#popupc").hide();
					alert("input data gagal!");
				}
        });
		
});
