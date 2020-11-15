<?php

namespace App\Http\Livewire;

use App\Models\Document;
use Livewire\Component;
use App\Http\Controllers\DocumentController;
use Livewire\WithFileUploads;

class DocumentTable extends Component
{
    use WithFileUploads;
    public $route = 'index';
    public $doc_id,$doc_number,$doc_name,$doc_area,
$doc_version,$doc_responsible_id,$doc_worker_id,$doc_signer_id,
$doc_tags,$doc_date_signing,$doc_date_expired,$doc_data;
    public $documents;

    public function mount()
    {

        $this->documents = Document::get(['id','doc_number','doc_name','doc_area',
            'doc_version','doc_responsible_id','doc_worker_id','doc_signer_id',
            'doc_tags','doc_date_signing','doc_date_expired','doc_data'])->toArray();


    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->getValidation());
    }

    public function submit()
    {
        

        $validatedData = $this->validate($this->getValidation());

        $data = Document::create($validatedData);
        $this->resetValues();
        $this->documents[] = $validatedData + ['id' => $data['id']];
        session()->flash('message', 'Document successfully saved.');
    }

    public function resetValues()
    {
        $this->id = null;
        $this->doc_name = null;
        $this->doc_number = null;
        $this->doc_area = null;
        $this->doc_responsible_id = null;
        $this->doc_signer_id = null;
        $this->doc_tags = null;
        $this->doc_version = null;
        $this->doc_worker_id = null;
        $this->doc_date_expired = null;
        $this->doc_date_signing = null;
        $this->doc_data = null;

    }

    public function edit($id)
    {
        $document = Document::find($id);

        $this->route = 'edit';
        $this->doc_Id = $id;
        $this->doc_name = $document['doc_name'];
        $this->doc_number = $document['doc_number'];
        $this->doc_area = $document['doc_area'];
        $this->doc_tags = $document['doc_tags'];
        $this->doc_version = $document['doc_version'];
        $this->doc_responsible_id = $document['doc_responsible_id'];
        $this->doc_signer_id = $document['doc_signer_id'];
        $this->doc_worker_id = $document['doc_worker_id'];
        $this->doc_date_expired = $document['doc_date_expired'];
        $this->doc_date_signing = $document['doc_date_signing'];
        $this->doc_data = $document['doc_data'];
    }
    public function gotoindex()
    {
        $this->route = 'index';
    }
    public function updatemodel()
    {
        $validatedData = $this->validate($this->getValidation());

        $data = Document::UpdateOrCreate(['id' => $this->doc_id],$validatedData);
        $this->resetValues();
        $this->route = 'index';
        $this->mount();

        session()->flash('message', 'Document successfully updated.');

    }

    public function delete($id)
    {
        $document = Document::find($id);
        $document->delete();
        $this->addError('delete', 'Document Deleted Successfully.');
    }

    public function getValidation()
    {
        return [
            'doc_name' => 'required|min:3',
            'doc_number' => 'required|min:3',
            'doc_area' => 'min:3',
            'doc_tags' => 'min:3',
            'doc_responsible_id' => 'numeric',
            'doc_signer_id' => 'numeric',
            'doc_worker_id' => 'min:3',
            'doc_date_expired' => 'min:3',
            'doc_date_signing' => 'min:3',
            'doc_data' => '',
        ];
    }

    public function render()
    {

        $this->documents = Document::get()->toArray();

        return view('livewire.document-table');
    }
}
