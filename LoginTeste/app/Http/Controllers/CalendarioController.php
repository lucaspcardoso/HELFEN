<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CalendarioController extends Controller
{
    public function index(string $id)
    {
        return view('profissional.calendario');
    }

    public function store(Request $request)
    {
        $request->validate([
            'selected_days' => 'required|array',
            'selected_days.*' => 'date_format:Y-m-d',
        ]);

        $user_id = auth()->id();

        foreach ($request->selected_days as $selected_day) {
            $date = \Carbon\Carbon::createFromFormat('Y-m-d', $selected_day);

            // Verifica se o evento já existe para o usuário e data
            $event = CalendarEvent::where('fk_user_id', $user_id)
                ->where('date', $date)
                ->first();

            if ($event) {
                // Atualiza se já existe
                $event->update(['is_workday' => true]);
            } else {
                // Cria um novo evento
                CalendarEvent::create([
                    'fk_user_id' => $user_id,
                    'date' => $date,
                    'is_workday' => true,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Dias selecionados salvos com sucesso.');
    }

}
