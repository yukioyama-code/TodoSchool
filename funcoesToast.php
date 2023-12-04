<?php
	function cadastroSucesso(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'success',
  		title: 'Cadastro efetuado com sucesso!'
	})",


	'</script>';

}

function duplicidadeUsuario(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'error',
  		title: 'Erro! Usuário já cadastrado!'
	})",


	'</script>';

}

function falhaLogin(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'error',
  		title: 'E-mail ou senha incorretos!'
	})",


	'</script>';

}

function buscaVazio(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.fire({
  		icon: 'error',
  		title: 'Erro!',
  		text: 'Não foi digitado nenhum dado para pesquisa!',
  		footer: 'Tente novamente'
		})",


	'</script>';

}

function listaVazia(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.fire({
  		icon: 'error',
  		title: 'Erro!',
  		text: 'Nenhum registro foi encontrado!',
  		footer: 'Tente novamente'
		})",


	'</script>';

}

function confirmaExclusaoDisc($nomeDisciplina, $emailUsuario){
	echo '<script type="text/javascript">',
	"const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: 'Confirma remover a disciplina?',
		text: 'Essa operação é irreversível!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sim, remova!',
		cancelButtonText: 'Não, cancele!',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {
			 			
		  swalWithBootstrapButtons.fire(
			'Deletado!',
			'Disciplina excluída com sucesso.',
			'success'
		
			

			
		  )
		  setTimeout(function() {
			window.location.href = 'confirmaExclusaoDisciplina.php?confimacao=sim&nome=$nomeDisciplina&email=$emailUsuario';
		}, 1000);
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'Seu registro continua seguro :)',
			'error'
		  )
		  setTimeout(function() {
			window.location.href = 'gerenciadorDisciplina.php'; 
		}, 1000);
		  
		}
	  })",

	'</script>';
	}

	function duplicidadeDisciplina(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'error',
  		title: 'Erro! Disciplina já cadastrada!'
	})",


	'</script>';

}
function disciplinaSucesso(){
	echo '<script type="text/javascript">',
	"const Toast = Swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 3000,
	  timerProgressBar: true,
	  didOpen: (toast) => {
	toast.addEventListener('mouseenter', Swal.stopTimer)
	toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

	Toast.fire({
	  icon: 'success',
	  title: 'Disciplina cadastrada com sucesso!'
})",


'</script>';

}

function confirmaAlteracaoDisc($nomeDisciplina, $emailUsuario){
	echo '<script type="text/javascript">',
	"const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: 'Confirma alterar a disciplina?',
		text: 'O resgistro será alterado!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sim, remova!',
		cancelButtonText: 'No, cancele!',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {
			 			
		  swalWithBootstrapButtons.fire(
			'Deletado!',
			'Disciplina alterada com sucesso.',
			'success'
		
			

			
		  )
		  setTimeout(function() {
			
		}, 1000);
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'Seu registro continua seguro :)',
			'error'
		  )
		  setTimeout(function() {
			window.location.href = 'gerenciadorDisciplina.php'; 
		}, 1000);
		  
		}
	  })",

	'</script>';
	}

	function disciplinaAlterSucesso(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
		  toast: true,
		  position: 'top-end',
		  showConfirmButton: false,
		  timer: 3000,
		  timerProgressBar: true,
		  didOpen: (toast) => {
		toast.addEventListener('mouseenter', Swal.stopTimer)
		toast.addEventListener('mouseleave', Swal.resumeTimer)
	  }
	})
	
		Toast.fire({
		  icon: 'success',
		  title: 'Disciplina alterada com sucesso!'
	})",
	
	
	'</script>';
	
	}

	function erroSelectDisc(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'error',
  		title: 'Erro! Disciplina não selecionada!'
	})",


	'</script>';

}

function atividadeSucesso(){
	echo '<script type="text/javascript">',
	"const Toast = Swal.mixin({
	  toast: true,
	  position: 'top-end',
	  showConfirmButton: false,
	  timer: 3000,
	  timerProgressBar: true,
	  didOpen: (toast) => {
	toast.addEventListener('mouseenter', Swal.stopTimer)
	toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

	Toast.fire({
	  icon: 'success',
	  title: 'Atividade cadastrada com sucesso!'
})",


'</script>';

}


function confirmaExclusaoAtividade($codigo){
	echo '<script type="text/javascript">',
	"const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: 'Confirma remover a atividade?',
		text: 'Essa operação é irreversível!',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sim, remova!',
		cancelButtonText: 'Não, cancele!',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {
			 			
		  swalWithBootstrapButtons.fire(
			'Deletado!',
			'Atividade excluída com sucesso.',
			'success'
		
			

			
		  )
		  setTimeout(function() {
			window.location.href = 'confirmaExclusaoAtividade.php?confimacao=sim&codigo=$codigo';
		}, 1000);
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'Seu registro continua seguro :)',
			'error'
		  )
		  setTimeout(function() {
			window.location.href = 'gerenciamentoDeAtividades.php'; 
		}, 1000);
		  
		}
	  })",

	'</script>';
	}

	function alteracaoAtividadeCorreta(){
		echo '<script type="text/javascript">',
		"const Toast = Swal.mixin({
  		toast: true,
  		position: 'top-end',
  		showConfirmButton: false,
  		timer: 3000,
  		timerProgressBar: true,
  		didOpen: (toast) => {
    	toast.addEventListener('mouseenter', Swal.stopTimer)
    	toast.addEventListener('mouseleave', Swal.resumeTimer)
 	 }
	})

		Toast.fire({
  		icon: 'success',
  		title: 'Atividade alterada com sucesso!'
	})",


	'</script>';

}


function modalDisciplina(){
	echo '<script type="text/javascript">',
"const Toast = Swal.fire({
	title: '<strong>HTML <u>example</u></strong>',
	icon: 'info',
	html:
	  'You can use <b>bold text</b>, ' +
	   'and other HTML tags',
	showCloseButton: true,
	showCancelButton: true,
	focusConfirm: false,
	confirmButtonText:
	  '<i class='fa fa-thumbs-up'></i> Great!',
	confirmButtonAriaLabel: 'Thumbs up, great!',
	cancelButtonText:
	  '<i class='fa fa-thumbs-down'></i>',
	cancelButtonAriaLabel: 'Thumbs down'
  })",

	  '</script>';

}

function redirecionaCadastroUsuario(){
	
}
?>

