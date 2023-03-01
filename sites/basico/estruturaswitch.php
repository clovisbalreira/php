<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estrutura Switch</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Estrutura Switch</h1>
        <fieldset>
            <form action="estruturaswitch.php" method="get">
                <div>
                    <label for="numero">Numero:</label>
                    <input type="number" name="numero" id="numero">
                </div>
                <fieldset>
                    <legend>Operação</legend>
                    <div>
                        <input type="radio" name="operacao" id="dobro" value="dobro" checked>
                        <label for="dobro">Dobro</label>
                    </div>
                    <div>
                        <input type="radio" name="operacao" id="cubo" value="cubo">
                        <label for="cubo">Cubo</label>
                    </div>
                    <div>
                        <input type="radio" name="operacao" id="raiz" value="raiz">
                        <label for="raiz">Raiz</label>
                    </div> 
                </fieldset>
                <?php
                    $numero = $_GET['numero'];
                    $operacao = $_GET['operacao'];
                    if($numero != ''){
                        switch($operacao){
                            case 'dobro':
                                $r = $numero * 2;
                                break;
                            case 'cubo':
                                $r = $numero ^ 3;
                                    break;
                                case 'raiz':
                                    $r = sqrt($numero);
                                    //$r = $numero ^ (1/2);
                                    break;
                                default:
                                    break;
                            }
                            echo "<p>O resultado da operação solicitada foi <span class='foco'>$r</span></p>";
                        }
                    ?>
                <input type="submit" class='botao' value="Calcular">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturaswitch.php" method="get">
                <div>
                    <label for="ds">Dia da Semana:</label>
                    <input type="number" name="ds" id="ds" min="2" max="7" require>
                </div>
                <?php
                    $dia = $_GET['ds'];
                    if($dia != ''){
                        switch($dia){
                            case 2:
                            case 3:
                            case 4:
                            case 5:
                            case 6:
                                echo "Levanda e vai estudar";
                                break;
                            case 7:
                            case 8:
                                echo "Descanse pequeno gafanho";
                                break;
                            default:
                                echo "Dia de semana invalido";
                                break;
                            }
                        }
                    ?>
                <input type="submit" class='botao' value="Analisar">
            </form>
        </fieldset>
        <fieldset>
            <form action="estruturaswitch.php" method="get">
                <div>
                    <label for="estado">Estado:</label>
                    <select name="estado" id="estado">
                        <option value="Acre">Acre</option>
                        <option value="Alagoas">Alagoas</option>
                        <option value="Amapá">Amapá</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Bahia">Bahia</option>
                        <option value="Ceará">Ceará</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Espirito Santo">Espirito Santo</option>
                        <option value="Goiás">Goiás</option>
                        <option value="Maranhão">Maranhão</option>
                        <option value="Mato Grosso">Mato Grosso</option>
                        <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                        <option value="Minas Gerais">Minas Gerais</option>
                        <option value="Pará">Pará</option>
                        <option value="Paraíba">Paraíba</option>
                        <option value="Paraná">Paraná</option>
                        <option value="Pernambuco">Pernambuco</option>
                        <option value="Piauí">Piauí</option>
                        <option value="Rio de Janeiro">Rio de Janeiro</option>
                        <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                        <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                        <option value="Rondônia">Rondônia</option>
                        <option value="Roraima">Roraima</option>
                        <option value="Santa Catarina">Santa Catarina</option>
                        <option value="São Paulo">São Paulo</option>
                        <option value="Sergipe">Sergipe</option>
                        <option value="Tocantins">Tocantins</option>
                    </select>
                </div>
                <?php
                    $estado = $_GET['estado'];
                    switch($estado){
                        case "Paraná" :
                        case "Rio Grande do Sul" :
                        case "Santa Catarina" :
                            $regiao = "Sul";
                            break;
                        case 'Espirito Santo' :
                        case 'Minas Gerais' :
                        case 'Rio de Janeiro' :
                        case 'São Paulo' :
                            $regiao = 'Sudeste';
                            break;
                        case 'Distrito Federal' :
                        case 'Goiás' :
                        case 'Mato Grosso' :
                        case 'Mato Grosso do Sul' :
                            $regiao = 'Centro Oeste';
                            break;
                        case 'Acre' :
                        case 'Amazonas' :
                        case 'Amapá' :
                        case 'Pará' :
                        case 'Rondônia' :
                        case 'Roraima' :
                        case 'Tocantins' :
                            $regiao = 'Norte';
                            break;
                        case 'Alagoas' :
                        case 'Bahia' :
                        case 'Ceará' :
                        case 'Maranhão' :
                        case 'Paraíba' :
                        case 'Pernambuco' :
                        case 'Piauí' :
                        case 'Rio Grande do Norte' :
                        case 'Sergipe' :
                            $regiao = 'Nordeste';
                            break;
                    }
                    if($estado != ''){
                        echo "<p>Você mora no <span class='foco'>estado $estado</span> na <span class='foco'>Região $regiao</span><p>";
                    }
                ?>
                <input type="submit" class='botao' value="Verificar">
            </form>
        </fieldset>
        <!--Voltar pagina anterior
        <a href="javascript:history.go(-1" class="botao">Voltar</a>-->
    </main>
</body>
</html>