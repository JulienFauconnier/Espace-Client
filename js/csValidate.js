$(document).foundation({
	abide : {
		validators: {
			valid_siret: function(el, required, parent) {
				var siret=el.value.replace(/\s/g, '');
				if(siret !=''){
					if(siret.length != 14){
						return false;
					}
					else{
						var somme = 0;
						var tmp;
						for (var cpt = 0; cpt<14; cpt++) {
							if ((cpt % 2) == 0) {
								tmp = siret.charAt(cpt) * 2;
								if (tmp > 9){
									tmp -= 9;
								}
							}
							else{
								tmp = siret.charAt(cpt);
							}
							somme += parseInt(tmp);
						}
						if ((somme % 10) != 0){
							return false;
						}
						else{
							return true;
						}
					}
				}
				else{
					return true;
				}
			},
			valid_naf: function(el, required, parent) {
				var naf=el.value.replace(/\s/g, '');
				if(naf !=''){
					if(naf.length != 5){
						return false;
					}
					else{
						for (var cpt = 0; cpt<4; cpt++){
							if(naf[cpt] < 0 || naf[cpt] > 9)
								return false
						}
						if (naf[4] < "A" || naf[4] > "Z"){
							return false;
						}
						return true;
					}
				}
				else{
					return true;
				}
			},
			// valid_rcs: function(el, required, parent) {
			// 	var rcs=el.value.replace(/\s/g, '');
			// 	if(rcs !=''){
			// 		if(crs.length != 5){
			// 			return false;
			// 		}
			// 		else{
			// 			for (var cpt = 0; cpt<4; cpt++){
			// 				if(rcs[cpt] < 0 || rcs[cpt] > 9)
			// 					return false
			// 			}
			// 			if (rcs[4] < "A" || rcs[4] > "Z"){
			// 				return false;
			// 			}
			// 			return true;
			// 		}
			// 	}
			// 	else{
			// 		return true;
			// 	}
			// },
			valid_vat: function(el, required, parent) {
				var vat=el.value.replace(/\s/g, '');
				if(vat !=''){
					if(vat.length != 13){
						return false;
					}
					else{
						if (vat[0] != "F" || vat[1] != "R"){
							return false;
						}
						if ((vat[2] < 0 || vat[2] > 9)||(vat[3] < 0 || vat[3] > 9)){
							return false;
						}
						var somme = 0;
						var tmp;
						for (var cpt = 4; cpt<13; cpt++) {
							if ((cpt % 2) == 0) {
								tmp = vat.charAt(cpt) * 2;
							}
							else{
								tmp = vat.charAt(cpt);
							}
							somme += parseInt(tmp);
						}
						if ((somme % 10) != 0){
							return false;
						}
						else{
							return true;
						}
					}
				}
				else{
					return true;
				}
			}
		}
	}
});

$(document).ready(function (){

	function print_r(theObj){
		if(theObj.constructor == Array || theObj.constructor == Object){
			document.write("<ul>")
			for(var p in theObj){
				if(theObj[p].constructor == Array || theObj[p].constructor == Object){
					document.write("<li>["+p+"] => "+typeof(theObj)+"</li>");
					document.write("<ul>")
					print_r(theObj[p]);
					document.write("</ul>")
				} else {
					document.write("<li>["+p+"] => "+theObj[p]+"</li>");
				}
			}
			document.write("</ul>")
		}
	}

	function getOld() {
		$.post('inc/getClient.php', function (response){
			var dataC=jQuery.parseJSON(response);
			if(dataC!='') {
				// Récupération Informations "third", data, success
				$("#contactName").val(dataC.third.name);
				$("#thirdEmail").val(dataC.third.email);
				$("#thirdTel").val(dataC.third.tel);
				$("#thirdFax").val(dataC.third.fax);
				$("#thirdMobile").val(dataC.third.mobile);
				$("#thirdWeb").val(dataC.third.web);
				$("#thirdSiret").val(dataC.third.siret);
				$("#thirdVat").val(dataC.third.vat);
				$("#thirdRcs").val(dataC.third.rcs);
				$("#thirdApenaf").val(dataC.third.email);
				$("#thirdCapital").val(dataC.third.capital);

				// Récupération Informations "contact"
				$("#contactName").val(dataC.contact.name);
				$("#contactForename").val(dataC.contact.forename);
				$("#contactEmail").val(dataC.contact.email);
				$("#contactTel").val(dataC.contact.tel);
				$("#contactFax").val(dataC.contact.fax);
				$("#contactMobile").val(dataC.contact.mobile);
				$("#contactPosition").val(dataC.contact.position);

				// Récupération Informations "address"
				$("#addressPart1").val(dataC.address.part1);
				$("#addressPart2").val(dataC.address.part2);
				$("#addressZip").val(dataC.address.zip);
				$("#addressTown").val(dataC.address.town);
				$("#addressCountrycode").val(dataC.address.countrycode);
			}
		});
}

	//getOld();

	$('#submit').click(function (){
		var dataC=[];
		var third=[];
		var contact=[];
		var address=[];

		// Récupération Informations "third"
		if ($("#corporation").hasClass('active')) {
			third['name'] = $("#thirdName").val();
			third['type'] = "corporation";
		}
		else {
			third['name'] = $("#contactName").val();
			third['type'] = "person";
		}
		if ($("#thirdEmail").val() !='') {
			third['email'] = $("#thirdEmail").val();
		};
		if ($("#thirdTel").val() !='') {
			third['tel'] = $("#thirdTel").val();
		};
		if ($("#thirdFax").val() !='') {
			third['fax'] = $("#thirdFax").val();
		};
		if ($("#thirdMobile").val() !='') {
			third['mobile'] = $("#thirdMobile").val();
		};
		if ($("#thirdWeb").val() !='') {
			third['web'] = $("#thirdWeb").val();
		};
		if ($("#thirdSiret").val() !='') {
			third['siret'] = $("#thirdSiret").val();
		};
		if ($("#thirdVat").val() !='') {
			third['vat'] = $("#thirdVat").val();
		};
		if ($("#thirdRcs").val() !='') {
			third['rcs'] = $("#thirdRcs").val();
		};
		if ($("#thirdApenaf").val() !='') {
			third['email'] = $("#thirdApenaf").val();
		};
		if ($("#thirdCapital").val() !='') {
			third['capital'] = $("#thirdCapital").val();
		};
		third['tags'] = "from_website";
    	// Assignation au tableau de dataC
    	dataC['third']=third;

    	console.log("phase 1");

		// Récupération Informations "contact"
		if ($("#contactName").val() !='') {
			contact['name'] = $("#contactName").val();
		};
		if ($("#contactForename").val() !='') {
			contact['forename'] = $("#contactForename").val();
		};
		if ($("#contactEmail").val() !='') {
			contact['email'] = $("#contactEmail").val();
		};
		if ($("#contactTel").val() !='') {
			contact['tel'] = $("#contactTel").val();
		};
		if ($("#contactFax").val() !='') {
			contact['fax'] = $("#contactFax").val();
		};
		if ($("#contactMobile").val() !='') {
			contact['mobile'] = $("#contactMobile").val();
		};
		if ($("#contactPosition").val() !='') {
			contact['position'] = $("#contactPosition").val();
		};
		// Assignation au tableau de dataC
		dataC['contact']=contact;

		// Récupération Informations "address"
		address['name'] = "Bureau";
		if ($("#addressPart1").val() !='') {
			address['part1'] = $("#addressPart1").val();
		};
		if ($("#addressPart2").val() !='') {
			address['part2'] = $("#addressPart2").val();
		};
		if ($("#addressZip").val() !='') {
			address['zip'] = $("#addressZip").val();
		};
		if ($("#addressTown").val() !='') {
			address['town'] = $("#addressTown").val();
		};
		if ($("#addressCountrycode").val() !='') {
			address['countrycode'] = $("#addressCountrycode").val();
		};
		// Assignation au tableau de dataC
		dataC['address']=address;

		console.log(print_r(dataC));

		$.post('inc/createClient.php', {
			params: dataC
		}, function (response){
			// Retour au Sommaire
			// alert(response);
			console.log(response);
			// window.location.href = 'URL_SITE_SPIP';
		});
	});
});