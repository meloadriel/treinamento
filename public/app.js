const botaoAdicionarTelefone = document.querySelector(
    "#botaoAdicionarTelefone"
);
const divTelefones = document.querySelector("#grupoTelefones");

botaoAdicionarTelefone.addEventListener("click", (ev) => {
    ev.preventDefault();
    const selects = document.querySelectorAll("select");
    if (selects.length < 2) {
        criarCampoTelefone();
    } else {
        alert("Você só pode cadastrar dois telefones");
    }
});

function criarCampoTelefone() {
    divTelefones.innerHTML += `

        <div class="flex px-2">
            <select name="tipos[]" id="tipo">
                 <option value='1'>
                    Fixo
                 </option>
                 <option value='2'>
                     Celular
                 </option>
             </select>
            <input type="text" id="telefones" name="telefones[]" class="w-full px-2 py-1 text-sm "
                               required placeholder="Digite o seu telefone">
        </div>
    `;
}
