<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100s space-x-8">
                    <a href="{{route('reserv.create_or_edit')}}" class="px-4 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">Agregar</a>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            
            <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Identificación</th>
                            <th class="px-4 py-2">Rol</th>
                            <th class="px-4 py-2">Laboratorio</th>
                            <th class="px-4 py-2">Dependencia/Programa Academico</th>
                            <th class="px-4 py-2">Fecha de Reserva</th>
                            <th class="px-4 py-2">Hora Inicio</th>
                            <th class="px-4 py-2">Hora Fin</th>
                            <th class="px-4 py-2">Comentarios</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservs as $reserv)
                            <tr>
                                <td class="border px-4 py-2 text-white">{{ $reserv->id }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->name }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->idNumber }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->userType }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->roomLaboratory }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->dependecyOrAcademyProgram }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->dateReservation }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->startHour }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->endHour }}</td>
                                <td class="border px-4 py-2 text-white">{{ $reserv->comments }}</td>
                                <td class="border px-4 py-2 text-white">
                                    <div class="flex flex-col space-x-2">
                                        <a href="{{route('reserv.edit', $reserv)}}" class="px-2 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">Editar</a>

                                        <form method="POST" action="{{route('reserv.delete', $reserv)}}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link href="#" class="px-2 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700" onclick="event.preventDefault(); this.closest('form').submit();">
                                                Eliminar
                                            </x-dropdown-link>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>