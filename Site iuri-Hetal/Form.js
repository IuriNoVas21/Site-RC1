
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

registerLink.addEventListener('click', () => {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
  wrapper.classList.remove('active');
});

const mostrarSenha = document.getElementById('mostrarSenha');
const senhaInput = document.getElementById('senha');

mostrarSenha.addEventListener('click', function() {
    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        mostrarSenha.innerHTML = '<ion-icon name="unlock"></ion-icon>';
    } else {
        senhaInput.type = 'password';
        mostrarSenha.innerHTML = '<ion-icon name="lock"></ion-icon>';
    }
});
