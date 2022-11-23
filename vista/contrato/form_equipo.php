<div class="row">
    <div class="col-md-12">
      <div class="alert alert-secondary text-center" role="alert"><strong>Datos contrato</strong></div>
    </div>
</div>
<div class="row">
	<div class="table-responsive w-100">
		<table id="tablaEquipos">
			<thead class="text-center">
				<tr>
					<th>Clase</th>
					<th>Consecutivo</th>
					<th>Canon</th>
					<th>Deposito</th>
					<th>Total</th>
					<th>Agregar</th>
				</tr>
				<tr>
					<input type="hidden" id="contador" name="contador" value="0">
					<td>
						<select class="form-select" id="clase" name="clase">
							<?php $contratoController->getSelectClase();?>
						</select>
					</td>
					<td>
						<select class="form-select" id="equipo" name="equipo">
							<option value="0">Seleccione una clase...</option>
						</select>
					</td>
					<td><input class="form-control" type="number" name="valor" id="canon"></td>
					<td><input class="form-control" type="number" name="valor" id="deposito"></td>
					<td><input class="form-control" type="number" name="valor" id="total"></td>
					<td class="text-center"><button type="button" class="btn btn-primary" id="agregarEquipos"><i class="fa-solid fa-plus"></i></button></td>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<hr>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-floating mb-2">
            <input type="date" class="form-control" id="fecha_ini_contrato" name="fecha_ini_contrato" required="true">
            <label for="floatingInput">Fecha inicio (Obligatorio)</label>
        </div>	
	</div>
	<div class="col-md-4">
		<div class="form-floating mb-2">
            <input type="date" class="form-control" id="fecha_fin_contrato" name="fecha_fin_contrato" required="true">
            <label for="floatingInput">Fecha fin (Obligatorio)</label>
        </div>	
	</div>
	<div class="col-md-4">
		<div class="form-floating mb-2">
  			<textarea class="form-control" placeholder="Observaciones" id="observ_contrato" name="observ_contrato"  style="height: 100px"></textarea>
  			<label for="observaciones">Observaciones</label>
        </div>	
	</div>
</div>