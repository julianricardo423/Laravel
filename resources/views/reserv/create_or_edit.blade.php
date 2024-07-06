<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{empty($reserv) ? route('reserv.store') : route('reserv.update', $reserv)}}">
                        <!-- proteger formulario de que envíen datos desde otro domino-->
                        @csrf

                        @if (empty($reserv))

                            @method('post')
                        @else
                            @method('put')
                        @endif

                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', empty($reserv) ? '' : $reserv->name)" placeholder="Ingresa un nombre" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                        <x-text-input id="idNumber" class="block mt-1 w-full" type="text" name="idNumber" :value="old('idNumber', empty($reserv) ? '' : $reserv->idNumber)" placeholder="Ingresa un número de identificación" />
                        <x-input-error :messages="$errors->get('idNumber')" class="mt-2" />

                            <select class="form-select block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" id="userType" name="userType">
                            <option disabled selected value="">Seleccione una categoria</option>
                            @foreach ($userTypes as $userType)
                                <option value="{{$userType}}" {{old('userType', empty($reserv) ? '' : $reserv->userType) == $userType ? 'selected' : ''}}>{{ucfirst($userType)}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('userType')" class="mt-2" />

                        <select class="form-select block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" id="roomLaboratory" name="roomLaboratory">
                            <option disabled selected value="">Seleccione un laboratorio</option>
                            @foreach ($laboratories as $laboratory)
                                <option value="{{$laboratory}}" {{old('roomLaboratory', empty($reserv) ? '' : $reserv->roomLaboratory) == $laboratory ? 'selected' : ''}}>{{ucfirst($laboratory)}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('roomLaboratory')" class="mt-2" />

                        <x-text-input id="dependecyOrAcademyProgram" class="block mt-1 w-full" type="text" name="dependecyOrAcademyProgram" :value="old('dependecyOrAcademyProgram', empty($reserv) ? '' : $reserv->dependecyOrAcademyProgram)" placeholder="Ingrese una dependencia o programa académico" />
                        <x-input-error :messages="$errors->get('dependecyOrAcademyProgram')" class="mt-2" />

                        <label for="dateReservation">Fecha de reserva: </label>
                        <input type="date" id="dateReservation" name="dateReservation" value="{{old('dateReservation', empty($reserv) ? '' : $reserv->dateReservation)}}">

                        <label for="startHour">Hora Inicio: </label>
                        <input type="time" id="startHour" name="startHour" value="{{old('startHour', empty($reserv) ? '' : $reserv->startHour)}}">

                        <label for="endHour">Hora Fin: </label>
                        <input type="time" id="endHour" name="endHour" value="{{old('endHour', empty($reserv) ? '' : $reserv->endHour)}}">

                        <textarea
                            id="comments" name="comments" placeholder="Comentarios..."
                            class="mt-2 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-500 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{old('comments', isset($reserv) ? $reserv->comments : '')}}</textarea>

                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{empty($reserv) ? 'Guardar' : 'Actualizar'}}</x-primary-button>
                            <a href="{{route('reserv.index')}}" class="dark:text-gray-100">{{ __('Cancelar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>