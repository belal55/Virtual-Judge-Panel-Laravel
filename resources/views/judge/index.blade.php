<?php
	$user=session()->get('user');
?>

@extends('Layouts.judge.header')
@section('content')

<div class="col-md-9 col-sm-12">
	
	<div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title"> Dashboard </div>
        </div> 
	    <div class="panel-body">
	   		 
            <div class="row">
            	<div class="col-md-8">
            		<table>
            			<tr>
            				<td>Name: </td>
            			</tr>
            		</table>
            	</div>
            </div>

		</div>
	
	</div>
</div>

@endsection
