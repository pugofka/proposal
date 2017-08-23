@extends('layouts.app')

@section('content')
<section class="stages">
	    <div class="row">
	    <div class="stages__wrap">
		    <h1 class="stages__title">Этапы</h1>
		    <a href="javascript:void(0)" class="stages__create-btn btn btn-raised btn-warning">Создать этап</a>
		</div>
	<table class="table table-striped table-hover stages__table">
	  <thead>
	  <tr>
	    <th>Название этапа</th>
	    <th>Редактирование</th>
	  </tr>
	  </thead>
	  <tbody>
	  <tr>
	    <td>Проектирование</td>
	    <td>
			 <a href="javascript:void(0)" class="stages__btn btn btn-warning btn-fab"><i class="material-icons"></i></a>
	    </td>
	  </tr>
	  </tbody>
	</table>
	</div>
</section>


@endsection