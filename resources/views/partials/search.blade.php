<form action="{{route('products.search')}}" class="mb-0 flex">
    <label for="recherche" class="text-white font-semibold pt-1 mr-1">Buscar</label>
    <input type="text" name="recherche" class="w-32 border-2 border-black rounded-lg focus:outline-none focus:shadow-outline focus:border-black" value="{{request()->q ?? ''}}">
        <button class="ml-1">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                width="24" height="24"
                viewBox="0 0 172 172"
                style=" fill:#f8f3f3;"><g transform=""><g fill="none" fill-rule="nonzero" stroke="none" 
                stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" 
                stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" 
                style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><path d="" fill="none"></path><g fill="#f8f3f3">
                <path d="M95.04232,106.54818l17.77669,17.77669c-2.7155,5.17904 -2.99544,10.33008 -0.13998,13.18555l32.44597,32.44597c4.08724,4.08724 12.98958,1.84765 19.82031,
                -5.01107c6.85872,-6.85872 9.09831,-15.73307 5.01107,-19.82031l-32.41797,-32.44597c-2.88346,-2.85547 -8.0345,-2.57552 -13.21354,0.11198l-17.77669,-17.74869zM60.91667,
                0c-33.64974,0 -60.91667,27.26693 -60.91667,60.91667c0,33.64974 27.26693,60.91667 60.91667,60.91667c33.64974,0 60.91667,-27.26692 60.91667,-60.91667c0,-33.64974 -27.26692,
                -60.91667 -60.91667,-60.91667zM60.91667,107.5c-25.72722,0 -46.58333,-20.85612 -46.58333,-46.58333c0,-25.72722 20.85612,-46.58333 46.58333,-46.58333c25.72722,0 46.58333,
                20.85612 46.58333,46.58333c0,25.72722 -20.85612,46.58333 -46.58333,46.58333z"></path></g></g></g>
            </svg>
        </button>
    </form>
    
    