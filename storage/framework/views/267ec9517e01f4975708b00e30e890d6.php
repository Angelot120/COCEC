        <footer class="footer-section footer-2 overflow-hidden" style="--bz-color-theme-primary: #EC281C">
            <div class="shapes">
                <div class="shape shape-1"><img src="<?php echo e(URL::asset('assets/images/shapes/footer-shape-1.png')); ?>" alt="footer"></div>
                <div class="shape shape-2"><img src="<?php echo e(URL::asset('assets/images/shapes/footer-shape-2.png')); ?>" alt="footer"></div>
            </div>
            <div class="container">
                <div class="row footer-wrap">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="widget-header header-2">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="<?php echo e(URL::asset('assets/images/Logo.png')); ?>" alt="logo"" alt=" img"></a>
                                </div>
                            </div>
                            <p>Quartier KANYIKOPE à 50m du Lycée FOLLY-BEBE en allant vers KAGOME</p>
                            <p>
                                <b>Tél:</b>
                                <a href="tel:+22822270551">(+228) 22 27 05 51</a> /
                                <a href="tel:+22898422473">98 42 24 73</a>
                                <br>
                                <b>Email:</b>
                                <a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a>
                            </p>
                            <ul class="footer-social">
                                <li><a href="https://www.facebook.com/COCEC-105458737978835"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://api.whatsapp.com/send?phone=22891126471" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget widget-space">
                            <div class="widget-header header-2">
                                <h3 class="widget-title">Liens Rapides</h3>
                            </div>
                            <ul class="footer-list">
                                
                                <li><a href="<?php echo e(route("index")); ?>">Accueil</a></li>
                                <li><a href="<?php echo e(route("products")); ?>">Nos Produits</a></li>
                                <li><a href="<?php echo e(route('main.finance')); ?>">Finance Digitale</a></li>
                                <li><a href="<?php echo e(route("agencies")); ?>">Nos Agences</a></li>
                                <li><a href="<?php echo e(route('contact')); ?>">Contactez-nous</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <div class="widget-header header-2">
                                
                                <h3 class="widget-title">À Propos de Nous</h3>
                            </div>
                            <ul class="footer-list">
                                
                                <li><a href="<?php echo e(route('about')); ?>">Nous connaitre</a></li>
                                <li><a href="<?php echo e(route("blogs")); ?>">Actualités (Blog)</a></li>
                                <li><a href="<?php echo e(route('career')); ?>">Carrières</a></li>
                                <li><a href="<?php echo e(route('main.faq')); ?>">Aide & FAQ</a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget widget-space">
                            <div class="widget-header header-2">
                                
                                <h3 class="widget-title">Notre Newsletter</h3>
                            </div>
                            
                            <p class="text-justify">Inscrivez-vous à notre newsletter pour ne rien manquer de nos actualités et de nos offres.</p>
                            <div class="footer-form form-2 mb-20">
                                <form action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST" class="rr-subscribe-form" id="footer-newsletter-form">
                                    <?php echo csrf_field(); ?>
                                    <input class="form-control" type="email" name="email" placeholder="Votre adresse e-mail">
                                    <input type="hidden" name="action" value="mailchimpsubscribe">
                                    <button class="submit">S'inscrire</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="copyright-area area-2">
                <div class="container">
                    <div class="row copyright-content">
                        <div class="col-md-6">
                            <p>© 2025 COCEC. All Rights Reserved. | Powered by <a href="mailto:douvonangelotadn@gmail.com" style="color: inherit; text-decoration: none;">douvonangelotadn@gmail.com</a></p>
                        </div>
                        <div class="col-md-6">
                            <ul class="copy-list">
                                <li><a href="contact.html">Terms & Conditions</a></li>
                                <li><a href="contact.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ./ footer-section --><?php /**PATH C:\Users\RaydHil\Downloads\COCEC\resources\views/includes/main/footer.blade.php ENDPATH**/ ?>