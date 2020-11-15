<div class="container">

    @if (session('message'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <span>{{ session('message') }}</span><br/>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            @if($route == 'edit')
                <div class="col-sm-6 text-left">
                    <a href="#" class="btn btn-dark" wire:click="gotoindex"><i class="fa fa-caret-left fa-fw"></i> Back</a>
                </div>
            @endif
            {{ Form::open(['url' => 'payment-accounts', 'method' => 'post','files'=>'true','wire:submit.prevent' => 'submit']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Название : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('doc_name', null,['class' => 'form-control','placeholder' => 'Введите Название документа','wire:model' => 'doc_name']) }}
                            @error('doc_name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Номер : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('doc_number', null,['class' => 'form-control','placeholder' => 'Введите номер документа','wire:model' => 'doc_number']) }}
                            @error('doc_number') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Тэги : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::textarea('doc_tags', null,['class' => 'form-control','placeholder' => 'Введите тэги для документа','wire:model' => 'doc_tags']) }}
                            @error('doc_tags') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Область действия : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('doc_area', null,['class' => 'form-control','placeholder' => 'Введите область действия','wire:model' => 'doc_area']) }}
                            @error('doc_area') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Номер работника : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::number('doc_worker_id', null,['class' => 'form-control','placeholder' => 'Введите номер работника','wire:model' => 'doc_worker_id']) }}
                            @error('doc_worker_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Номер ответственного : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::number('doc_responsible_id', null,['class' => 'form-control','placeholder' => 'Введите номер ответственного','wire:model' => 'doc_responsible_id']) }}
                            @error('doc_responsible_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Номер подписчика : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::number('doc_signer_id', null,['class' => 'form-control','placeholder' => 'Введите номер подписчика','wire:model' => 'doc_signer_id']) }}
                            @error('doc_signer_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Дата подписания :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::date('doc_date_signing', null,['class' => 'form-control','placeholder' => 'Укажите Дату подписания','wire:model' => 'doc_date_signing']) }}
                            @error('doc_date_signing') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Дата окончания :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::date('doc_date_expired', null,['class' => 'form-control','placeholder' => 'Укажите дату окончания действия','wire:model' => 'doc_date_expired']) }}
                            @error('doc_date_expired') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Данные :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::file('doc_data',['class' => 'form-control','placeholder' => 'Выберите файлы документа','wire:model' => 'doc_data']) }}
                            @error('doc_data') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    @if($route == 'index')
                        <button type="submit" class="btn btn-success" style="display: block; margin: 0 auto">Save
                        </button>
                    @elseif($route == 'edit')
                        <div class="text-center">
                            <a href="#" class="btn btn-success" wire:click="updatemodel()">Update</a>
                        </div>
                    @endif
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    @if($route == 'index')
        <br>
        <div class="card card-body">
            <div class="col-sm-12">
                @error('delete')
                <div class="alert alert-danger"><span class="error">{{ $message }}</span></div> @enderror
                <div class="">
                    <div class="row table-header-section">
                        <div class="col-sm-6">
                            Список документов:
                        </div>
                        <div class="col-sm-6 table-search">
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped table-outer-border no-margin document-list-table table-sm"
                               id="document-table" style="width:100%">

                            <thead>
                            <th class="td-text">#</th>
                            <th class="td-text">Название</th>
                            <th class="td-text">Номер</th>
                            <th class="td-text">Область действия</th>
                            <th class="td-text">Тэги</th>
                            <th class="td-text">Работник</th>
                            <th class="td-text">Ответственный</th>
                            <th class="td-text">Подписант</th>
                            <th class="td-text">Дата подписания</th>
                            <th class="td-text">Дата окончания</th>
                            <th class="td-text">Данные</th>
                            <th class="text-right">Действия</th>
                            </thead>
                            @if(count($documents) > 0)
                                @foreach($documents as $index => $document)
                                    <tr>
                                        <td class="td-text">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_number'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_name']}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_tags']}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_area'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_worker_id'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_responsible_id']}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_signer_id']}}
                                        </td>

                                        <td class="td-text">
                                            {{$document['doc_date_signing']}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_date_expired']}}
                                        </td>
                                        <td class="td-text">
                                            {{$document['doc_data']}}
                                        </td>
                                        <td class="text-right">
                                            <a href="#" wire:click="edit({{$document['id']}})"
                                               class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" wire:click="delete({{$document['id']}})"
                                               class="btn btn-danger btn-sm"><i class="fas fa-cog">Delete</i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No results found.</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>


