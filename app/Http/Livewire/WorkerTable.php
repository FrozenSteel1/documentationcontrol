<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Worker;
use Livewire\WithPagination;

class WorkerTable extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    protected $listeners = ['alarm' => 'alarm','delete' => 'delete'];

    public function render()
    {
        return view('livewire.worker-table', [
            'workers' => Worker::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
        ]);

    }
    public function edit($id){
        dd('WorkerTable/edit');
    }
    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
    public function alarm(){

        dd( Worker::all());
        dd('alarm');
    }
}
