<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidApp | @yield('titulo')</title>

  <!-- fonte awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- AOS animate -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  @livewireStyles

</head>
<body class="mt-5 pt-4">
    <!-- Barra de navegação -->
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SolidApp</a>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Digite algo..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>

            <!-- Barra de pesquisa  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Final barra de pesquisa  -->
            
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>

                        <!-- Perfil  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Perfil</a>
                        </li>

                        <!-- Minhas postagens  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Minhas postagens</a>
                        </li>

                        <!-- Minha conta  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Minha conta</a>
                        </li>

                        <!-- Termos de privacidade  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Termos de privacidade</a>
                        </li>

                        <!-- Configurações do app  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configurações</a>
                        </li>

                        <!-- Ajuda  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ajuda</a>
                        </li>
                        
                        <!-- Sair  -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sair</a>
                        </li>
                           
                        <!-- Social  -->
                        <i class="fab fa-instagram"></i><i class="fab fa-facebook-f"></i>

                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <!-- Final barra de navegação  -->


    <!-- Estrutura base  -->
    <div class="container mt-3 pt-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">

            <!-- Insira conteúdo aqui  -->
            @yield('conteudo')


            </div>
        </div>
    </div>



    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- AOS animate -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>
</html>