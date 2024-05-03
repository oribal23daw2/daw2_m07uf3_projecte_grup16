<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard dels usuaris tipus bàsic') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>Treballadors
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ url('treb/index_basic') }}">Visualització bàsica<a/>
                    </div>
                </div>
            </div><br>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>Clients
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ url('clients/index_basic') }}">Afegir Client<a/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ url('clients/index_basic') }}">Esborrar/Modificar/Visualitzar clients<a/>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ url('clients/index_basic') }}">Crear informe PDF<a/>
                    </div>
                </div>
            </div>        
        </div>
    </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
    </div>
</x-app-layout>