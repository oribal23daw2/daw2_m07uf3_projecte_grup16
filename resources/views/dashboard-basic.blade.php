<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard treballadors') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>Clients
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('clients/crear') }}">Afegir client<a/>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('clients') }}">Esborrar/Modificar/Visualitzar clients<a/>
                        </div>                    
                </div>
            </div><br>
            <div>Automòbils
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('autos/crear') }}">Afegir automòbil<a/>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('clients') }}">Esborrar/Modificar/Visualitzar automòbils<a/>
                        </div>                    
                </div>
            </div><br>
            <div>Llogaments
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('clients/crear') }}">Afegir llogament<a/>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ url('clients') }}">Esborrar/Modificar/Visualitzar llogaments<a/>
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