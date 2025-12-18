<!DOCTYPE html>
<html>

<head>
    <style>
        .retangulo {
            width: 100%;
            height: 2.5%;
            background-color: rgb(222, 225, 226);
            display: flex;
            align-items: center;
            text-align: center;
        }

        .texto {
            margin: auto;
            font-weight: bold;
            font-size: 16px;

        }

        .tabelas {
            border: 1px;
            border-style: solid;
            border-color: grey;
            width: 100%;
            border-collapse: collapse;
        }


        #ficha td {
            border: 1px solid rgb(160 160 160);
            padding: 0px 2px;
        }


        .tx {
            line-height: 1.5;
            font-size: 15px;
        }
    </style>

    <style>
        .tela {
            width: 100%;
            height: 100px;
            border: 0px solid black;
            float: center;
            text-align: center;

        }
    </style>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td><img src="{{ asset('img/logo.png') }}" alt="Image" height="60" width="180"></td>
            <td>
                <p style="width: 100%; font-size:28px; font-weight: bold;" align="center">LOCA CAR RENTAL</p>
                <p style="font-size:16px;" align="center">Av: Dr Carlos Botelho, 265 - Centro<br>
                    Pariquera-açu - SP<br>
                    Contato: (13) 98107-1550<br>
                    Email: locadoradecarros13@gmail.com<br>
                </p>
            </td>
        </tr>
    </table>

    <div class="retangulo">
        <span class="texto">FICHA DE LOCAÇÃO</span>
    </div>
    <table>
    </table>
    <div class="retangulo">
        <span class="texto">LOCATÁRIO</span>
    </div>

    <table class="tabelas" width="100%" id='ficha'>
        <tr>
            <td colspan="2">
                <b class="tx">Nome:</b> {{ $locacao->Cliente->nome }}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <b class="tx">Endereço:</b> {{ $locacao->Cliente->endereco }}
            </td>
        <tr>
            <td>
                <b class="tx">Cidade:</b> {{ $locacao->Cliente->Cidade->nome }}
            </td>
            <td>
                <b class="tx">UF:</b> {{ $locacao->Cliente->Estado->nome }}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Rg:</b> {{ $locacao->Cliente->rg }}
            </td>
            <td>
                <b class="tx">Org Exp:</b> {{ $locacao->Cliente->exp_rg }}
            </td>

        </tr>
        <tr>
            <td>
                <b class="tx">Telefones:</b> {{ $tel_1 . ' - ' . $tel_2 }}
            </td>
            <td>
                <b class="tx">CPF/CNPJ:</b> {{ $cpfCnpj }}
            </td>
        </tr>

    </table>
    </table>
    <div class="retangulo">
        <span class="texto">VEÍCULO</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Marca:</b> {{ $locacao->Veiculo->Marca->nome }}
            </td>
            <td>
                <b class="tx">Modelo:</b> {{ $locacao->Veiculo->modelo }}
            </td>
            <td>
                <b class="tx">Chassi:</b> {{ $locacao->Veiculo->chassi }}
            </td>
        </tr>
        <tr>
            <td>
                <b class="tx">Ano:</b> {{ $locacao->Veiculo->ano }}
            </td>
            <td>
                <b class="tx">Cor:</b> {{ $locacao->Veiculo->cor }}
            </td>
            <td>
                <b class="tx">Placa:</b> {{ $locacao->Veiculo->placa }}
            </td>
        </tr>
    </table>
    <div class="retangulo">
        <span class="texto">LOCAÇÃO</span>
    </div>
    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Data da Saída:</b> {{ \Carbon\Carbon::parse($locacao->data_saida)->format('d/m/Y') }}
            </td>
            <td>
                <b class="tx">Hora da Saída:</b> {{ $locacao->hora_saida }}
            </td>

            <td>
                <b class="tx">Data do Retorno:</b>
                {{ \Carbon\Carbon::parse($locacao->data_retorno)->format('d/m/Y') }}
            </td>
            <td>
                <b class="tx">Hora do Retorno:</b> {{ $locacao->hora_retorno }}
            </td>
        </tr>
        <td>
            <b class="tx">Km de Saída:</b> {{ $locacao->km_saida }}
        </td>
        <td>
            @if ($locacao->forma_locacao == 1)
                <b class="tx">Qtd de Diárias:</b> {{ $locacao->qtd_diarias }}
            @elseif($locacao->forma_locacao == 2)
                <b class="tx">Qtd de Semanas:</b> {{ $locacao->qtd_semanas }}
            @endif
        </td>
        <td colspan="2">
            @if ($locacao->forma_locacao == 1)
                <b class="tx">Valor da Diária R$:</b> {{ $locacao->Veiculo->valor_diaria }}
            @elseif($locacao->forma_locacao == 2)
                <b class="tx">Valor da Semana R$:</b> {{ $locacao->Veiculo->valor_semana }}
            @endif
        </td>

        </tr>
        <tr>
            <td>
                <b class="tx">Km de Retorno:</b> {{ $locacao->km_retorno }}
            </td>
            <td>
                <b class="tx">Valor do Desconto R$:</b> {{ $locacao->valor_desconto }}
            </td>
            <td colspan="2">
                <b class="tx">Valor Total R$:</b> {{ $locacao->valor_total_desconto }}
            </td>

        </tr>

    </table>

    <table class="tabelas" id='ficha'>
        <tr>
            <td>
                <b class="tx">Observações: </b> {{ $locacao->obs }}
            </td>
        </tr>
    </table>

    <div style="width: 100%; text-align: center; margin-top: 30px;">
        <p>Pariquera-açu, {{ $dataAtual->isoFormat('DD MMMM YYYY') }}</p>
        <div style="display: inline-block; text-align: center;">
            <div>
                _________________________________________<br>
                LOCADOR: LOCADOR: LOCA CAR RENTAL.<br>
                <span style="font-size:10px;">Proprietário ou representante legal da Empresa</span>
            </div>
            <br>
            <div>
                _________________________________________<br>
                LOCATÁRIO: {{ $locacao->Cliente->nome }}
            </div>
        </div>
    </div>

    <!-- PÁGINA 2 -->

    <style>
        .break {
            page-break-before: always;
        }

        .parag {
            text-align: justify;
            font-size: 12;
        }
    </style>

    <div class="break">
        <h3 style="text-align: center;">CONTRATO PARTICULAR DE LOCAÇÃO DE VEÍCULO POR TEMPO DETERMINADO</h3>

        <p class="parag">
            Pelo presente instrumento particular de locação veicular por prazo determinado, com fulcro nos
            artigos 565 a 578 da Lei 10.406/2002, celebram as partes abaixo qualificadas:
        </p>

        <p class="parag">
            <strong>LOCADOR:</strong> SERGIO ZANELLA RIBEIRO, brasileiro, aposentado, CPF n.º 034.104.828-30,
            residente e domiciliado Pariquera-açu/ São Paulo tendo entre si, certo e ajustado as seguintes
            cláusulas e condições:
        </p>

        <p class="parag">
            <strong>LOCATÁRIO:</strong>{{ $locacao->Cliente->nome }}, brasileiro, CPF n.º
            {{ $cpfCnpj }}, residente e domiciliado em
            {{ $locacao->Cliente->Cidade->nome }}/{{ $locacao->Cliente->Estado->nome }}, tendo entre si, certo
            e ajustado as seguintes cláusulas e condições:
        </p>

        <p class="parag">
            <strong>CLÁUSULA 1ª</strong> – Os primeiros compromitentes, neste instrumento denominados LOCADORES,
            como legítimos proprietários do veículo {{ $locacao->Veiculo->modelo }}, placa:
            {{ $locacao->Veiculo->placa }}, ano/modelo {{ $locacao->Veiculo->ano }}, cor
            {{ $locacao->Veiculo->cor }}, RENAVAM {{ $locacao->Veiculo->renavam }} e estando o mesmo
            devidamente livre e desembaraçado de quaisquer ônus, dívidas e bloqueios, ALUGAM neste ato à segunda
            compromitente, LOCATÁRIO, pelo período compreendido entre
            {{ \Carbon\Carbon::parse($locacao->data_saida)->format('d/m/Y') }} a
            {{ \Carbon\Carbon::parse($locacao->data_retorno)->format('d/m/Y') }}.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 2ª</strong> – O valor ajustado pelo presente aluguel é de R$
            {{ number_format($locacao->Veiculo->valor_diaria, 2, ',', '.') }} por diária, o período de vigência
            do presente instrumento é de {{ $locacao->qtd_diarias }} diárias, totalizando o montante de R$
            {{ number_format($locacao->valor_total_desconto, 2, ',', '.') }}, com o pagamento integral através
            de pix, na data em que a LOCATÁRIO efetivamente tomar posse do veículo.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 3ª</strong> – O veículo, objeto deste contrato, deverá ser entregue pelo LOCADOR em
            perfeitas condições de uso, estando em pleno funcionamento os itens de conforto (ar-condicionado,
            direção hidráulica, vidros e travas elétricas e multimídia), bem como os itens de segurança (cinto
            de segurança, faróis, para-brisas, retrovisores, óleo, pneus, transmissão, motor, freios e outros),
            sendo ainda, responsável pela manutenção preventiva.
        </p>

        <p class="parag" style="margin-left: 20px;">
            <strong>Parágrafo 1º</strong> - Fica estabelecido que o veículo deverá ser entregue no dia
            {{ \Carbon\Carbon::parse($locacao->data_retorno)->format('d/m/Y') }}, com o tanque de combustível
            cheio e ser devolvido na mesma condição que pegou;
        </p>

        <p class="parag" style="margin-left: 20px;">
            <strong>Parágrafo 2º</strong> - Os LOCADORES serão responsáveis pela assistência e reparação de
            eventuais danos nos itens supracitados, ocorridos pela má manutenção prévia e/ou desgaste prévio;
            Inclusive, em caso de acidente, roubo ou perda total do veículo, os LOCADORES ficaram
            responsáveis pelo valor total do veículo, ou franquia do seguro, previamente ajustado no ato do
            contrato.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 3ª (bis)</strong> – O veículo, terá uso exclusivo particular durante o período de
            vigência do presente contrato, restando proibida sua utilização em plataformas de transporte de
            passageiros.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 4ª</strong> – Todos os impostos e taxas sobre o referido veículo correrão por conta
            exclusiva dos LOCADORES.
        </p>

        <p class="parag" style="margin-left: 20px;">
            <strong>Parágrafo Único</strong> - Fica a LOCATÁRIO responsável pelas multas de trânsito cometidas
            na vigência do contrato, incluindo a transferência de pontuação e o pagamento dos valores, devendo
            disponibilizar a documentação e o pagamento no prazo indicado pelo DETRAN/SP.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 5ª</strong> – Os LOCADORES ficarão responsáveis ao pagamento TOTAL do veículo em
            caso de apreensão do carro em crimes cometidos com o veículo, tanto criminal como civil.<br>
            <strong>Parágrafo Único</strong> – O LOCATÁRIO ficará responsável pelo pagamento da franquia de seguro, caso
            ocorra
            eventual sinistro.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 6ª</strong> – Este contrato é de caráter irretratável e irrevogável, ficando a
            parte que desobedecer qualquer uma das cláusulas do presente instrumento multa no valor de 50%
            (cinquenta por cento) do valor integral do contrato, e ainda, responder judicialmente.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 7ª</strong> – No caso de falecimento de quaisquer dos compromitentes deste
            instrumento será transferido a legítimos sucessores ou herdeiros das partes todos os direitos e
            obrigações aqui pactuados.
        </p>

        <p class="parag">
            <strong>CLÁUSULA 8ª</strong> – Outros aspectos por ventura omissos por este instrumento serão
            regidos por leis em vigor, ficando eleito o Fórum da Comarca de Pariquera-açu/SP, para dirimir
            dúvidas oriundas do presente compromisso.
        </p>

        <div style="text-align: center; font-size: 14px">Pariquera-açu,
            {{ $dataAtual->isoFormat('DD MMMM YYYY') }}<br><br><br>

            ___________________________________________________________<br>
            LOCATÁRIO: {{ $locacao->Cliente->nome }}<br>
            <b>CPF:</b> {{ $cpfCnpj }}<br><br><br>

            ___________________________________________________________<br>
             <br>
            <b>CPF:</b> 034.104.828-30<br><br><br>

            @if (!empty($locacao->testemunha_1))
                ___________________________________________________________<br>
                TESTEMUNHA: {{ $locacao->testemunha_1 }} <br>
                <b>RG: {{ $locacao->testemunha_1_rg }}</b> <br><br><br>
            @endif

            @if (!empty($locacao->testemunha_2))
                __________________________________________________________<br>
                TESTEMUNHA: {{ $locacao->testemunha_2 }} <br>
                <b>RG: {{ $locacao->testemunha_2_rg }}</b> <br><br><br>
            @endif
        </div>
    </div>
</body>

</html>
