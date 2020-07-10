@extends('Centaur::layout',['navbar' => true])

@section('title', 'Create New Office')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        @component('Centaur::components.panel.content', [
            'class' => 'panel-default',
            'heading' => [
                'visible' => true,
                'title' => 'Create New Office'
            ],
            'body' => [
                'visible' => true,
                'component' => true,
                'content' => [
                    [
                        'component_path' => 'Centaur::components.form.offices.create',
                        'component_options' => [
                        'method' => 'POST',
                        'route' => 'offices.store',
                        'param' => false
                        ]
                    ]
                ]
            ],
            'footer' => [
                'visible' => false,
                'content' => ''
            ]
        ])

        @endcomponent
    </div>
</div>
@stop
