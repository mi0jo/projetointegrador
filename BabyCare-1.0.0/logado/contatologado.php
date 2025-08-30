<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>BleedWithDignity</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

    <?php
   require("../include/referenciashead.php");
   ?>

    </head>

    <body>

   <?php
      require("../include/spinner.php");
       require("../include/navbarlogado.php");
             require("../include/botoesperfilpesquisa.php");
 require("../include/modalsearch.php");
        ?>

                    </div>
                </nav>
            </div>
        </div>



        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insira uma palavra-chave</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Contate-nos</h1>
                
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                        <h1 class="display-3">Nos contate de diferentes formas:</h1>
                        <p class="mb-5"> Quer colaborar com nosso site, tem alguma dúvida? Você pode nos contatar pelos seguintes meios:</p>
                    </div>
                    <div class="row g-5 mb-5">
                        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>E-mail</h4>
                                    <p class="mb-2">bleedwithdignity@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Telefone</h4>
                                    <p class="mb-2">(51) 9 99563257</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex w-100 border border-primary p-4 rounded bg-white">
                                <i class="fab fa-instagram  fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Instagram</h4>
                                    <p class="mb-2">@bleedwithdignity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5">
                        <div class="col-lg-13 wow fadeIn" data-wow-delay="0.3s">
                            <form action="">
                                <input type="text" class="w-100 form-control py-3 mb-5 border-primary" placeholder="Nome">
                                <input type="email" class="w-100 form-control py-3 mb-5 border-primary" placeholder="E-mail">
                                <textarea class="w-100 form-control mb-5 border-primary" rows="8" cols="10" placeholder="Escreva sua mensagem"></textarea>
                                <button class="w-100 btn btn-primary form-control py-3 border-primary text-white bg-primary" type="submit">Enviar</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

     <?php
      require("../include/copyright.php");
 require("../include/bibliotecajava.php");
   ?>


    </body>

</html>