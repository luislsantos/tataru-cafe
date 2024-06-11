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