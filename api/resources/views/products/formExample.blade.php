@extends('layouts.master')
@section("head.title") 
    <title>List Products</title>
@stop


@section("head.style")	
    <p>Style</p>
@stop

@section("body.content")	
    @include("partials.header")
           
	{!! Form::open(array('route' => 'products.storeClassify', 'method' => 'post')) !!}
	    {!! Form::text('name') !!}
	    {!! Form::text('brand') !!}
	{!! Form::close() !!}
    

    @include("partials.footer")
@stop

@section("body.js")
    <p> Body </p>
@stop