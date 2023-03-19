@extends('layouts.app')
@section('content')
    <div class="container-xl homepage">
        <div class="row">
            <div class="col-md-6 col-sm-auto left">
                <div>
                    <p>
                        Bienvenue
                        <br>
                        au
                    </p>
                    <h1 class="heading-1">
                        Braine Trust
                    </h1>
                    <button class="btn btn-warning text-uppercase btn-lg mt-4">Je découvre</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-auto right">
                <img src="{{asset('images/scrabble-hero-bg.png')}}" alt="">
            </div>
            <div class="row h-25 ">
                <div id="carouselExampleAutoplaying" class="carousel slide col" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-carousel-ods.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-duplicate.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-carousel-scrabble.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-carousel-ods.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-duplicate.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                <div class="col-4">
                                    <figure class="figure">
                                        <img class="figure-img img-fluid rounded"
                                             src="{{ asset('images/badge-carousel-scrabble.svg') }}"
                                             alt="image">
                                        <figcaption></figcaption>
                                    </figure>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>--}}
                </div>
            </div>
        </div>
        <section class="section row">
            <x-section-title :title="'Découvrir'" :letter="'A'"  />
            <div class="col-md-6 col-sm-auto">

            </div>
        </section>
    </div>
    <script>

    </script>
@endsection
