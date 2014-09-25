<?php
DEFINE("SRC", "../src/ES/");
/* Autoloader */
require_once SRC . 'Autoloader/SplClassLoader.php';
$loader = new SplClassLoader('ES', '../src');
$loader->register();

use ES\Form\Form;
use ES\Form\Validator;
use ES\Form\Request;
use ES\Form\Interfaces\iRender;
use ES\Form\Interfaces\iRadio;
use ES\Form\Interfaces\iCheckbox;
use ES\Form\Interfaces\iOptions;
use ES\Form\Fields\InputText;
use ES\Form\Fields\Email;
use ES\Form\Fields\Password;
use ES\Form\Fields\Select;
use ES\Form\Fields\TextArea;
use ES\Form\Fields\RadioButton;
use ES\Form\Fields\Checkbox;
use ES\Form\Fields\ButtonSubmit;
use ES\Form\Fields\FieldSet;
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Projeto III - Formulário dinâmico</title>

        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css">
        <link rel="stylesheet" href="assets/css/styles.css">        

    </head>
    <body>


                <?php
                $request = new Request;
                $validator = new Validator($request);
                $form = new Form($validator);


                /* === Formulário de cadastro de usuário === */
                $cadastro_user = clone $form;                
                
                $dados = new FieldSet("Dados Pessoais");                
                $nome = new InputText("Nome", "firstname");
                $dados->AddFieldSet($nome);                
                $sobrenome = new InputText("Sobrenome", "lastname");
                $dados->AddFieldSet($sobrenome);
                $cadastro_user->CreateField($dados);
                
                
                
                $login = new FieldSet("Dados de acesso");
                $email = new Email("E-mail", "email");
                $login->AddFieldSet($email);
                $senha = new Password("Senha", "password");
                $login->AddFieldSet($senha);
                $cadastro_user->CreateField($login);
                
                
                
                $endereco = new FieldSet("Endereço");
                $rua = new InputText("Rua", "street");
                $endereco->AddFieldSet($rua);
                $bairro = new InputText("Bairro", "district");
                $endereco->AddFieldSet($bairro);
                $cidade = new InputText("Cidade", "city");
                $endereco->AddFieldSet($cidade);
                $estado = new Select("Qual o estado?", "uf");
                                $estado->setOptions("São Paulo");
                                $estado->setOptions("Rio de Janeiro");
                                $estado->setOptions("Bahia");
                $endereco->AddFieldSet($estado);
                $cadastro_user->CreateField($endereco);
                
                
                
                $cadastro_user->CreateField(new ButtonSubmit("Cadastrar"));
                
                
                
                $cadastro_user->setTitle("Cadastro de usuário");
                $cadastro_user->setName("cadastro");
                $cadastro_user->setAction("index.php");
                $cadastro_user->setMethod("post");
                echo $cadastro_user->Render();
                ?>


    </body>
</html>

