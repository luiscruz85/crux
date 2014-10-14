@extends('layouts.default')

@section('main')
<div class="container">
    <div class="ui basic segment pagehead">
        <h1 class="ui header"><i class="icon file"></i>Pages</h1>
    </div>
    @if ($pages->count())
        <table class="ui table segment">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td>{{$page->title}}</td>
                        <td align="right">
                            <a href="/pages/{{$page->id}}/edit" class="ui button labeled icon small"><i class="icon pencil"></i> Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        There are no pages
    @endif
</div>
@stop
