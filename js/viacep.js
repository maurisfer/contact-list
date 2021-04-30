jQuery('input[name=zipcode]').mask('00000-000');

const inputs = document.querySelectorAll('form input:not(.id_contact)'); // SELECIONA TODOS OS INPUTS
const zipcode = Array.from(inputs).find(input => input.name === 'zipcode'); //BUSCA O ELEMENTO ALVO

const error = (data) => {
    alert(data);
}

const updateFields = ({data, status}) => {
   if(data.erro || status !== 200){
       error("Falha ao localizar o CEP");
       return;
   } //CONSOME A RESPOSTA DA REQUISIÇÃO E DISPARA ERRO

    zipcode.addEventListener('input', ({currentTarget}) => { //ADICIONA EVENTO DE ALTERAÇÃO NO INPUT ALVO
        const value = currentTarget.value.replace('-', ''); //RETIRA O TRAÇO DO CEP

        if(value.length >= 8){ // VERIFICA O TAMANHO DO VALOR DO INPUT
            /*fetch(`https://viacep.com.br/ws/${value}/json`)
                .then(res => res.json())
                .then(resp => updateFields(resp)).catch(error => console.log(error));*/

            /*new Ajax.Request(`https://viacep.com.br/ws/${value}/json`, {
                method: 'get',
                onSuccess: updateFields,
                onFailure:  failureFunc
            });*/
            // CHAMA OS DADOS DA API DO VIA CEP
            axios.get(`https://viacep.com.br/ws/${value}/json`)
                .then(function (response) {
                    updateFields(response); //PASSA O RESPONSE.DATA PRA FUNÇÃO QUE ATUALIZA OS CAMPOS NO FORM
                })
                .catch(function (err) {
                    error(err);
                });
        }
    });

    Array.from(inputs).forEach((input) => {

        //LOCALIZA OS ELEMENTOS COM DATA-NAME IGUAL AOS CAMPOS DA RESPOSTA
        const name = input.getAttribute('data-name'); //RETORNA O DATA-NAME

        // VALIDA EM TERNÁRIO SE O ELEMENTO COM DATA-NAME EXISTE E ATUALIZA COM OS VALORES DA RESPONSE
        const value = (data[name]) ?? ""; //PASSA PRO VALUE O VALOR DE DATA QUE TEM O NAME QUE VEIO DO ELEMENTO

        //VALIDA SE HÁ DADOS E SE O ELEMENTO NÃO É O CEP E TRAVA A EDIÇÃO DOS CAMPOS AUTOPREENCHIDOS
        if(value && name !== 'cep'){
            input.readOnly = true;
        }else{
            input.readOnly = false; //SE NÃO TIVER DADOS EM CEPS GENÉRICOS PERMITE EDIÇÃO DOS CAMPOS VAZIOS
        }

        //PASSA O VALOR RETORNADO PARA O INPUT
        input.setAttribute("value", value);

    }); // CONSOME A RESPOSTA DA REQUISIÇÃO
}


//Find() retorna primeira correspondenci exata;
//Filter() retorna todos os que contéma  condição; retorna um array

/*<p> currentTarget - elemento total
    <span>1</span> -> target recupe o elemento especifico dentro do elemento PAI
    <span>2</span>
    <span>3<span>
    <span>4</span>
</p>*/