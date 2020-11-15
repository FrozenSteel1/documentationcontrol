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
            {{ Form::open(['url' => 'payment-accounts', 'method' => 'post','wire:submit.prevent' => 'submit']) }}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Имя : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_name', null,['class' => 'form-control','placeholder' => 'Введите Имя','wire:model' => 'worker_name']) }}
                            @error('worker_name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Фамилия : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_surname', null,['class' => 'form-control','placeholder' => 'Введите Фамилию','wire:model' => 'worker_surname']) }}
                            @error('worker_surname') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Отчество : *',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_patronymic', null,['class' => 'form-control','placeholder' => 'Введите Отчество','wire:model' => 'worker_patronymic']) }}
                            @error('worker_patronymic') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Email :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_email', '',['class' => 'form-control','placeholder' => 'Введите Email','wire:model' => 'worker_email']) }}
                            @error('worker_email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Резервный Email :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_email_spare', '',['class' => 'form-control','placeholder' => 'Введите резервный Email','wire:model' => 'worker_email_spare']) }}
                            @error('worker_email_spare') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Номер телефона :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_tel', '',['class' => 'form-control','placeholder' => 'Введите номер телефона','wire:model' => 'worker_tel']) }}
                            @error('worker_tel') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Резервный телефон :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_tel_spare', '',['class' => 'form-control','placeholder' => 'Введите резервный телефон','wire:model' => 'worker_tel_spare']) }}
                            @error('worker_tel_spare') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        {{ Form::label('name', 'Организация :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_division', '',['class' => 'form-control','placeholder' => 'Введите название организации','wire:model' => 'worker_division']) }}
                            @error('worker_division') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Подразделение :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_subdivision', '',['class' => 'form-control','placeholder' => 'Введите подразделение организации','wire:model' => 'worker_subdivision']) }}
                            @error('worker_subdivision') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{ Form::label('name', 'Должность :',['class' => 'col-md-4','align' => 'right'])}}
                        <div class="col-md-6">
                            {{ Form::text('worker_position', '',['class' => 'form-control','placeholder' => 'Введите должность','wire:model' => 'worker_position']) }}
                            @error('worker_position') <span class="error text-danger">{{ $message }}</span> @enderror
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
                            Список работников:
                        </div>
                        <div class="col-sm-6 table-search">
                        </div>
                    </div>
                    <div class="table-responsive mt-2">
                        <table class="table table-striped table-outer-border no-margin worker-list-table table-sm"
                               id="worker-table" style="width:100%">

                            <thead>
                            <th class="td-text">#</th>
                            <th class="td-text">Имя</th>
                            <th class="td-text">Фамилия</th>
                            <th class="td-text">Отчество</th>
                            <th class="td-text">Email</th>
                            <th class="td-text">Резервный Email</th>
                            <th class="td-text">Телефон</th>
                            <th class="td-text">Резервный телефон</th>
                            <th class="td-text">Организация</th>
                            <th class="td-text">Подразделение</th>
                            <th class="td-text">Должность</th>
                            <th class="text-right">Действия</th>
                            </thead>
                            @if(count($workers) > 0)
                                @foreach($workers as $index => $worker)
                                    <tr>
                                        <td class="td-text">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_name'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_surname']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_patronymic']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_email'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_email_spare'] ?? ''}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_tel']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_tel_spare']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_division']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_subdivision']}}
                                        </td>
                                        <td class="td-text">
                                            {{$worker['worker_position']}}
                                        </td>
                                        <td class="text-right">
                                            <a href="#" wire:click="edit({{$worker['id']}})"
                                               class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" wire:click="delete({{$worker['id']}})"
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

