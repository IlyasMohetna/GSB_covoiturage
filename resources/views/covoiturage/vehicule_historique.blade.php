@extends('layout.app')
@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="main-content">
	<div class="grid grid-cols-12 gap-6 mt-6">
		<div class="xl:col-span-12 col-span-12">
			<div class="box custom-box">
				<div class="box-header justify-between">
					<div class="box-title">Historique d'utilisation du véhicule</div>
				</div>
				<div class="box-body">
					<div class="table-responsive">
						<table class="table whitespace-nowrap min-w-full">
							<thead>
								<tr class="border-b border-defaultborder">
									<th scope="col" class="text-start">Année</th>
									<th scope="col" class="text-start">Nombre de fois</th>
								</tr>
							</thead>
							<tbody>
								@php $years = [2019,2020,2021,2022,2023,2024,2025,2026]; @endphp
                                @foreach($years as $year)
								<tr class="border-b border-defaultborder">
									<td class="capitalize">{{ $year }}</td>
									<td class="capitalize">@if(isset($yearsUsed[$year])) {{ $yearsUsed[$year] }} fois @else 0 fois @endif</td>
								</tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer hidden border-t-0">
				</div>
			</div>
		</div>
	</div>
</div>
<script>$('#sidebar-reservations').addClass('active');</script>
@stop
