<?php

incluir " banco.php " ;

$pdo =  Banco :: conectar () ;

// Protegendo contra XSS e SQL Injection
$email = filtro_entrada ( INPUT_POST , ' e-mail ' , FILTRO_SANITIZAR_EMAIL ) ;
$senha = filtro_entrada ( INPUT_POST , ' senha ' , FILTRO_SANITIZAR_CARACTERES_ESPECIAIS ) ; // Hash da senha

// Consulta otimizada buscando apenas os campos necessários
$validarlogin = $pdo -> prepare ( " SELECIONE * DE tb alunos ONDE email = :email E pass = :senha " ) ;
$validarlogin -> bindParam ( ' email ' , $email ) ;
$validarLogin -> bindParam ( ' :senha ' , $senha ) ;
$validarlogin -> executar () ;

se ( $validarLogin -> rowCount () >= 1 ) {

$usuario = $validarlogin -> buscar ( PDO :: FETCH_ASSOC ) ;

    cabeçalho ( ' Localização: Index.php ' ) ; // Redireciona para uma página segura
    saída () ; }
outro {

? >
  < roteiro >
    alert ( " Usuário não encontrado " ) ;
  </ script >
<?php
}

? >
<! TIPO DE DOC html >
< html idioma = " pt-br " >
< cabeça >
  < meta conjunto de caracteres = " UTF-8 " >
  < title > Entrar </ title >
  < ligação rel = " folha de estilo " href = " https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css " >
  < ligação rel = " folha de estilo " href = " ./assets/css/estilo.css "
</cabeçalho >

< corpo >
     < seção classe = " vh-100 " >
       < divisão classe = " container-fluido h-custom " >
         < divisão classe = " linha d-flex justificar-conteúdo-centralizar-itens-centralizar-h-100 " > <
           < divisão classe = " col-md-9 col-lg-6 col-x1-5 " >
            < imagem src = " ../aula_Php/assets/img/login.png "
               classe = " ing-fluido " alt = " Imagem de amostra " >
            </div>

            < divisão classe = " col-md-3 col-lg-6 col-xl-4 deslocamento-xl-1 " >
              < formulário método = " postar " ação = " login.php " >

              < divisão classe = " divisor d-flex alinhar-itens-centro meu-4 " >
                < p classe = " peso-da-fonte-negrito " > LOGIN/p>
              </div>

        < divisão dados-mdb-entrada-init classe = " formulário-contorno ab-4 " >
        <!-- Entrada de e-mail -->
          < entrada tipo = " e-mail " id = " form3Exemplo3 " classe = " formulário-controle formulário-controle-lg "
          espaço reservado = " Insira um endereço de e-mail válido " nome = " e-mail " />
          < rótulo classe = " formulário-rótulo " para = " form3Example3 " > Endereço de e-mail </ label >
           </div>

           <!--Entrada de senha -->

           < divisão dados-mdb-entrada-init classe = " formulário-contorno mb-3 " >
             < entrada tipo = " senha " id = " form3Exemplo4 " classe = " formulário-controle formulário-controle-lg "
             placeholder = " Digite a senha " nome = " senha " />
             < rótulo classe = " formulário-rótulo " para = " formulário Exemplos " > Senha </ label >
           </div>

           < divisão classe = " d-flex justificar-conteúdo-entre-alinhar-itens-centralizar " >

           <!-- Caixa de seleção -->
           < divisão classe = " formulário-verificação mb-0 " >
            < entrada classe = " formulário-verificação-entrada me-2 " tipo = " caixa de seleção " valor = "" id = " form2Exemplo3 " />
             < rótulo classe = " formulário-verificação-rótulo " para = " form2Exemplo3 " > Lembrar de mim </ label >
            </div>

            < um href = " em " class = " text-body " > Esqueceu a senha? </ a >

        </div>

        < divisão classe = " texto-centro texto-lg-start mt-4 pt-2 " >
          < entrada tipo = " enviar " classe = " btn btn-primário btn-lg " valor = " Entrar " estilo = " preenchimento-esquerda: 2,5 rem; preenchimento-direita: 2,5 rem; " >

          < p class = " small fw-bold mt-2 pt-1 mb-0 " > Não tem uma conta? < a href = " # "
           class = " link-danger " > Registrar </ a ></ p >
        </div>
       </ formulário >
      </div>
     </div>
    </div>
 
</ seção >
< divisão
     classe = " d-flex flex-column flex-md-row texto-centralizado texto-md-start justificar-conteúdo-entre ру-4 px-4 px-x1-5 bg-primary " >

     <!--Direitos autorais-->
        < divisão classe = " texto-branco mb-3 mb-md-0 " >
Copyright © 2020. Todos os direitos reservados.
        </div>
         <!--Direitos autorais-->
        </div>
</ corpo >
</ html >