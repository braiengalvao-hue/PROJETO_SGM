// Seleciona o formulário e "escuta" o momento do clique no botão de enviar
document.getElementById('formLogin').addEventListener('submit', async (e) => {
    
    // 1. Impede a página de recarregar (comportamento padrão do formulário)
    e.preventDefault(); 

    // 2. Pega o que foi DIGITADO nos campos (usando .value)
    const email = document.getElementById('email').value; 
    const senha = document.getElementById('senha').value;
    const msg = document.getElementById('mensagem');

// Substitua a parte do fetch por esta:
try {
    const response = await fetch('controllers/login_controller.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email, senha: senha })
    });

    // Em vez de text() e depois JSON.parse(), use direto .json()
    const result = await response.json();

    if (result.success) {
        window.location.href = 'dashboard.php';
    } else {
        msg.innerHTML = result.message;
    }
} catch (error) {
    console.error("Erro na requisição ou JSON inválido", error);
    msg.innerHTML = "Erro ao processar login.";
}
});