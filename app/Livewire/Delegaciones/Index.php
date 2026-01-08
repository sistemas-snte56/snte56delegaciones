<?php

namespace App\Livewire\Delegaciones;

use Livewire\Component;
use App\Models\Delegacion;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    
    protected string $layout = 'layouts.app';
    protected $paginationTheme = 'tailwind';
    protected $queryString = ['search'];

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        // return view('livewire.delegaciones.index', [
        //     'delegaciones' => Delegacion::with(['region','nivel','nomenclatura'])
        //         ->orderBy('clave')
        //         ->paginate(25),
        // ])->layout('layouts.app');

        return view('livewire.delegaciones.index', [
            'delegaciones' => Delegacion::with(['region','nivel','nomenclatura'])
                ->where(function ($query){
                    $query->where('clave','like','%' . $this->search . '%')
                    ->orWhere('sede','like','%' . $this->search . '%')
                    ->orWhereHas('region', function ($q){
                        $q->where('nombre','like','%' . $this->search . '%');
                    })
                    ->orWhereHas('nivel', function ($q){
                        $q->where('nombre','like','%' . $this->search . '%');
                    })
                    ;
                })
                ->orderBy('clave')
                ->paginate(25),
        ])->layout('layouts.app');

    }
}
