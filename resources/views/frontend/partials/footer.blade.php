<footer class="bg-gray-800 text-white">
    <div class="footer-top py-10">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row justify-between">
            <!-- Brand and Contact -->
            <div class="footer-brand mb-6 lg:mb-0 lg:w-1/3">
                <a href="#" class="block mb-6">
                    <img src="{{asset('assets/frontend/images/nyanogharlogo.png.png')}}" alt="nyanoghar logo" class="w-48" />
                </a>

                <ul class="contact-list mb-6 space-y-4">
                    <li>
                        <a href="#" class="flex items-center space-x-2 text-gray-400 hover:text-gray-300">
                            <ion-icon name="location-outline" class="text-xl"></ion-icon>
                            <address>Nepalgunj, Banke, Nepal.</address>
                        </a>
                    </li>
                    <li>
                        <a href="tel:+0123456789" class="flex items-center space-x-2 text-gray-400 hover:text-gray-300">
                            <ion-icon name="call-outline" class="text-xl"></ion-icon>
                            <span>123456789</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:contact@nyanoghar.com" class="flex items-center space-x-2 text-gray-400 hover:text-gray-300">
                            <ion-icon name="mail-outline" class="text-xl"></ion-icon>
                            <span class="italic">@nyanoghar.com</span>
                        </a>
                    </li>
                </ul>

                <ul class="social-list flex space-x-4">
                    <li>
                        <a href="" class="text-gray-400 hover:text-gray-300">
                            <ion-icon name="logo-facebook" class="text-2xl"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-gray-400 hover:text-gray-300">
                            <ion-icon name="logo-twitter" class="text-2xl"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-gray-400 hover:text-gray-300">
                            <ion-icon name="logo-linkedin" class="text-2xl"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="" class="text-gray-400 hover:text-gray-300">
                            <ion-icon name="logo-youtube" class="text-2xl"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Footer Links -->
            <div class="footer-link-box lg:w-2/3 flex flex-wrap justify-between">
                <ul class="footer-list space-y-2">
                    <li><p class="font-semibold text-gray-400 mb-2 text-lg">Company</p></li>
                    <li><a href="#about_us" class="footer-link hover:text-gray-300">About Us</a></li>
                    <li><a href="#blog" class="footer-link hover:text-gray-300">Blog</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">FAQ</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">Contact us</a></li>
                </ul>

                <ul class="footer-list space-y-2">
                    <li><p class="font-semibold text-gray-400 mb-2 text-lg">Services</p></li>
                    <li><a href="{{ route('propertyPage') }}" class="footer-link hover:text-gray-300">All Properties</a></li>
                    <li><a href="{{ route('userProfile') }}" class="footer-link hover:text-gray-300">My Profile</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">Terms & Conditions</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">Promotional Offers</a></li>
                </ul>

                <ul class="footer-list space-y-2">
                    <li><p class="font-semibold text-gray-400 mb-2 text-lg">Customer Care</p></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">My account</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">Wish List</a></li>
                    <li><a href="#" class="footer-link hover:text-gray-300">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom py-4 bg-gray-700">
        <div class="container mx-auto text-center text-gray-400">
            <p class="text-sm">
                &copy; 2024 <a href="#" class="hover:text-gray-300">Manish T. Gurung</a> All Rights Reserved
            </p>
        </div>
    </div>
</footer>
