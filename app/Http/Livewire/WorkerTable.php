<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Worker;
use App\Http\Controllers\WorkerController;

class WorkerTable extends Component
{
    public $route = 'index';
    public $workerId,$worker_name,$worker_surname,$worker_patronymic,
        $worker_email,$worker_email_spare,$worker_tel,$worker_tel_spare,
        $worker_division,$worker_subdivision,$worker_position;
    public $workers;

    public function mount()
    {

        $this->workers = Worker::get(['id','worker_name','worker_surname','worker_patronymic',
        'worker_email','worker_email_spare','worker_tel','worker_tel_spare',
        'worker_division','worker_subdivision','worker_position'])->toArray();

    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->getValidation());
    }

    public function submit()
    {

        $validatedData = $this->validate($this->getValidation());

        $data = Worker::create($validatedData);
        $this->resetValues();
        $this->workers[] = $validatedData + ['id' => $data['id']];
        session()->flash('message', 'Worker successfully saved.');
    }

    public function resetValues()
    {
        $this->id = null;
        $this->worker_name = null;
        $this->worker_surname = null;
        $this->worker_patronymic = null;
        $this->worker_email = null;
        $this->worker_email_spare = null;
        $this->worker_tel = null;
        $this->worker_tel_spare = null;
        $this->worker_division = null;
        $this->worker_subdivision = null;
        $this->worker_position = null;

    }

    public function edit($id)
    {
        $worker = Worker::find($id);

        $this->route = 'edit';
        $this->workerId = $id;
        $this->worker_name = $worker['worker_name'];
        $this->worker_surname = $worker['worker_surname'];
        $this->worker_patronymic = $worker['worker_patronymic'];
        $this->worker_email = $worker['worker_email'];
        $this->worker_email_spare = $worker['worker_email_spare'];
        $this->worker_tel = $worker['worker_tel'];
        $this->worker_tel_spare = $worker['worker_tel_spare'];
        $this->worker_division = $worker['worker_division'];
        $this->worker_subdivision = $worker['worker_subdivision'];
        $this->worker_position = $worker['worker_position'];
    }
    public function gotoindex()
    {
        $this->route = 'index';
    }
    public function updatemodel()
    {
        $validatedData = $this->validate($this->getValidation());

        $data = Worker::UpdateOrCreate(['id' => $this->workerId],$validatedData);
        $this->resetValues();
        $this->route = 'index';
        $this->mount();

        session()->flash('message', 'Worker successfully updated.');

    }

    public function delete($id)
    {
        $worker = Worker::find($id);
        $worker->delete();
        $this->addError('delete', 'Worker Deleted Successfully.');
    }

    public function getValidation()
    {
        return [
            'worker_name' => 'required|min:3',
            'worker_surname' => 'required|min:3',
            'worker_patronymic' => 'min:3',
            'worker_email' => 'email',
            'worker_email_spare' => 'email',
            'worker_tel' => 'numeric',
            'worker_tel_spare' => 'numeric',
            'worker_division' => 'min:3',
            'worker_subdivision' => 'min:3',
            'worker_position' => 'min:3',
        ];
    }

    public function render()
    {

        $this->workers = Worker::get()->toArray();

        return view('livewire.worker-table');
    }
}
