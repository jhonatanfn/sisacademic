<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" wire:model="dni" class="form-control" 
            placeholder="Ingrese el DNI del alumno">
            @error('dni')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="nombres">Nombres</label>
            <input type="text" wire:model="nombres" class="form-control" 
            placeholder="Ingrese los Nombres del alumno">
    
            @error('nombres')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" wire:model="apellidos" class="form-control" 
            placeholder="Ingrese los Apellidos del alumno">
    
            @error('apellidos')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" wire:model="direccion" class="form-control" 
            placeholder="Ingrese la Direccion del alumno">
    
            @error('direccion')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" wire:model="telefono" class="form-control" 
            placeholder="Ingrese el Telefono del alumno">
    
            @error('telefono')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" wire:model="email" class="form-control" 
            placeholder="Ingrese el Email del alumno">
    
            @error('email')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="dnip">DNI Padre</label>
            <input type="text" wire:model="dnip" class="form-control" 
            placeholder="Ingrese el DNI del padre">
    
            @error('dnip')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    
        <button wire:click="save" class="btn btn-primary">
            Guardar alumno
        </button>
    
    </div>
    
</div>
