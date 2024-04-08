<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<nav>
<header>
    <div class="header-item">
        <a href="logout.php">Sair</a>
        <a href="index.php">Home</a>
    </div>
    
        <h1>Bem-vindo à Biblioteca Virtual</h1>
    
</header>
    <!-- Example single danger button -->
    <div class="cachoro">
        <div class="pato">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Autor
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="autor_listagem.php">Listagem</a></li>

                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Cliente
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="cliente_listagem.php">Listagem</a></li>

                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Funcionário
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="funcionario_listagem.php">Listagem</a></li>

                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Livro
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="livro_listagem.php">Listagem</a></li>

                </ul>
            </div>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Empréstimo
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="emprestimo_listagem.php">Listagem</a></li>

                </ul>
            </div>
        </div>
    </div>
</nav>