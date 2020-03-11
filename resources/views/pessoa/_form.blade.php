{{Form::hidden('pessoa_tipo', $pessoa_tipo)}}

@component('includes._form_group',['field' => 'name'])
    {{ Form::label('nome','Nome',['class' => 'control-label']) }}
    {{ Form::text('nome',null,['class' => 'form-control']) }}
    <!--<label for="nome">Nome</label>-->
    <!--<input class="form-control" id="nome" name="nome" value="{{old('nome', $pessoa->nome)}}">-->
@endcomponent

@component('includes._form_group',['field' => 'documento_numero'])
    {{ Form::label('documento_numero', 'Documento',['class' => 'control-label']) }}
    {{ Form::text('documento_numero', null, ['class' => 'form-control'])}}
@endcomponent

@component('includes._form_group',['field' => 'email'])
    {{ Form::label('email', 'E-mail',['class' => 'control-label']) }}
    {{ Form::email('email', null,['class' => 'form-control'])}}
@endcomponent

@component('includes._form_group',['field' => 'fone'])
    {{ Form::label('fone', 'Telefone',['class' => 'control-label']) }}
    {{ Form::text('fone', null,['class' => 'form-control'])}}
@endcomponent

@if($pessoa_tipo == \App\Pessoa::TYPE_INDIVIDUAL)
    @component('includes._form_group',['field' => 'status_civil'])
        {{ Form::label('status_civil', 'Estado Civil',['class' => 'control-label']) }}
        {{
            Form::select('status_civil', [
                '' => 'Selecione o estado civil',
                1 => 'Solteiro',
                2 => 'Casado',
                3 => 'Divorciado'
           ], null, ['class' => 'form-control'])
        }}
    @endcomponent

    @component('includes._form_group',['field' => 'data_nascimento'])
        {{ Form::label('data_nascimento', 'Data Nasc.',['class' => 'control-label']) }}
        {{ Form::date('data_nascimento', null,['class' => 'form-control'])}}
    @endcomponent

    @php
        $sexo = $pessoa->sexo;
    @endphp
    <div class="radio{{$errors->has('sexo')?' has-error':''}}">
        <label>
            {{ Form::radio('sexo','m') }} Masculino
        </label>
    </div>

    <div class="radio{{$errors->has('sexo')?' has-error':''}}">
        <label>
            {{ Form::radio('sexo','f') }} Feminino
        </label>
    </div>

    <div class="{{$errors->has('sexo')?' has-error':''}}">
    @include('includes._help_block',['field' => 'sexo'])
    </div>

    @component('includes._form_group',['field' => 'def_fisica'])
        {{ Form::label('def_fisica','Deficiência Física',['class' => 'control-label']) }}
        {{ Form::text('def_fisica',null,['class' => 'form-control']) }}
    @endcomponent

@else
    @component('includes._form_group',['field' => 'empresa_nome'])
        {{ Form::label('empresa_nome','Nome Fantasia',['class' => 'control-label']) }}
        {{ Form::text('empresa_nome',null,['class' => 'form-control']) }}
    @endcomponent
@endif
<div class="checkbox">
    <label>
        {{ Form::checkbox('defaulter') }} Inadimplente?
    </label>
</div>
