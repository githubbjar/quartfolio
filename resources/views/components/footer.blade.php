<footer class="footer">
    <div class="max-w-7xl pt-14 mx-auto px-18 pb-12 grid lg:grid-cols-2">

        {{-- Identity --}}
        <div class="text-center lg:text-left">
            <h3 class="tinos-regular text-black font-semibold text-4xl md:text-5xl">
                Quartfolio 
            </h3>
            <p class="text-lg md:text-xl text-black mt-2 leading-5.5">
                <strong>The online portfolio of Jerry Janquart</strong></p>
            </p>
            <p class="lg:w-3/5 text-md md:text-lg text-black mt-2 leading-5.5">
                Creative Direction & Design Execution—Print & Web
            </p>
            <p class="text-xs md:text-base mt-2 text-black">
                Built with Laravel, Tailwind, Alpine, Vite
            </p>
        </div>

        {{-- Contact --}}
        <div class="mt-6">
            <div class="text-center lg:text-left space-y-2 lg:pl-20">
                
                <div class="space-y-2 lg:flex lg:items-center lg:space-y-0 lg:space-x-4 lg:text-lg">
                    <h3 class="font-semibold uppercase">Connect</h3>
                    <a href="mailto:jmjanquart@gmail.com" class="hover:underline">
                        jmjanquart@gmail.com
                    </a>

                    <div class="space-x-3">
                        <a href="https://github.com/jerryjanquart" class="hover:underline">GitHub</a>
                        <span></span>
                        <a href="https://www.linkedin.com/in/jerry-janquart-67aa608/" class="hover:underline">LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-gray-900 border-t border-gray-800 text-center text-xs py-4 text-gray-300">
        © {{ date('Y') }} Jerry Janquart. All rights reserved.
    </div>

</footer>
