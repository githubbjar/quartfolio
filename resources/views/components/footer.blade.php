<footer class="bg-black text-gray-300 footer">
    <div class="max-w-7xl mx-auto px-6 py-12 grid gap-8 md:grid-cols-3">

        {{-- Identity --}}
        <div>
            <h3 class="text-black font-semibold text-lg pt-10">
                Jerry M. Janquart
            </h3>
            <p class="text-sm text-black mt-2">
                Designer & Laravel Developer crafting clean, performant web experiences.
            </p>
            <p class="text-xs mt-4 text-black">
                Built with Laravel, Tailwind, Alpine, Vite
            </p>
        </div>

        {{-- Navigation --}}
        <div>
            <h4 class="text-white font-semibold mb-3">Explore</h4>
            <ul class="space-y-2 text-sm">
                <li><a href="" class="hover:text-white">Work</a></li>
                <li><a href="" class="hover:text-white">About</a></li>
                <li><a href="" class="hover:text-white">Contact</a></li>
                <li>
                    <a href="/resume.pdf" class="hover:text-white" target="_blank">
                        Resume (PDF)
                    </a>
                </li>
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h4 class="text-white font-semibold mb-3">Connect</h4>
            <ul class="space-y-2 text-sm">
                <li>
                    <a href="mailto:you@email.com" class="hover:text-white">
                        you@email.com
                    </a>
                </li>
                <li>
                    <a href="https://github.com/yourusername" target="_blank" class="hover:text-white">
                        GitHub
                    </a>
                </li>
                <li>
                    <a href="https://linkedin.com/in/yourusername" target="_blank" class="hover:text-white">
                        LinkedIn
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-gray-900 border-t border-gray-800 text-center text-xs py-4 text-gray-500">
        © {{ date('Y') }} Jerry M. Janquart. All rights reserved.
    </div>
</footer>
