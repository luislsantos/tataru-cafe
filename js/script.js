//Função para formatar número de telefone enquanto o usuário digita
document.getElementById('telefone').addEventListener('input', function(e){
    let input = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
            input = input.substring(0, 11); // Limit to 11 digits
            if (input.length > 2 && input.length <= 7) {
                input = input.replace(/(\d{2})(\d{1,5})/, '($1)$2');
            } else if (input.length > 7) {
                input = input.replace(/(\d{2})(\d{5})(\d{1,4})/, '($1)$2-$3');
            }
            e.target.value = input;
})

//Função para formatar número de CPF enquanto o usuário digita
document.getElementById('cpf').addEventListener('input', function (e) {
    let input = e.target.value.replace(/\D/g, ''); // Remove all non-digit characters
    input = input.substring(0, 11); // Limit to 11 digits
    if (input.length > 3 && input.length <= 6) {
        input = input.replace(/(\d{3})(\d{1,3})/, '$1.$2');
    } else if (input.length > 6 && input.length <= 9) {
        input = input.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
    } else if (input.length > 9) {
        input = input.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
    }
    e.target.value = input;
});

document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById('form-cadastro');
    const senha = document.getElementById('senha');
    const confirmaSenha = document.getElementById('confirma-senha');

    form.addEventListener('submit', function(event) {
        /*
        // Validação padrão da senha
        if (!senha.checkValidity()) {
            alert('Senha inválida: ' + senha.validationMessage);
            event.preventDefault(); // Impede o envio do formulário
            return;
        }*/

        // Validação personalizada da confirmação de senha
        if (senha.value !== confirmaSenha.value) {
            confirmaSenha.setCustomValidity('As senhas não coincidem.');
            //alert('As senhas não coincidem.');
            event.preventDefault(); // Impede o envio do formulário
        } else {
            confirmaSenha.setCustomValidity(''); // Define a mensagem de erro personalizada como vazia
        }
    });

    // Limpa a mensagem de erro personalizada quando o usuário altera o campo de confirmação de senha
    confirmaSenha.addEventListener('input', function() {
        if (senha.value === confirmaSenha.value) {
            confirmaSenha.setCustomValidity('');
        }
    });
});