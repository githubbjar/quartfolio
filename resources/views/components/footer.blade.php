<footer class="bg-black text-gray-300 footer">
    <div class="max-w-7xl mx-auto px-18 py-12 grid lg:grid-cols-2">

        {{-- Identity --}}
        <div>
            <h3 class="tinos-regular text-black font-semibold text-4xl">
                Quartfolio 
            </h3>
            <p class="text-sm text-black mt-2">
                <strong>The online portfolio of Jerry M. Janquart</strong><br />Designer & Developer crafting clean, performant web experiences.
            </p>
            <p class="text-xs mt-4 text-black">
                Built with Laravel, Tailwind, Alpine, Vite
            </p>
        </div>

        {{-- Contact --}}
        <div class="flex flex-col pb-10 gap-6 text-lg pt-10">

            

            <div class="flex flex-wrap items-center justify-center gap-8 text-lg text-black">

    <span class="font-semibold">
        Connect
    </span>

    <a href="mailto:jmjanquart@gmail.com" class="hover:underline">
        jmjanquart@gmail.com
    </a>

    <a href="https://github.com/githubjar" target="_blank" rel="noopener" class="hover:underline">
        GitHub
    </a>

    <a href="https://linkedin.com/in/jmjanquart" target="_blank" rel="noopener" class="hover:underline">
        LinkedIn
    </a>

</div>
    </div>

</div>

        </div>
    </div>

    <div class="bg-gray-900 border-t border-gray-800 text-center text-xs py-4 text-gray-500">
        © {{ date('Y') }} Jerry M. Janquart. All rights reserved.
    </div>
</footer>
