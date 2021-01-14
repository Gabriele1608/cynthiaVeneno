<div class="js-cookie-consent cookie-consent flex justify-start bg-purple-500 text-black px-2 py-3 border border-white rounded w-full ">

    <span class="cookie-consent__message font-semibold mr-2">
        {!! trans('cookieConsent::texts.message') !!}
    </span>

    <button class="js-cookie-consent-agree cookie-consent__agree mr-2 font-semibold border-2 border-purple-700 rounded px-2 hover:bg-purple-700">
        {{ trans('cookieConsent::texts.agree') }}
    </button>

    <a href="{{route('legal.index')}}"><button class="js-cookie-consent-agree cookie-consent__agree font-semibold border-2 border-purple-700 rounded px-2 hover:bg-purple-700">
        Más info
    </button></a>

</div>
