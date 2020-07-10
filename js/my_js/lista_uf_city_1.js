

var estados = [];

function loadEstados(element) {
  if (estados.length > 0) {
    putEstados(element);
    $(element).removeAttr('disabled');
  } else {
    $.ajax({
      url: 'https://api.myjson.com/bins/enzld',
      method: 'get',
      dataType: 'json',
      beforeSend: function() {
        $(element).html('<option>Carregando...</option>');
      }
    }).done(function(response) {
      estados = response.estados;
      putEstados(element);
      $(element).removeAttr('disabled');
    });
  }
}

function putEstados(element) {

  var label = $(element).data('label');
  label = label ? label : 'Estado';

  var options = '<option value="">' + label + '</option>';
  for (var i in estados) {
    var estado = estados[i];
    options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
  }

  $(element).html(options);
}

function loadCidades(element, estado_sigla) {
  if (estados.length > 0) {
    putCidades(element, estado_sigla);
    $(element).removeAttr('disabled');
  } else {
    $.ajax({
      url: theme_url + '/assets/json/estados.json',
      method: 'get',
      dataType: 'json',
      beforeSend: function() {
        $(element).html('<option>Carregando...</option>');
      }
    }).done(function(response) {
      estados = response.estados;
      putCidades(element, estado_sigla);
      $(element).removeAttr('disabled');
    });
  }
}

function putCidades(element, estado_sigla) {
  var label = $(element).data('label');
  label = label ? label : 'Cidade';

  var options = '<option value="">' + label + '</option>';
  for (var i in estados) {
    var estado = estados[i];
    if (estado.sigla != estado_sigla)
      continue;
    for (var j in estado.cidades) {
      var cidade = estado.cidades[j];
      options += '<option value="' + cidade + '">' + cidade + '</option>';
    }
  }
  $(element).html(options);
}

document.addEventListener('DOMContentLoaded', function() {
  loadEstados('#uf');
  $(document).on('change', '#uf', function(e) {
    var target = $(this).data('target');
    if (target) {
      loadCidades(target, $(this).val());
    }
  });
}, false);

$(document).ready(function () {
    var pais_1 = [ 
		"Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Antigua and Barbuda",
		"Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados",
		"Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana",
		"Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde",
		"Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo, Democratic Republic",
		"Congo, Republic of the", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark",
		"Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea",
		"Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana",
		"Greece", "Greenland", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong",
		"Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan",
		"Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia",
		"Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar",
		"Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia",
		"Moldova", "Mongolia", "Morocco", "Monaco", "Mozambique", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand",
		"Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru",
		"Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Samoa", "San Marino", " Sao Tome",
		"Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia",
		"Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden",
		"Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago",
		"Tunisia", "Turkey", "Turkmenistan", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States",
		"Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
	]; 
    var combobox = $("#pais_1");
    for (var i = 0; i < pais_1.length; i++) {
        combobox.append($('<option>', {value: pais_1[i], text: pais_1[i]}));
    }
    combobox.show();
  });

































// function montaCidade(estado, pais){
// 	$.ajax({
// 		type:'GET',
// 		url:'http://api.londrinaweb.com.br/PUC/Cidades/'+estado+'/'+pais+'/0/10000',
// 		contentType: "application/json; charset=utf-8",
// 		dataType: "jsonp",
// 		async:false
// 	}).done(function(response){
// 		cidades='';
// 		$.each(response, function(c, cidade){
// 			cidades+='<option value="'+cidade+'">'+cidade+'</option>';
// 		});
// 		// PREENCHE AS CIDADES DE ACORDO COM O ESTADO
// 		$('#cidade').html(cidades);
// 	});
// }

// function montaUF(pais){
// 	$.ajax({
// 		type:'GET',
// 		url:'http://api.londrinaweb.com.br/PUC/Estados/'+pais+'/0/10000',
// 		contentType: "application/json; charset=utf-8",
// 		dataType: "jsonp",
// 		async:false
// 	}).done(function(response){
// 		estados='';
// 		$.each(response, function(e, estado){
// 			estados+='<option value="'+estado.UF+'">'+estado.Estado+'</option>';
// 		});

// 		// PREENCHE OS ESTADOS BRASILEIROS
// 		$('#estado').html(estados);
// 		// CHAMA A FUNÇÃO QUE PREENCHE AS CIDADES DE ACORDO COM O ESTADO
// 		montaCidade($('#estado').val(), pais);
// 		// VERIFICA A MUDANÇA NO VALOR DO CAMPO ESTADO E ATUALIZA AS CIDADES
// 		$('#estado').change(function(){
// 			montaCidade($(this).val(), pais);
// 		});
// 	});
// }

// function montaPais(){
// 	$.ajax({
// 		type:	'GET',
// 		url:	'http://api.londrinaweb.com.br/PUC/Paisesv2/0/1000',
// 		contentType: "application/json; charset=utf-8",
// 		dataType: "jsonp",
// 		async:false
// 	}).done(function(response){		
// 		paises='';
// 		$.each(response, function(p, pais){
// 			if(pais.Pais == 'Brasil'){
// 				paises+='<option value="'+pais.Sigla+'" selected>'+pais.Pais+'</option>';
// 			} else {
// 				paises+='<option value="'+pais.Sigla+'">'+pais.Pais+'</option>';
// 			}
// 		});

// 		// PREENCHE O SELECT DE PAÍSES
// 		$('#pais').html(paises);
// 		// PREENCHE O SELECT DE ACORDO COM O VALOR DO PAÍS
// 		montaUF($('#pais').val());
// 		// VERIFICA A MUDANÇA DO VALOR DO SELECT DE PAÍS
// 		$('#pais').change(function(){
// 			if($('#pais').val() == 'BR'){
// 				// SE O VALOR FOR BR E CONFIRMA OS SELECTS
// 				$('#estado').remove();
// 				$('#cidade').remove();
// 				$('#campo_estado').append("<select class='select form-control input-sm' name='candidato['estado_1']' id='estado'>");
// 				$('#campo_cidade').append('<select id="cidade"></select>');
// 				// CHAMA A FUNÇÃO QUE MONTA OS ESTADOS
// 				montaUF('BR');		
// 			} else {
// 				// SE NÃO FOR, TROCA OS SELECTS POR INPUTS DE TEXTO
// 				$('#estado').remove();
// 				$('#cidade').remove();
// 				$('#campo_estado').append('<input type="text" class="form-control" id="estado">');
// 				$('#campo_cidade').append('<input type="text" id="cidade">');
// 			}
// 		})
// 	});
// }
// montaPais();