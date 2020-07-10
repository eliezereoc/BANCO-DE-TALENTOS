




//estilo do campo de upulod de arquivo
$('#files').filestyle({
  buttonBefore : true,
  text : 'Buscar Arquivo',
  btnClass : 'btn-outline-primary',
  size : 'lg'
})


	
//Passa os dados do cliente para o Modal, e atualiza o link para exclusão
// $('#delete-modal').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget);
//   var id = button.data('cliente');  
//   var modal = $(this);
//   modal.find('.modal-title').text('Excluir Cliente ' + id);
//   modal.find('#confirm').attr('href', 'delete_usuario.php?id=' + id);
// })

 //retorna a pagina anterior
 //adicionar onclick="goBack()" no botão
//  function goBack() {
//   window.history.back()
// }
  
$("input[id*='cpf']").inputmask({
    mask: ['999.999.999-99'],
    keepStatic: true
});

$("input[id*='cnpj']").inputmask({
    mask: ['99.999.999/9999-99'],
    keepStatic: true
});

$("input[id*='cep']").inputmask({
    mask: ['99.999-999'],
    keepStatic: true
});

$("input[id*='tel']").inputmask({
    mask: ['(99)9999-9999'],
    keepStatic: true
});

$("input[id*='cel']").inputmask({
    mask: ['(99)9 9999-9999'],
    keepStatic: true
});

// //passa a cidade com base no estado escolhido
// new statesCitiesBR({
//     states: {
//       elementID: "selects_estados",
//       defaultOption: "Selecione um Estado"
//     },
//     cities: {
//       elementID: "selects_cidades",
//       state: "auto",
//       defaultOption: "Selecione uma Cidade"
//     }
// });


