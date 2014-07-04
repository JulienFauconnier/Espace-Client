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