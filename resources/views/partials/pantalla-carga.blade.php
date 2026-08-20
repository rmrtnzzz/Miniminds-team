@php $incrustada = $incrustada ?? false; @endphp

<div id="{{ $id ?? 'pantalla-carga' }}" class="pantalla-carga {{ $incrustada ? 'carga-incrustada' : '' }}">

    <div class="carga-caja">

        <div class="carga-emblema">

            <div class="carga-anillo"></div>

<img 
    id="carga-mascota"
    src="{{ asset('IMG/carga/kelly.gif') }}"
    alt=""
    class="carga-mascota"
    data-gifs='[
        "{{ asset("IMG/carga/kelly.gif") }}",
        "{{ asset("IMG/carga/kairo.gif") }}",
        "{{ asset("IMG/carga/luma.gif") }}"
    ]'
>
        </div>

        <p class="carga-texto">
            Cargando<span class="carga-puntos">
                <span>.</span>
                <span>.</span>
                <span>.</span>
            </span>
        </p>

    </div>

</div>