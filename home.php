<?php
/*Template Name: Home Page*/
?>
<?php /*get_header(); */?>
<?php wp_head(); ?>


    <div id="primary" class="content-area">

        <main id="main" class="site-main">

            <div class="main-wrapper">
                <div class="home">

                    <div class="home__content">
                        <h1 class="home__title">Georgina Alson</h1>
                        <p class="home__text">young model 2020</p>
                    </div>


                    <div class="top-button">
                        <span class="top-button__btn"><a href="#">VIEW PROFILE</a></span>
                        <span class="top-button__play"><a href="#"><i class="fa fa-play fa-3x"></i></span>
                    </div>
                </div>

            </div>

            <div class="inner-wrapper">
                <div class="talent">
                    <!--не могу ничего сделать так как Wordpress доставлят пустые a href и все превратил в ссылки-->
                    <div class="qqq">
                        <p class="qqq__filter">Actor</p>
                        <p class="qqq__filter">Musician </p>
                        <p class="qqq__filter">Comedian</p>
                        <p class="qqq__filter">Model</p>
                    </div>

                    <div class="actors">

                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                        <div class="box">
                            <div class="hover-effect">
                                <a href="#" class="hover-text">
                                    <h3>Keith Ruiz</h3>
                                    <p>Comedian
                                    <p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--не могу ничего сделать так как Wordpress доставлят пустые a href-->
                    <button class="talent-btn">explore more</button>
                </div>
            </div>

            <div class="inner-wrapper">
                <section class="news">
                    <h2 class="news__title">Latest News</h2>
                    <div class="news__first-line">
                        <div class="news__item">
                            <div class="news__img"></div>
                            <div class="news__text-area">
                                <h3 class="news__subtitle">5 Reasons To Keep Your Beauty Salon
                                    Reservation</h3>
                                <p class="news__date">8 March, 2020</p>
                            </div>
                        </div>
                        <div class="news__item">
                            <div class="news__img"></div>
                            <div class="news__text-area">
                                <h3 class="news__subtitle">Benjamin Franklin Method Of Habit
                                    Formation</h3>
                                <p class="news__date">8 March, 2020</p>
                            </div>
                        </div>
                        <div class="news__item">
                            <div class="news__img"></div>
                            <div class="news__text-area">
                                <h3 class="news__subtitle">29 Motivational Quotes For Business And Other Work
                                    Environments</h3>
                                <p class="news__date">8 March, 2020</p>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <div class="main-wrapper">
                <div class="subscribe">
                    <div class="subscribe__logo">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/Logo-suscr.png" alt="">
                    </div>
                    
                    <div class="subscribe__form">
                        <form action="" method="post" id="sing" >
                            <label for="mail"></label>
                            <input type="email" id="mail" placeholder="sign up our newsletter">
                            <span class="letter"><i class="fa fa-envelope-o"></i></span>
                        </form>
                    </div>
                </div>
            </div>


<?php get_footer();