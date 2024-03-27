<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apostas Fórmula 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <div id="logo"> <a href="index.php"></a>


            <a href="index1.php"><img src="./image/PK_white.png" alt="" width="100">
                <h1>Fórmula1Passionados</h1>
            </a>
        </div>
        <div id="menu">
            <nav>
                <ul class="nav-list">
                    <li>
                        <a href="index1.php">Página Inicial</a>
                    </li>
                    <li>
                        <a href="equipas.php">Equipas</a>
                    </li>
                    <li>
                        <a href="pilotos.php">Pilotos</a>
                    </li>
                    <li>
                        <a href="circuitos.php">Circuitos</a>
                    </li>
                    <li class="first current_page_item">
                        <a href="apostas.php">Apostas</a>
                    </li>
                    <li>
                        <a href="perfil.php">Sair</a>
                    </li>
                </ul>

            </nav>
    </header>

    <main>

        <section id="apostasCorrida">
            <h2>Apostas na Próxima Corrida </h2>
            <form id="formApostas" method="POST" action="apostas_send.php">
                <label for="pilotoEscolhido">Escolha seu piloto favorito:</label>
                <select id="pilotoEscolhido" name="pilotoEscolhido">
                    <!-- Opções de pilotos -->
                    <option value="Escolha">Escolha</option>
                    <option value="Lewis Hamilton">Lewis Hamilton</option>
                    <option value="Max Verstappen">Max Verstappen</option>
                    <option value="Sergio Perez">Sergio Perez</option>
                    <option value="Fernando Alonso">Fernando Alonso</option>
                    <option value="Charles Leclerc">Charles Leclerc</option>
                    <option value="George Russell">George Russell</option>
                    <option value="Lando Norris">Lando Norris</option>
                    <option value="Oscar Piastri">Oscar Piastri</option>
                    <option value="Yuki Tsunoda"> Yuki Tsunoda</option>
                    <option value="Daniel Ricciardo">Daniel Ricciardo</option>
                    <option value="Carlos Sainz">Logan Sargent</option>
                    <option value="Carlos Sainz">Lance Stroll</option>
                    <option value="Carlos Sainz">Pierre Gasly</option>
                    <option value="Carlos Sainz">Esteban Ocon</option>
                    <option value="Alexandre">Alexandre Albon</option>
                    <option value="Valterri">Valtteri Bottas</option>
                    <option value="Nico">Nico Hulkenberg</option>
                    <option value="Zhou">Zhou Guanyu</option>
                    <option value="Kevin">Kevin Magnussen</option>
                    <option value="Carlos Sainz">Carlos Sainz</option>
                    <!-- Adicione mais pilotos conforme necessário -->
                </select>

                <button>
                    <span class="circle1"></span>
                    <span class="circle2"></span>
                    <span class="circle3"></span>
                    <span class="circle4"></span>
                    <span class="circle5"></span>
                    <span class="text">Apostar</span>
                </button>

            </form>

        </section>

        <section id="noticiaComVideo">
            <div class="coluna-video">
                <h2>As 10 melhores corridas do ano</h2>
                <video width="600" controls>
                <source src="image/10melhores.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            </div>
            
                </article>
                <!-- Adicione mais notícias conforme necessário -->
            </div>
        </section>



    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // Função para embaralhar aleatoriamente um array
    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    // Nomes dos pilotos
    const nomesPilotos = [
        'Max Verstappen',
        'George Russell',
        'Lewis Hamilton',
        'Fernando Alonso',
        'Charles Leclerc',
        'Oscar Piastri',
        'Pierre Gasly',
        'Esteban Ocon',
        'Valtteri Bottas',
        'Lando Norris',
        'Yuki Tsunoda',
        'Carlos Sainz Jr.',
        'Sergio Pérez',
        'Alexander Albon',
        'Nico Hülkenberg',
        'Logan Sargeant',
        'Lance Stroll',
        'Liam Lawson',
        'Kevin Magnussen',
        'Zhou Guanyu'
    ];

    // Embaralhe a ordem dos nomes dos pilotos
    shuffleArray(nomesPilotos);

    document.addEventListener("DOMContentLoaded", function() {
        // Dados de exemplo para o gráfico de barras
        const dadosEstatisticas = {
            labels: [], // Nomes dos pilotos serão preenchidos dinamicamente
            datasets: [{
                label: 'Número de Apostas',
                data: [], // Números de apostas serão preenchidos dinamicamente
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
            }],
        };

        // Configuração do gráfico de barras
        const configEstatisticas = {
            type: 'bar',
            data: dadosEstatisticas,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Número de Apostas',
                        },
                    },
                },
            },
        };

        // Crie um elemento canvas para o gráfico
        const canvasEstatisticas = document.createElement('canvas');
        canvasEstatisticas.id = 'graficoEstatisticas';

        // Adicione o canvas à seção de apostas
        document.getElementById('apostasCorrida').appendChild(canvasEstatisticas);

        // Renderize o gráfico no canvas
        const ctxEstatisticas = document.getElementById('graficoEstatisticas').getContext('2d');
        const graficoEstatisticas = new Chart(ctxEstatisticas, configEstatisticas);

        // Faça uma requisição AJAX para obter os dados das apostas do PHP
        fetch('apostas_get.php')
            .then(response => response.json())
            .then(data => {
                // Use os dados recebidos para configurar o gráfico
                const pilotos = data.map(aposta => aposta.piloto);
                const numApostas = data.map(aposta => aposta.num_apostas);

                // Atualize os dados do gráfico com os dados das apostas
                graficoEstatisticas.data.labels = pilotos;
                graficoEstatisticas.data.datasets[0].data = numApostas;

                // Atualize o gráfico
                graficoEstatisticas.update();
            })
            .catch(error => console.error('Erro:', error));
    });
    </script>



    <footer>
        &copy; 2023 Fórmula 1
    </footer>
</body>

</html>