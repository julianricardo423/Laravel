<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Enums\UserRolEnum;
use App\Enums\LaboratoriesEnum;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index() : View{//devolvera una vista
        //Facades: iteractuar con una tabla de la base de datos en este caso reservation
        $reservationss = Reservation::get();
        return view("reserv.index", ['reservs' => $reservationss]);
    }

    //Retorna la vista reserva/crear
    public function create() : View{

        //Enviamos 2 listas a la vista que contienen las clases enum UserRolEnum y LaboratoriesEnum para poder ser almacenadas en un dropdownlist
        $userTypes = array_map(fn($rolType) => $rolType->value, UserRolEnum::cases());
        $laboratories = array_map(fn($laboratory) => $laboratory->value, LaboratoriesEnum::cases());

        //Enviar datos a la vista correspondiente
        return view('reserv.create_or_edit', ['userTypes' => $userTypes, 'laboratories' => $laboratories]);
    }

    //Guardar datos del formulario de la vista reserva/crear
    public function store(Request $request):RedirectResponse{
        //Validar que los campos cumplan con los requesitos necesarios
        $validated = $request->validate([
            'name' => 'required|string|min:10|max:50',
            'idNumber' => 'required|min:5|max:20',
            'userType' => 'required',
            'roomLaboratory' => 'required',
            'dependecyOrAcademyProgram' => 'required|string|min:5|max:50',
            'dateReservation' => 'required|date',
            'startHour'=>'required',
            'endHour'=>'required',
            'comments' => 'string|max:200'
        ]);
        
        //Convertir el formato de fecha a yyyy-MM-dd H:i:s
        

        //Ingresar por base de datos
        Reservation::create([
            'name' => $validated['name'],
            'idNumber' => $validated['idNumber'],
            'userType' => $validated['userType'],
            'roomLaboratory' => $validated['roomLaboratory'],
            'dependecyOrAcademyProgram' => $validated['dependecyOrAcademyProgram'],
            'dateReservation' => $validated['dateReservation'],
            'startHour' => $validated['startHour'],
            'endHour' => $validated['endHour'],
            'comments' => $validated['comments'],
        ]);

        //Redirecionar al inicio del módulo reservas
        return redirect()->route('reserv.index');
    }

    //Retorna la vista reserva/editar
    public function edit(Reservation $reserv) : View{

        $userTypes = array_map(fn($rolType) => $rolType->value, UserRolEnum::cases());
        $laboratories = array_map(fn($laboratory) => $laboratory->value, LaboratoriesEnum::cases());

        return view('reserv.create_or_edit')->with(['reserv' => $reserv, 'userTypes' => $userTypes, 'laboratories' => $laboratories]);
    }

    public function update(Request $request, Reservation $reserv) : RedirectResponse{
        $validated = $request->validate([
            'name' => 'required|string|min:10|max:50',
            'idNumber' => 'required|min:5|max:20',
            'userType' => 'required',
            'roomLaboratory' => 'required',
            'dependecyOrAcademyProgram' => 'required|string|min:5|max:50',
            'dateReservation' => 'required|date',
            'startHour'=>'required',
            'endHour'=>'required',
            'comments' => 'string|max:200'
        ]);

        $reserv->update($validated);

        return redirect(route('reserv.index'));
    }

    public function delete(Reservation $reserv): RedirectResponse {
        $reserv->delete();
        return redirect()->route('reserv.index');
    }
}
