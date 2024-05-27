const botaoAdicionarTelefone = document.querySelector(
    "#botaoAdicionarTelefone"
);
const divTelefones = document.querySelector("#grupoTelefones");

botaoAdicionarTelefone.addEventListener("click", (ev) => {
    ev.preventDefault();
    const selects = document.querySelectorAll('select');
    if(selects.length < 2){

        criarCampoTelefone();
    } else{
        alert('Você só pode cadastrar dois telefones');
    }
});

function criarCampoTelefone() {
    divTelefones.innerHTML += `
        <div>
            <input type="text" id="telefones" name="telefones[]" required placeholder="Digite o seu telefone">

             <select name="tipos[]" id="tipo">
                <option value='1'>
                    Fixo
                </option>
                <option value='2'>
                    Celular
                </option>
            </select>
        </div>
    `;
}

