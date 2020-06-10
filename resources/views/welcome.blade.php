@extends('layouts.app')
    @section('content')
    <section id="about">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>About this application</h2>
            <p class="lead">This is a sample image resizing application.
                 You can find out more about api documentation at:
                   <a href="#">Swagger docs</a>.
            </p>
            </div>
        </div>
        </div>
        </section>

        <section id="services" class="bg-light">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>Service we offer: Image resizing</h2>
            <p class="lead">Simply upload an image with resize paramters height and width, and obtain a link to download the uploaded file.</p>
            </div>
        </div>
        </div>
        </section>
    @stop


