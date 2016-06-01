<!DOCTYPE html>
<html>
    <head>
        <title>@yield('titulo')</title>
        @include('layout.assets.css')
    </head>


    <body @yield('body')>
        @include('layout.menu')

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        @yield('acao')
                        <h4 class="page-title">@yield('pagina_atual')</h4>
                        <ol class="breadcrumb">
                            @yield('caminho_pagina')
                        </ol>

                    </div>
                </div>
                <!-- Page-Title -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            @yield('conteudo')
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- Footer -->
                @include('layout.footer')
                <!-- End Footer -->

            </div>
        </div>

        @include('layout.assets.js')

    </body>
</html>